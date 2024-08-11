<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Waste;
use App\Models\Pickup;
use App\Models\Category;
use App\Models\Image;
use App\Models\Withdraw;
use App\Models\WastePrice;
use App\Models\PickupDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // Show Dashboard
    public function index()
    {
        $categoriesOptions = Category::all();
        $branchId = auth()->user()->branch_id;
        $wastesOptions = WastePrice::with('waste')
            ->where('branch_id', $branchId)
            ->get()
            ->groupBy('waste.category_id');
        $saldo = User::where('branch_id',auth()->user()->branch_id)->where('role_id',1)->sum('saldo');
        $pickup = Pickup::select('pickups.*')
            ->join('users', 'pickups.user_id', '=', 'users.id')
            ->where('users.branch_id', auth()->user()->branch_id)
            ->where('users.role_id', 1)
            ->whereIn('pickups.status_id', [1, 2, 3])
            ->orderby('pickups.status_id')
            ->orderby('pickups.pickup_date')
            ->get();
        $withdrawActive = Withdraw::select('withdraws.*')
            ->join('users', 'withdraws.user_id', '=', 'users.id')
            ->where('users.branch_id', auth()->user()->branch_id)
            ->where('users.role_id', 1)
            ->whereIn('status_id', [1, 4])
            ->orderby('status_id')
            ->get();
        $pickupHistory = Pickup::select('pickups.*')
            ->join('users', 'pickups.user_id', '=', 'users.id')
            ->where('users.branch_id', auth()->user()->branch_id)
            ->where('users.role_id', 1)
            ->whereIn('pickups.status_id', [5, 7, 8])
            ->orderby('pickups.updated_at', 'desc')
            ->limit(5)
            ->get();
        $withdraw = Withdraw::select('withdraws.*')
            ->join('users', 'withdraws.user_id', '=', 'users.id')
            ->where('users.branch_id', auth()->user()->branch_id)
            ->where('users.role_id', 1)
            ->whereIn('status_id', [6, 7, 9])
            ->orderby('withdraws.updated_at', 'desc')
            ->limit(5)
            ->get();
        // return $withdrawActive;

        $hasPickupToday = false;

        foreach ($pickup as $pick) {
            if ($pick->pickup_date == Carbon::today()->toDateString()) {
                $hasPickupToday = true;
                break;
            }
        }
        return view('admin.dashboard',[
            'title' => 'Dashboard',
            'saldo' => $saldo,
            'pickups' => $pickup,
            'withdrawActives' => $withdrawActive,
            'pickupHistories' => $pickupHistory,
            'withdraws' => $withdraw,
            'hasPickupToday' => $hasPickupToday,
            'categoriesOptions' => $categoriesOptions,
            'wastesOptions' => $wastesOptions
        ]);
    }

    // Cancel Permintaan Setoran
    public function cancel($id)
    {
        $pickup = Pickup::findOrFail($id);

        $pickup->status_id = 7;
        $pickup->save();

        return redirect()->route('admin.dashboard')->with('success', 'Permintaan pickup telah dibatalkan.');
    }

    // Set Tanggal Pengambilan Sampah
    public function update(Request $request, $id)
    {
        $request->validate([
            'pickup_date' => 'required|date'
        ]);

        // Temukan Pickup berdasarkan ID
        $pickup = Pickup::findOrFail($id);

        // Konversi pickup_date ke format date
        $pickup->pickup_date = $request->pickup_date;
        $pickup->status_id = 2; // Ubah status jika diperlukan
        $pickup->save();
        // return $pickup->status_id;
        // Redirect dengan pesan sukses
        return redirect()->route('admin.dashboard')->with('success', 'Pickup updated successfully.');
    }

    // Ubah Status ke 'Dalam Perjalanan' di Hari Pengambilan
    public function take($id)
    {
        // Temukan Pickup berdasarkan ID
        $pickup = Pickup::findOrFail($id);

        $pickup->status_id = 3; // Ubah status jika diperlukan
        $pickup->save();
        // return $pickup->status_id;
        // Redirect dengan pesan sukses
        return redirect()->route('admin.dashboard')->with('success', 'Pickup updated successfully.');
    }

    // Simpan Pickup Detail
    public function storePickupDetails(Request $request, $id)
    {
        // Validate the input
        $validatedData = $request->validate([
            'pickup_details.*.waste_price_id' => 'required|integer|exists:waste_prices,id',
            'pickup_details.*.qty' => 'required|integer|min:1',
        ]);

        // Prepare the data for insertion
        $pickupDetails = [];
        $total = 0;
        foreach ($validatedData['pickup_details'] as $index => $detail) {
            $pickupDetails[] = [
                'waste_price_id' => $detail['waste_price_id'],
                'pickup_id' => $id,
                'qty' => $detail['qty'],
                'total' => $detail['qty'] * WastePrice::where('id', $detail['waste_price_id'])->first()->price,
            ];
            $total = $total + ($detail['qty'] * WastePrice::where('id', $detail['waste_price_id'])->first()->price);
        }
        $saldo = Pickup::where('id',$id)->first()->user->saldo;
        $saldo = $saldo + $total;
        $saldoUpdate = ['saldo' => $saldo];
        $pickup = ['status_id' => 5,
                    'total' => $total];
        // Perform mass insertion
        try {
            PickupDetail::insert($pickupDetails);
            Pickup::where('id',$id)->update($pickup);
            User::where('id', Pickup::where('id',$id)->first()->user_id)->update($saldoUpdate);
            return redirect()->back()->with('success', 'Pickup details saved successfully.');
        } catch (Exception $e) {
            // Handle any errors during insertion
            return redirect()->back()->with('error', 'Failed to save pickup details.');
        }
    }

    public function transferCancel($id)
    {
        $withdraw = Withdraw::findOrFail($id);

        $withdraw->status_id = 7;
        $withdraw->save();

        return redirect()->route('admin.dashboard')->with('success', 'Permintaan transfer telah dibatalkan.');
    }

    public function transferNow(Request $request, $id)
    {
        $withdraw = Withdraw::findOrFail($id);

        // Validasi file upload
        $request->validate([
            'file_name' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan file ke storage
        $path = $request->file('file_name')->store('img/receipt', 'public');
    
        // Simpan nama file ke tabel images
        $image = Image::create([
            'file_name' => $path,
        ]);
    
        // Update withdraw dengan image_id dan ubah status_id menjadi 6
        $withdraw->update([
            'image_id' => $image->id,
            'status_id' => 6,
        ]);
    
        return redirect()->back()->with('success', 'File berhasil diupload dan status diperbarui.');
    }
}

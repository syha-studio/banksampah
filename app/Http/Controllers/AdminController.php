<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Waste;
use App\Models\Pickup;
use App\Models\Category;
use App\Models\Withdraw;
use App\Models\WastePrice;
use App\Models\PickupDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
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
        $withdrawActive = Withdraw::where('user_id',auth()->user()->id)->whereIn('status_id', [1, 2, 4])->get();
        $pickupHistory = Pickup::where('user_id',auth()->user()->id)->whereIn('status_id', [5, 7, 8])->limit(3)->get();
        $withdraw = Withdraw::where('user_id',auth()->user()->id)->whereIn('status_id', [6, 7, 9])->limit(3)->get();
        // return auth()->user()->role_id;
        // return $wastesOptions;

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

    public function cancel($id)
    {
        $pickup = Pickup::findOrFail($id);

        $pickup->status_id = 7;
        $pickup->save();

        return redirect()->route('admin.dashboard')->with('success', 'Permintaan pickup telah dibatalkan.');
    }

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

    public function storePickupDetails(Request $request, $pickupId)
    {
        // Validasi data input
        $rules = [];
        $data = [];

        // Loop untuk validasi setiap detail
        foreach ($request->input() as $key => $value) {
            if (strpos($key, 'category_') === 0) {
                $index = str_replace('category_', '', $key);
                $rules["waste_$index"] = 'required|exists:wastes,id';
                $rules["qty_$index"] = 'required|numeric|min:0';
                
                $data[$key] = $value;
                $data["waste_$index"] = $request->input("waste_$index");
                $data["qty_$index"] = $request->input("qty_$index");
            }
        }

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan data detail pickup
        foreach ($request->input() as $key => $value) {
            if (strpos($key, 'category_') === 0) {
                $index = str_replace('category_', '', $key);

                $pickupDetail = new PickupDetail();
                $pickupDetail->pickup_id = $pickupId;
                $pickupDetail->waste_id = $request->input("waste_$index");
                $pickupDetail->quantity = $request->input("qty_$index");
                $waste = Waste::find($pickupDetail->waste_id);
                $pickupDetail->total = $waste ? $waste->price * $pickupDetail->quantity : 0;
                $pickupDetail->save();
            }
        }

        return redirect()->back()->with('success', 'Pickup details saved successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pickup;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $saldo = User::where('branch_id',auth()->user()->branch_id)->where('role_id',1)->sum('saldo');
        $pickup = Pickup::join('users', 'pickups.user_id', '=', 'users.id')
            ->where('users.branch_id',auth()->user()->branch_id)
            ->where('role_id',1)
            ->whereIn('status_id', [1, 2, 3])->get();
        $withdrawActive = Withdraw::where('user_id',auth()->user()->id)->whereIn('status_id', [1, 2, 4])->get();
        $pickupHistory = Pickup::where('user_id',auth()->user()->id)->whereIn('status_id', [5, 7, 8])->limit(3)->get();
        $withdraw = Withdraw::where('user_id',auth()->user()->id)->whereIn('status_id', [6, 7, 9])->limit(3)->get();
        // return auth()->user()->role_id;
        return view('admin.dashboard',[
            'title' => 'Dashboard',
            'saldo' => $saldo,
            'pickups' => $pickup,
            'withdrawActives' => $withdrawActive,
            'pickupHistories' => $pickupHistory,
            'withdraws' => $withdraw
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pickup_date' => 'required|date'
        ]);

        $pickup = Pickup::findOrFail($id);
        $pickup->pickup_date = $request->pickup_date;
        $pickup->status_id = 2; // Ganti status jika diperlukan
        $pickup->save();

        return redirect()->back()->with('success', 'Pickup updated successfully.');
    }
}

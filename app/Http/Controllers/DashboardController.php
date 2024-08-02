<?php

namespace App\Http\Controllers;

use App\Models\Pickup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        
        $pickup = Pickup::where('user_id',auth()->user()->id)->whereIn('status_id', [1, 2, 4])->get();
        // return $pickup;
        return view('nasabah.dashboard',[
            'title' => 'Dashboard',
            'pickups' => $pickup
        ]);
    }

    public function cancel($id)
    {
        $pickup = Pickup::where('user_id', auth()->id())->findOrFail($id);

        $pickup->status_id = 7;
        $pickup->save();

        return redirect()->route('nasabah.dashboard')->with('success', 'Permintaan pickup telah dibatalkan.');
    }

    public function create(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $pickup = new Pickup();
        $pickup->user_id = $request->user_id;
        $pickup->status_id = 1; // Initial status
        $pickup->status_id = 1;
        $pickup->save();

        return redirect()->back()->with('success', 'Permintaan pengambilan berhasil dibuat.');
    }
}

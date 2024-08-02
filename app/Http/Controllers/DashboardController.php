<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $pickup->save();

        return redirect()->back()->with('success', 'Permintaan pengambilan berhasil dibuat.');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'id_number' => 'required|digits:16',
            'whatsapp' => 'required|numeric',
            'address' => 'required|max:255',
        ]);
    
        $user = User::findOrFail(auth()->id());
        
        $user->update($data);

        return redirect()->back()->with('success', 'Profil Berhasil diubah.');
    }
}

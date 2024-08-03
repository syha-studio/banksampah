<?php

namespace App\Http\Controllers;

use App\Models\Pickup;
use App\Models\PickupDetail;
use Illuminate\Http\Request;

class PickupController extends Controller
{
    public function index()
    {
        $pickupHistory = Pickup::where('user_id',auth()->user()->id)->whereIn('status_id', [5, 7, 8])->orderBy('created_at', 'desc')->paginate(10);
        $pickupHistory->load('pickupDetail');
        // return $pickupHistory;
        return view('nasabah.pickUpHistory',[
            'title' => 'Dashboard',
            'pickupHistories' => $pickupHistory
        ]);
    }
}

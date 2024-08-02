<?php

namespace App\Http\Controllers;

use App\Models\Withdraw;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    public function index()
    {
        $withdraw = Withdraw::where('user_id',auth()->user()->id)->whereIn('status_id', [6, 7, 9])->paginate(5);
        return view('nasabah.saldo',[
            'title' => 'Saldo',
            'withdraws' => $withdraw
        ]);
    }
}

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

    public function create(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'method_id' => 'required|exists:methods,id'
        ]);

        $wihtdraw = new Withdraw();
        $wihtdraw->user_id = $request->user_id;
        $wihtdraw->method_id = $request->method_id;
        $wihtdraw->account_number = $request->account_number;
        $wihtdraw->total = $request->total;
        $wihtdraw->message = $request->message;
        $wihtdraw->image_id = null;
        $wihtdraw->status_id = 1;
        $wihtdraw->save();

        return redirect()->back()->with('success', 'Permintaan pengambilan berhasil dibuat.');
    }
}

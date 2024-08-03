<?php

namespace App\Http\Controllers;

use App\Models\Method;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    public function index()
    {
        $withdraw = Withdraw::where('user_id',auth()->user()->id)->whereIn('status_id', [6, 7, 9])->orderBy('created_at', 'desc')->paginate(10);
        $withdrawActive = Withdraw::where('user_id',auth()->user()->id)->whereIn('status_id', [1, 2, 4])->get();
        $BankMethodOptions = Method::where('method_category_id', 1)->get();
        $ewalletMethodOptions = Method::where('method_category_id', 2)->get();
        return view('nasabah.saldo',[
            'title' => 'Saldo',
            'withdraws' => $withdraw,
            'bankMethods' => $BankMethodOptions,
            'ewalletMethods' => $ewalletMethodOptions,
            'withdrawActives' => $withdrawActive,
        ]);
    }

    public function create(Request $request)
    {
        $saldo = auth()->user()->saldo;
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'method_id' => 'required|exists:methods,id',
            'account_number' => 'required|numeric',
            'total' => [
                'required',
                'numeric',
                'regex:/^\d{5,}$/', // Minimal 5 digit
                function ($attribute, $value, $fail) use ($saldo) {
                    if ($value > $saldo) {
                        $fail('Maaf, Saldo Anda Tidak Mencukupi!');
                        return back()->with('success','Maaf, Saldo Anda Tidak Mencukupi!');
                    }
                },
            ],
            'message' => 'max_digits:50'
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

        return redirect()->back()->with('success', 'Permintaan transfer berhasil dibuat.');
    }
}

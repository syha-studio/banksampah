<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\WastePrice;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('home', [
            'title' => 'Kumpulkan Sampahmu',
        ]);
    }

    public function about()
    {
        return view('about', [
            'title' => 'Tentang Kami',
        ]);
    }

    public function howTo()
    {
        return view('howTo', [
            'title' => 'Cara Bergabung',
        ]);
    }

    public function wastePrice()
    {
        return view('listHarga', [
            'title' => 'Pricelist'
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\WastePrice;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    // Show
    public function index()
    {
        $categoriesOptions = Category::all();
        $branchId = auth()->user()->branch_id;
        $wastePrices = WastePrice::select('waste_prices.*')
            ->join('wastes', 'waste_prices.waste_id', '=', 'wastes.id')
            ->where('branch_id', $branchId)
            ->orderBy('wastes.category_id')
            ->orderBy('wastes.name')
            ->paginate(10);

        return view('admin.nasabahManagement',[
            'title' => 'Waste Pricing',
            'wastePrices' => $wastePrices,
            'categoriesOptions' => $categoriesOptions,
        ]);
    }
}

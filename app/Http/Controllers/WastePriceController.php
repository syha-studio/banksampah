<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\WastePrice;
use Illuminate\Http\Request;

class WastePriceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $selectedBranches = $request->input('branches', []);
        
        $query = WastePrice::with(['branch', 'waste']);
        
        if ($search) {
            $query->whereHas('waste', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }
        
        if (!empty($selectedBranches)) {
            $query->whereIn('branch_id', $selectedBranches);
        }
        
        $wastePrices = $query->join('wastes', 'waste_prices.waste_id', '=', 'wastes.id')
        ->orderBy('waste_prices.branch_id')
        ->orderBy('wastes.category_id')
        ->orderBy('wastes.name')
        ->paginate(10);
        $branches = Branch::withCount('wastePrices')->get();
        
        return view('listHarga', [
            'title' => 'Pricelist - Banks BIMA',
            'wastePrices' => $wastePrices,
            'branches' => $branches,
            'search' => $search,
            'selectedBranches' => $selectedBranches
        ]);
    }
}

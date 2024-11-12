<?php

namespace App\Livewire;

use App\Models\Branch;
use Livewire\Component;
use App\Models\WastePrice;
use Livewire\WithPagination;

class WastePriceList extends Component
{
    use WithPagination;

    public $search = '';
    public $activeCategory = ''; // Default category to show all
    public $categories;

    public function mount()
    {
        $this->categories = Branch::all();
    }
    public function updatedActiveCategory()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function changeActiveCategory($id)
    {
        $this->activeCategory = $id; // Ensure wastePrices are loaded on change
        $this->resetPage();
    }

    public function render()
    {
        // Fetch wastePrices with their associated images, filtered by category and search query
        $wastePrices = WastePrice::when($this->activeCategory !== '', function ($query) {
            $query->where('branch_id', $this->activeCategory);
        })
            ->when($this->search !== '', function ($query) {
                $query->WhereHas('waste', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('branch_id')->paginate(10);

        return view('livewire.waste-price-list', compact('wastePrices'));
    }
}

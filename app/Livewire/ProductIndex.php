<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Stone;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class ProductIndex extends Component
{
    use WithPagination;

    #[Layout('components.app-layout')]
    #[Title('Products - West Java Stone')]

    public $search = '';
    public $pagination = 4;
    public $categories;
    protected $updatesQueryString = ['search'];


    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->categories = Category::orderBy('name')->get();
    }

    public function render()
    {
        // $articles = [];

        return view('product.index', [
            'stones' => $this->search == null ?
                Stone::latest()->paginate($this->pagination) :
                Stone::where('name', 'like', '%' . $this->search . '%')->latest()->paginate($this->pagination)
        ]);
    }
}

<?php

namespace App\Livewire;

use App\Models\Stone;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class ProductCategories extends Component
{
    use WithPagination;

    #[Layout('components.app-layout')]
    #[Title('Category - West Java Stone')]

    public $search = '';
    public $pagination = 12;
    public $categories;
    public Category $category;
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
        // dd($this->category->stones);
        // $articles = [];

        return view('product.category', [
            'stones' => $this->search == null ?
                $this->category->stones :
                Stone::where('name', 'like', '%' . $this->search . '%')->latest()->paginate($this->pagination)
        ]);
    }
}

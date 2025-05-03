<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BlogPost;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithoutUrlPagination;

class Blog extends Component
{
    use WithPagination;

    #[Layout('components.app-layout')]
    #[Title('Articles - West Java Stone')]

    public $search = '';
    public $pagination = 3;
    protected $updatesQueryString = ['search'];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // $articles = [];

        return view('page.blog', [
            'articles' => $this->search == null ?
                BlogPost::latest()->paginate($this->pagination) :
                BlogPost::where('title', 'like', '%' . $this->search . '%')->latest()->paginate($this->pagination)
        ]);
    }
}

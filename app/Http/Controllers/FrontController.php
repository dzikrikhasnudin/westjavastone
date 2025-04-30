<?php

namespace App\Http\Controllers;

use App\Models\Stone;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\FrontService;

class FrontController extends Controller
{
    protected $frontService;

    public function __construct(FrontService $frontService)
    {
        $this->frontService = $frontService;
    }

    public function index()
    {
        $data = $this->frontService->getFrontPageData();
        return view('front.index', $data);
    }

    public function details(Stone $stone)
    {
        return view('front.details', compact('stone'));
    }

    public function category(Category $category)
    {
        return view('front.category', compact('category'));
    }
}

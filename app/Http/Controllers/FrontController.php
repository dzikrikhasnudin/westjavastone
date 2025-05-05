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

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $stones = $this->frontService->searchStones($keyword);

        return view('front.search', [
            'stones' => $stones,
            'keyword' => $keyword,
        ]);
    }

    public function index()
    {
        $data = $this->frontService->getFrontPageData();
        return view('front.index', compact('data'));
    }

    public function product()
    {
        $data = $this->frontService->getFrontPageData();
        return view('product.index', $data);
    }
    public function details(Stone $stone)
    {
        return view('product.detail', compact('stone'));
    }

    public function category()
    {
        $data = $this->frontService->getFrontPageData();
        return view('front.all-categories', compact('data'));
    }
}

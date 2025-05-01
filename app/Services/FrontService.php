<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\StoneRepositoryInterface;

class FrontService
{
    protected $categoryRepository;
    protected $stoneRepository;

    public function __construct(
        StoneRepositoryInterface $stoneRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->stoneRepository = $stoneRepository;
    }

    public function searchStones(string $keyword)
    {
        return $this->stoneRepository->searchByName($keyword);
    }

    public function getFrontPageData()
    {
        $categories = $this->categoryRepository->getAllCategories();
        $popularStones = $this->stoneRepository->getPopularStones(4);
        $newStones = $this->stoneRepository->getAllNewStones();

        return compact('categories', 'popularStones', 'newStones');
    }
}

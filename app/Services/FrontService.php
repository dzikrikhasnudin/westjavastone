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

    public function searchShoes(string $keyword)
    {
        return $this->stoneRepository->searchByName($keyword);
    }

    public function getFrontPageData()
    {
        $categories = $this->categoryRepository->getAllCategories();
        $popularShoes = $this->stoneRepository->getPopularStones(4);
        $newShoes = $this->stoneRepository->getAllNewStones();

        return compact('categories', 'popularStones', 'newStones');
    }
}

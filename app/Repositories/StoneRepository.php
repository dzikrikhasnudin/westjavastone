<?php

namespace App\Repositories;

use App\Models\Stone;
use App\Repositories\Contracts\StoneRepositoryInterface;

class StoneRepository implements StoneRepositoryInterface
{
    public function getPopularStones($limit = 4) // default limit
    {
        return Stone::where('is_popular', true)->take($limit)->get();
    }

    public function getAvailableStones()
    {
        return Stone::where('status', 'available')->latest()->get();
    }

    public function getReservedStones()
    {
        return Stone::where('status', 'resesrved')->latest()->get();
    }

    public function searchByName(string $keyword)
    {
        return Stone::where('name', 'LIKE', '%' . $keyword . '%')->get();
    }

    public function getAllNewStones()
    {
        return Stone::latest()->get();
    }

    public function find($id)
    {
        return Stone::find($id);
    }

    public function getPrice($stoneId)
    {
        $stone = $this->find($stoneId);
        return $stone ? $stone->price : 0;
    }
}

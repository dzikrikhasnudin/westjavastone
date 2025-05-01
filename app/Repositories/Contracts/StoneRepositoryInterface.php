<?php

namespace App\Repositories\Contracts;

interface StoneRepositoryInterface
{
    public function getPopularStones($limit);

    public function getAllNewStones();

    public function getAvailableStones();

    public function getReservedStones();

    public function find($id);

    public function getPrice($ticketId);

    public function searchByName(string $keyword);
}

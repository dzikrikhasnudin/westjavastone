<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum StoneStatus: string implements HasLabel, HasColor
{
    case Available = 'available';
    case Sold = 'sold';
    case Reserved = 'reserved';

    public function getLabel(): ?string
    {
        return $this->name;
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Available => 'success',
            self::Sold => 'danger',
            self::Reserved => 'warning',
        };
    }
}

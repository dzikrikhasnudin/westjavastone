<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PostStatus: string implements HasLabel
{
    case Draft = 'draft';
    case Published = 'published';

    public function getLabel(): ?string
    {
        return $this->name;

        // return match ($this) {
        //     self::Draft => 'Draft',
        //     self::Published => 'Published',
        // };
    }
}

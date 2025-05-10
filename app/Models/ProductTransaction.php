<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductTransaction extends Model
{
    use HasFactory, SoftDeletes;

    // mass assignment
    protected $fillable = [
        'name',
        'phone',
        'email',
        'booking_trx_id',
        'country',
        'city',
        'post_code',
        'address',
        'sub_total_amount',
        'grand_total_amount',
        'discount_amount',
        'is_paid',
        'stone_id',
        'promo_code_id',
        'proof',
    ];

    public function generateUniqueTrxId()
    {
        $prefix = 'TRX';
        do {
            $randomString = $prefix . mt_rand(1000, 9999);
        } while (self::where('booking_trx_id', $randomString)->exists());

        return $randomString;
    }

    public function stone(): BelongsTo
    {
        return $this->belongsTo(Stone::class, 'stone_id');
    }

    public function promoCode(): BelongsTo
    {
        return $this->belongsTo(PromoCode::class, 'promo_code_id');
    }
}

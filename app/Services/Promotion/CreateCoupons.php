<?php

namespace App\Services\Promotion;

use App\Models\Promotion;
use Illuminate\Support\Str;

class CreateCoupons
{

    public static function execute(Promotion $promotion)
    {
        for ($i = 0; $i < $promotion->qty_available; $i++) {
            info("generatin coupon");
            $promotion->coupons()->create(
                [
                    'code' => Str::random(6),
                    'discount' => $promotion->discount

                ]
            );
        }

        return true;
    }
}

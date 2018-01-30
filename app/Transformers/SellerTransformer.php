<?php

namespace App\Transformers;

use App\Seller;
use League\Fractal\TransformerAbstract;

class SellerTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Seller $seller)
    {
      return [
        'identifier' => (int)$seller->id,
        'name' => (string)$seller->name,
        'email'=>(string)$seller->email,
        'isVerified' => (int)$seller->verified,
        'createdDate' => (string)$seller->created_at,
        'updatedDate' => (string)$seller->updated_at,
        'deletedDate' => isset($seller->deleted_at) ? (string) $seller->deleted_at : null,
      ];
    }

    public static function originalAttribute($index) {
        $attributes = [
            'identifier' => 'id',
            'name' => 'name',
            'email'=> 'email',
            'isVerified' => 'verified',
            'createdDate' => 'created_at',
            'updatedDate' => 'updated_at',
            'deletedDate' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}

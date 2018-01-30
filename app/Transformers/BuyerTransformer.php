<?php

namespace App\Transformers;

use App\Buyer;
use League\Fractal\TransformerAbstract;

class BuyerTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Buyer $buyer)
    {
      return [
        'identifier' => (int)$buyer->id,
        'name' => (string)$buyer->name,
        'email'=>(string)$buyer->email,
        'isVerified' => (int)$buyer->verified,
        'createdDate' => (string)$buyer->created_at,
        'updatedDate' => (string)$buyer->updated_at,
        'deletedDate' => isset($buyer->updated_at) ? (string) $buyer->deleted_at : null,
      ];
    }
}

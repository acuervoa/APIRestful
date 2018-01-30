<?php

namespace App\Transformers;

use App\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{

    /**
     * A Fractal transformer.
     *
     * @param \App\Product $product
     *
     * @return array
     */
    public function transform(Product $product)
    {
        return [
            'identifier' => (int) $product->id,
            'titulo' => (string)$product->name,
            'detalles' => (string)$product->description,
            'disponibles' => (string)$product->quantity,
            'estado' => (string)$product->status,
            'imagen' => url("img/{$product->image}"),
            'vendedor' => (string)$product->seller_id,
            'createdDate' => (string) $product->created_at,
            'updatedDate' => (string) $product->updated_at,
            'deletedDate' => isset($product->updated_at) ? (string) $product->deleted_at : NULL,
        ];
    }
}

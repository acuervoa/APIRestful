<?php

namespace App\Transformers;

use App\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract {

    /**
     * A Fractal transformer.
     *
     * @param \App\Product $product
     *
     * @return array
     */
    public function transform(Product $product) {
        return [
            'identifier' => (int) $product->id,
            'titulo' => (string) $product->name,
            'detalles' => (string) $product->description,
            'disponibles' => (string) $product->quantity,
            'estado' => (string) $product->status,
            'imagen' => url("img/{$product->image}"),
            'vendedor' => (string) $product->seller_id,
            'createdDate' => (string) $product->created_at,
            'updatedDate' => (string) $product->updated_at,
            'deletedDate' => isset($product->deleted_at) ? (string) $product->deleted_at : NULL,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('products.show', $product->id),
                ],
                [
                    'rel' => 'product.buyers',
                    'href' => route('products.buyers.index', $product->id),
                ],
                [
                    'rel' => 'product.categories',
                    'href' => route('products.categories.index', $product->id),
                ],
                [
                    'rel' => 'product.transactions',
                    'href' => route('products.transactions.index', $product->id),
                ],
                [
                    'rel' => 'seller',
                    'href' => route('sellers.show', $product->seller_id),
                ],
            ],
        ];
    }

    public static function originalAttribute($index) {
        $attributes = [
            'identifier' => 'id',
            'titulo' => 'name',
            'detalles' => 'description',
            'disponibles' => 'quantity',
            'estado' => 'status',
            'imagen' => 'image',
            'vendedor' => 'seller_id',
            'createdDate' => 'created_at',
            'updatedDate' => 'updated_at',
            'deletedDate' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : NULL;
    }

}

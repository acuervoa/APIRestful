<?php

namespace App\Transformers;

use App\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Category $category)
    {
      return [
        'identifier' => (int)$category->id,
        'title' => (string)$category->name,
        'details'=>(string)$category->descripcion,
        'createdDate' => (string)$category->created_at,
        'updatedDate' => (string)$category->updated_at,
        'deletedDate' => isset($category->updated_at) ? (string) $category->deleted_at : null,
      ];
    }
}

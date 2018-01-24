<?php
/**
 * Created by PhpStorm.
 * User: andres.cuervo.adame
 * Date: 24/1/18
 * Time: 18:14
 */

namespace App\Scopes;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SellerScope implements Scope {

  /**
   * Apply the scope to a given Eloquent query builder.
   *
   * @param  \Illuminate\Database\Eloquent\Builder $builder
   * @param  \Illuminate\Database\Eloquent\Model $model
   *
   * @return void
   */
  public function apply(Builder $builder, Model $model) {
    $builder->has('products');
  }
}
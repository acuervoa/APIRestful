<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\APIController;
use App\Product;
use App\Transaction;
use App\Transformers\TransactionTransformer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductBuyerTransactionController extends APIController {

    public function __construct() {
        parent::__construct();
        $this->middleware('transform.input:' . TransactionTransformer::class)
             ->only(['store']);
    }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param \App\Product $product
   * @param \App\User $buyer
   *
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, Product $product, User $buyer) {

    $rules = [
      'quantity' => 'required|integer|min:1'
    ];

    $this->validate($request, $rules);

    if ($buyer->id == $product->seller_id) {
      return $this->errorResponse('El comprador debe ser diferente al vendedor', 409);
    }

    if (!$buyer->esVerificado()) {
      return $this->errorResponse('El comprador debe ser un usuario verificado', 409);
    }

    if (!$product->seller->esVerificado()) {
      return $this->errorResponse('El vendedor debe ser un usuario verificado', 409);
    }

    if (!$product->estaDisponible()) {
      return $this->errorResponse('El producto para esta transaccion no esta disponible', 409);
    }

    if ($product->quantity < $request->quantity) {
      return $this->errorResponse('El producto no tiene la cantidad disponible requerida para esta transaccion', 409);
    }

    return DB::transaction(function() use ($request, $product, $buyer) {
      $product->quantity -= $request->quantity;
      $product->save();

      $transaction = Transaction::create([
        'quantity' => $request->quantity,
        'buyer_id' => $buyer->id,
        'product_id' => $product->id,
      ]);

      return $this->showOne($transaction, 201);
    });
  }


}

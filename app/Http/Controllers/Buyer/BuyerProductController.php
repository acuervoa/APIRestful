<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\APIController;

class BuyerProductController extends APIController {

    public function __construct(){
        parent::__construct();
    }


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Buyer $buyer) {
    $products = $buyer->transactions()
      ->with('product')
      ->get()
      ->pluck('product');

    return $this->showAll($products);
  }

}

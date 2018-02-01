<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\APIController;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductBuyerController extends APIController
{
    public function __construct(){
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $buyers = $product->transactions()
          ->with('buyer')
          ->get()
          ->pluck('buyer')
          ->unique('id')
          ->values();

        return $this->showAll($buyers);
    }

}

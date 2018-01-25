<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\APIController;
use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerBuyerController extends APIController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        $buyers = $seller->products()
          ->whereHas('transactions')
          ->with('transactions.buyer')
          ->get()
          ->pluck('transactions')
          ->collapse()
          ->pluck('buyer')
          ->unique()
          ->values();

        return $this->showAll($buyers);
    }


}

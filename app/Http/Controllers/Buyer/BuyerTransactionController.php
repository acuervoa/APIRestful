<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\APIController;


class BuyerTransactionController extends APIController
{

  /**
   * Display a listing of the resource.
   *
   * @param \App\Buyer $buyer
   *
   * @return \Illuminate\Http\Response
   */
    public function index(Buyer $buyer)
    {
        $transactions = $buyer->transactions;

        return $this->showAll($transactions);
    }

}

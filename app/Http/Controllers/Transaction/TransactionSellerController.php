<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\APIController;
use App\Transaction;

class TransactionSellerController extends APIController
{

    public function __construct(){
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Transaction $transaction)
    {
       $seller = $transaction->product->seller;
       return $this->showOne($seller);
    }


}

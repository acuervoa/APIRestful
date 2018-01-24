<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\APIController;
use App\Transaction;

class TransactionCategoryController extends APIController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Transaction $transaction)
    {
        $categories = $transaction->product->categories;

        return $this->showAll($categories);
    }

}

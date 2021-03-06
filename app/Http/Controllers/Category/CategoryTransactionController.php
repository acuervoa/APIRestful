<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryTransactionController extends APIController
{

    public function __construct(){
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $transactions = $category->products()
          ->whereHas('transactions')
          ->with('transactions')
          ->get()
          ->pluck('transactions')
          ->collapse();

        return $this->showAll($transactions);
    }

}

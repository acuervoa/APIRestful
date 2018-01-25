<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\APIController;
use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerCategoryController extends APIController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        $categories = $seller->products()
          ->with('categories')
          ->get()
          ->pluck('categories')
          ->collapse()
          ->unique('id')
          ->values();

        return $this->showAll($categories);
    }

}

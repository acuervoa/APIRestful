<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryProductController extends APIController
{
    public function __construct() {
        $this->middleware('client.credentials')->only(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $products = $category->products;

        return $this->showAll($products);
    }


}

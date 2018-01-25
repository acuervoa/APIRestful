<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategorySellerController extends APIController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $sellers = $category->products()
          ->with('seller')
          ->get()
          ->pluck('seller')
          ->unique()
          ->values();

        return $this->showAll($sellers);
    }


}

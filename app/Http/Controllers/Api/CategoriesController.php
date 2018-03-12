<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::with('childrenCate')->get();
        return $this->response->array($categories)->setStatusCode(201);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Transformers\TopicTransformer;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::with('childrenCate')->get();
        return $this->response->array($categories)->setStatusCode(201);
    }

    // todo 和文章详情一样有点小问题 - -
    public function show($id, Category $category)
    {
        $category = Category::find($id);
        $topics = $category->topics()->get();
//        $data = [
//            'category' => $category,
//            'topics' => $topics,
//        ];
        return $this->response->item($topics, new TopicTransformer());
        // return $this->response->array($data)->setStatusCode(201);
    }

}

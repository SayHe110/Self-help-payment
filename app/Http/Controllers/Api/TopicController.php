<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\TopicRequest;
use App\Http\Requests\Request;
use App\Models\Topic;
use App\Transformers\TopicTransformer;

class TopicController extends Controller
{
    public function index(Topic $topic)
    {
        $topics = $topic->paginate(20);

        return $this->response->paginator($topics, new TopicTransformer());
    }

    public function store(TopicRequest $request, Topic $topic)
    {
        // $topic->fill($request->all());
        // todo
    }

    public function show(Topic $topic)
    {
        //todo 什么鬼啊，，，获取不到
        return $this->response->item($topic, new TopicTransformer());
    }


}

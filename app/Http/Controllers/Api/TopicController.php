<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\TopicRequest;
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
        $topic->fill($request->all());
        $topic->user_id = $this->user()->id;
        $topic->save();

        return $this->response->item($topic, new TopicTransformer())->setStatusCode(201);
    }

    public function show($id,Topic $topic)
    {
        // todo 先这样写着，再回来完善以下，应该可以直接获取到 $topic 的
        $topic = Topic::find($id);
        //todo 什么鬼啊，，，获取不到
        return $this->response->item($topic, new TopicTransformer());
    }


}

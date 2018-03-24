<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\TopicRequest;
use App\Models\Category;
use App\Models\Topic;
use App\Transformers\TopicTransformer;

class TopicController extends Controller
{
    public function index(Topic $topic)
    {
        $topics = $topic->orderBy('created_at', 'DESC')->paginate(20);

        return $this->response->paginator($topics, new TopicTransformer());
    }

    public function store(TopicRequest $request, Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id = $this->user()->id;
        $topic->save();

        return $this->response->item($topic, new TopicTransformer())->setStatusCode(201);
    }

    public function show(Topic $topic)
    {
        $topic->increment('view_count', 1);
        $topic->update();

        return $this->response->item($topic, new TopicTransformer());
    }

    /**
     * 停电公告
     * @return \Dingo\Api\Http\Response
     */
    public function powerFailure()
    {
        $topics = $this->getTopics('停电公告');

        return $this->response->item($topics, new TopicTransformer());
    }

    /**
     * 用电常识
     * @return \Dingo\Api\Http\Response
     */
    public function useElectricalSense()
    {
        $topics = $this->getTopics('用电常识');

        return $this->response->item($topics, new TopicTransformer());
    }

    /**
     * 根据分类名称返回文章
     * @param $category_name
     * @return mixed
     */
    protected function getTopics($category_name)
    {
        $category_id = Category::where('name', $category_name)->get()->pluck('id');

        $topics = Topic::where('category_id', $category_id)->orderBy('created_at', 'DESC')->get();

        return $topics;
    }
}

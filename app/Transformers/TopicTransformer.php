<?php

namespace App\Transformers;

use App\Models\Topic;
use League\Fractal\TransformerAbstract;

class TopicTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['user'];

    public function transform(Topic $topic)
    {
        return [
            'id' => $topic->id,
            'category_id' => $topic->category_id,
            'title' => $topic->title,
            'body' => $topic->body,
            'title_image_path' => $topic->title_image_path,
            'user_id' => $topic->user_id,
            'view_count' => $topic->view_count,
            'excerpt' => $topic->excerpt,
            'slug' => $topic->slug,
            // 'created_at' => $topic->created_at->toDateTimeString(),
            'created_at' => substr($topic->created_at->toDateTimeString(), 5, 11),
            'updated_at' => substr($topic->updated_at->toDateTimeString(), 5, 11),
        ];
    }

    public function includeUser(Topic $topic)
    {
        return $this->item($topic->user, new UserTransformer());
    }
}
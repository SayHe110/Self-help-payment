<?php

namespace App\Transformers;

use App\Models\Image;
use App\Models\User;
use League\Fractal\TransformerAbstract;

class CarouselFigureTransformer extends TransformerAbstract
{
    public function transform(Image $image)
    {
        return [
            'id' => $image->id,
            'user_id' => $image->user_id,
            'type' => $image->type,
            'path' => $image->path,
            'created_at' => $image->created_at,
            'updated_at' => $image->updated_at,
        ];
    }
}
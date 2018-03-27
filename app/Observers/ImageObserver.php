<?php

namespace App\Observers;


use App\Models\Image;

class ImageObserver
{
    public function creating(Image $image)
    {
        if(empty($image->user_id)){
            // 默认用户
            $image->user_id = 1;
        }

        // 若没有设置图片类型，则默认为 carousel_figure
        if(empty($image->type)){
            $image->type = 'carousel_figure';
        }
    }
}
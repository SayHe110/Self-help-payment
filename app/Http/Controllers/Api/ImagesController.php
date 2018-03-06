<?php

namespace App\Http\Controllers\Api;

use App\Models\Image;
use App\Transformers\CarouselFigureTransformer;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    // 轮播图
    public function carousel_figure()
    {
        $images = Image::where('type', 'carousel_figure')->get();
        return $this->response->item($images, new CarouselFigureTransformer());
    }
}

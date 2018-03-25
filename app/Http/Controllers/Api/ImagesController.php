<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\Api\ImageRequest;
use App\Models\Image;
use App\Transformers\CarouselFigureTransformer;
use App\Transformers\ImageTransformer;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    // 轮播图
    public function carousel_figure()
    {
        $images = Image::where('type', 'carousel_figure')->get();
        return $this->response->item($images, new CarouselFigureTransformer());
    }

    public function store(ImageRequest $request, ImageUploadHandler $uploader, Image $image)
    {
        $user = $this->user();

        $size = $request->type == 'avatar' ? 362 : 1024;
        $result = $uploader->save($request->image, str_plural($request->type), $user->id, $size);

        $image->path = $result['path'];
        $image->user_id = $user->id;
        $image->type = $request->type;
        $image->save();

        $user->avatar = $result['path'];
        $user->update();

        return $this->response->item($image, new ImageTransformer());
    }
}

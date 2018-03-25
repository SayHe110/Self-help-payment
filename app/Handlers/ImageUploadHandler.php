<?php

namespace App\Handlers;

use Intervention\Image\Facades\Image;

class ImageUploadHandler
{
    // 限制图片上传后缀名
    protected $allowed_ext = ["png", "jpg", "gif", "jpeg"];

    public function save($file, $folder, $file_prefix, $width_max = 0)
    {
        // 构建文件存储规则
        $folder_name = "uploads/images/$folder/".date('Ym',time()).'/'.date('d',time()).'/';

        // 上传存储位置
        $upload_path = public_path().'/'.$folder_name;

        // 获取文件的后缀名，因图片从剪贴板里黏贴时后缀名为空，所以此处确保后缀一直存在
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';

        $filename = $file_prefix . '_' . time() . '_' . str_random(10) . '.' . $extension;

        // 如果上传的不是图片将终止操作
        if ( ! in_array($extension, $this->allowed_ext)) {
            return false;
        }

        // 将图片移动到我们的目标存储路径中
        $file->move($upload_path, $filename);

        // 如果限制了宽度，则进行图片裁剪
        if($width_max && $extension != 'gif'){
            //此类中用于裁剪图片的函数
            $this->reduceSize($upload_path.'/'.$filename,$width_max);
        }

        return [
            'path' => config('app.url') . "/$folder_name/$filename"
        ];
    }

    public function reduceSize($file_path, $width_max)
    {
        //先实例化，传参是文件的磁盘物理路径
        $image = Image::make($file_path);
        //进行大小调整
        $image->resize($width_max, null, function ($constraint) {
            // 设定宽度是 $max_width，高度等比例双方缩放
            $constraint->aspectRatio();
            // 防止裁图时图片尺寸变大
            $constraint->upsize();
        });
        // 对图片修改后进行保存
        $image->save();
    }
}
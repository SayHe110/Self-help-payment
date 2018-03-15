<?php

namespace App\Handlers;


class ImageUploadHandler
{
    // 限制图片上传后缀名
    protected $allowed_ext = ["png", "jpg", "gif", "jpeg"];

    public function save($file, $folder, $file_prefix)
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

        return [
            'path' => config('app.url') . "/$folder_name$filename"
        ];
    }
}
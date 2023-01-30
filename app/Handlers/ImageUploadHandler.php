<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/3/16
 * Time: 23:56
 */

namespace App\Handlers;

use Str;
use Intervention\Image\Facades\Image;

class ImageUploadHandler
{
    // 只允许以下后缀名的图片文件上传
    protected $allowed_ext = ["png", "jpg", "gif", 'jpeg', 'ico'];

    public function save($file, $folder, $file_prefix, $type = 'editormd-image-file')
    {
        // 构建存储的文件夹规则，值如：uploads/images/avatars/201709/21/
        $folder_name = "uploads/images/$folder/" . date("Ym/d", time());
        // 文件具体存储的物理路径，`public_path()` 获取的是 `public` 文件夹的物理路径。
        $upload_path = public_path() . '/' . $folder_name;
        mk_dir($upload_path);
        // 获取文件的后缀名，因图片从剪贴板里黏贴时后缀名为空，所以此处确保后缀一直存在
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
        // 拼接文件名，加前缀是为了增加辨析度，前缀可以是相关数据模型的 ID
        $filename = $file_prefix . '_' . time() . '_' . Str::random(10) . '.' . $extension;
        // 如果上传的不是图片将终止操作
        if (!in_array($extension, $this->allowed_ext)) {
            return false;
        }
        $image = $this->addTextWater($file->getContent(), config('config.water.text'), config('config.water.color'), $type);
        // 将图片移动到我们的目标存储路径中
        $url = youpai_oss_upload('/blog/' . $folder_name . '/' . $filename, $image->stream()->getContents(), $image->mime());
        $image->save($upload_path . '/' . $filename);
        if ($url != '') {
            return [
                'path' => $url
            ];
        }
        return [
            'path' => config('app.url') . "/$folder_name/$filename"
        ];
    }

    public function addTextWater($content, $text, $color = '#0B94C1', $type = 'editormd-image-file')
    {
        $image = Image::make($content);
        if ($image->mime() == 'image/gif' || $type != 'editormd-image-file') {
            $image->resize(256, 165);
            return $image;
        }
        $image->text($text, $image->width() - 20, $image->height() - 30, function ($font) use ($color) {
            $font->file(public_path('fonts/msyh.ttf'));
            $font->size(config('config.water.size'));
            $font->color($color);
            $font->align('right');
            $font->valign('bottom');
        });
        return $image;
    }
}

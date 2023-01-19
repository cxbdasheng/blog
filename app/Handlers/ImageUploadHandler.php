<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/3/16
 * Time: 23:56
 */

namespace App\Handlers;

use Str;

class ImageUploadHandler
{
    // 只允许以下后缀名的图片文件上传
    protected $allowed_ext = ["png", "jpg", "gif", 'jpeg', 'ico'];

    public function save($file, $folder, $file_prefix)
    {
        // 构建存储的文件夹规则，值如：uploads/images/avatars/201709/21/
        $folder_name = "uploads/images/$folder/" . date("Ym/d", time());
        // 文件具体存储的物理路径，`public_path()` 获取的是 `public` 文件夹的物理路径。
        $upload_path = public_path() . '/' . $folder_name;
        // 获取文件的后缀名，因图片从剪贴板里黏贴时后缀名为空，所以此处确保后缀一直存在
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
        // 拼接文件名，加前缀是为了增加辨析度，前缀可以是相关数据模型的 ID
        $filename = $file_prefix . '_' . time() . '_' . Str::random(10) . '.' . $extension;
        // 如果上传的不是图片将终止操作
        if (!in_array($extension, $this->allowed_ext)) {
            return false;
        }
        // 将图片移动到我们的目标存储路径中
        $url = youpai_oss_upload('/blog/' . $folder_name . '/' . $filename, $file->getContent(), $file->getMimeType());
        $file->move($upload_path, $filename);
        if ($url != '') {
            return [
                'path' => $url
            ];
        }
        return [
            'path' => config('app.url') . "/$folder_name/$filename"
        ];
    }

}

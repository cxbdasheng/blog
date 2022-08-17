<?php
/**
 * Created by PhpStorm.
 * User: ChenDasheng
 * Date: 2020/3/11
 * Time: 21:04
 */

use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;
use PHPHtmlParser\Dom;
use Intervention\Image\Facades\Image;

if (!function_exists('generate_english_slug')) {
    /**
     * Generate English slug
     *
     * @param $content
     *
     * @return string
     * @throws ErrorException
     *
     */
    function generate_english_slug($content)
    {
        $locale = config('app.locale');
        if ('en' !== $locale) {
            try {
                $googleTranslate = new GoogleTranslate();
                $content = $googleTranslate->setUrl('http://translate.google.cn/translate_a/single')->setSource($locale)->translate($content);
            } catch (\Exception $exception) {
                $content = '';
            }
        }
        return $content === '' ? '' : Str::slug($content);
    }
}
if (!function_exists('push_error')) {
    function push_error($message = '失败', $flash = true)
    {
        if ($flash) {
            Session::flash('error', $message);
        }
    }
}
if (!function_exists('push_success')) {
    function push_success($message = '成功', $flash = true)
    {
        if ($flash) {
            Session::flash('success', $message);
        }
    }
}
if (!function_exists('mail_is_configured')) {
    function mail_is_configured()
    {
        $mailConfig = [
            config('mail.default'),
            config('mail.mailers.smtp.host'),
            config('mail.mailers.smtp.port'),
            config('mail.mailers.smtp.encryption'),
            config('mail.mailers.smtp.username'),
            config('mail.mailers.smtp.username'),
            config('mail.from.address'),
            config('mail.from.name'),
        ];

        return count(array_filter($mailConfig)) === 8;
    }
}
if (!function_exists('get_image_paths_from_html')) {
    function get_image_paths_from_html($html)
    {
        $dom = new Dom();
        $dom->loadStr($html);
        /** @var \PHPHtmlParser\Dom\HtmlNode[] $image_tags */
        $image_tags  = $dom->find('img');
        $image_paths = [];

        foreach ($image_tags as $image_tag) {
            $image_path = $image_tag->getAttribute('src');
            if ($image_path !== null) {
                $image_paths[] = $image_path;
            }
        }

        return $image_paths;
    }
}

if (!function_exists('add_text_water')) {
    /**
     * 给图片添加文字水印
     *
     * @param string $file
     * @param string $text
     * @param string $color
     *
     * @return mixed
     */
    function add_text_water($file, $text, $color = '#0B94C1')
    {
        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if ($extension != 'gif') {
            $image = Image::make($file);
            $image->text($text, $image->width() - 20, $image->height() - 30, function ($font) use ($color) {
                $font->file(public_path('fonts/msyh.ttf'));
                $font->size(config('config.water.size'));
                $font->color($color);
                $font->align('right');
                $font->valign('bottom');
            });
            $image->save($file);
        }
    }
}
if (!function_exists('ubbReplace')) {
    function ubbReplace($str)
    {
//        $str = str_replace(">", '<;', $str);
//        $str = str_replace(">", '>;', $str);
//        $str = str_replace("\n", '>;br/>;', $str);
        $str = preg_replace("[\[em_([0-9]*)\]]", "<img src=\"" . config('app.url') . "/img/arclist/$1.gif\" />", $str);
        return $str;
    }
};

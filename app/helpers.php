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
if (!function_exists('generate_english_slug')) {
    /**
     * Generate English slug
     *
     * @param $content
     *
     * @throws ErrorException
     *
     * @return string
     */
    function generate_english_slug($content)
    {
        $locale = config('app.locale');
        if ('en' !== $locale) {
            $googleTranslate = new GoogleTranslate();
            $content  =  $googleTranslate->setUrl('http://translate.google.cn/translate_a/single')->setSource($locale)->translate($content);
        }
        return Str::slug($content);
    }
}

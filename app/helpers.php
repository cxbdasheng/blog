<?php
/**
 * Created by PhpStorm.
 * User: ChenDasheng
 * Date: 2020/3/11
 * Time: 21:04
 */

use App\Support\BaiduPushApi;
use Illuminate\Support\Str;
use PHPHtmlParser\Dom;
use Intervention\Image\Facades\Image;
use App\Support\TencentTranslate;
use App\Support\YoupaiOss;

if (!function_exists('youpai_oss_upload')) {
    /**
     * Upload pictures to oss
     * @param string $path path
     * @param string $content File stream
     * @param string $mime mime type
     * @return string
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    function youpai_oss_upload(string $path, string $content, string $mime)
    {
        if (!config('services.youpai.host') || !config('services.youpai.bucket') || !config('services.youpai.username') || !config('services.youpai.password')) {
            return '';
        }
        $youpaiOss = app()->make(YoupaiOss::class);
        try {
            $url = $youpaiOss->upload($path, $content, $mime);
        } catch (Exception $exception) {
            $url = '';
        }

        return $url === '' ? '' : $url;
    }
}

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
                $tencent_translate = app()->make(TencentTranslate::class);
                $content = $tencent_translate->toEnglish($content);
            } catch (Exception $exception) {
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
    /**
     *
     * @param $html
     * @return array
     * @throws \PHPHtmlParser\Exceptions\ChildNotFoundException
     * @throws \PHPHtmlParser\Exceptions\CircularException
     * @throws \PHPHtmlParser\Exceptions\ContentLengthException
     * @throws \PHPHtmlParser\Exceptions\LogicalException
     * @throws \PHPHtmlParser\Exceptions\NotLoadedException
     * @throws \PHPHtmlParser\Exceptions\StrictException
     */
    function get_image_paths_from_html($html)
    {
        $dom = new Dom();
        $dom->loadStr($html);
        /** @var \PHPHtmlParser\Dom\HtmlNode[] $image_tags */
        $image_tags = $dom->find('img');
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

if (!function_exists('translate')) {
    /**
     * Translate the given message, only return string (for PHPStan).
     *
     * @param array<string,string> $replace
     */
    function translate(string $key, $replace = [], string $locale = null): string
    {
        $result = __($key, $replace, $locale);

        if (is_array($result)) {
            throw new InvalidArgumentException('Only supports string translation, if you need to return an array, please use the __() method');
        }

        return $result ?? '';
    }
}

if (!function_exists('get_default_img')) {
    /**
     * 获取文章默认图片
     * @return string
     */
    function get_default_img()
    {
        return cdn_asset('/img/default.png');
    }
}
if (!function_exists('push_baidu_urls')) {
    /**
     * 推送链接给百度站长平台
     * @param array $urls 需要推送的域名
     * @return bool
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    function push_baidu_urls(array $urls)
    {
        $baiduPushApi = app()->make(BaiduPushApi::class);
        if (!$baiduPushApi->isOpen() || empty($urls)) {
            return false;
        }
        $res = $baiduPushApi->push($urls);
        if ($res) {
            return true;
        }
        return false;
    }
}

if (!function_exists('cdn_asset')) {
    /**
     * 获取 cdn 静态资源
     * @param $path 路径
     * @return string
     * @author chendashengpc
     */
    function cdn_asset($path)
    {
        if (!config('services.youpai.host') || !config('services.youpai.bucket') || !config('services.youpai.username') || !config('services.youpai.password')) {
            return asset($path);
        }
        return config('services.youpai.host') . '/blog/' . trim($path, '/');
    }
}

if (!function_exists('mk_dir')) {
    /**
     * 递归创建目录
     * @param $path 路径
     * @return bool
     * @author chendashengpc
     */
    function mk_dir($path)
    {
        //第1种情况，该目录已经存在
        if (is_dir($path)) {
            return true;
        }
        //第2种情况，父目录存在，本身不存在
        if (is_dir(dirname($path))) {
            mkdir($path);
        }
        //第3种情况，父目录不存在
        if (!is_dir(dirname($path))) {
            mk_dir(dirname($path));//创建父目录
            mkdir($path);
        }
        return true;
    }
}

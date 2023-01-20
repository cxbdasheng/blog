<?php

namespace App\Support;

use Illuminate\Support\Facades\Http;

/**
 * 又拍云上传
 */
class YoupaiOss
{

    private $bucket;
    private $username;
    private $password;
    const HOST = "http://v0.api.upyun.com";


    public function __construct(string $bucket, string $username, string $password)
    {
        $this->bucket = $bucket;
        $this->username = $username;
        $this->password = $password;
    }

    public function upload(string $path, string $content, string $mime)
    {

        $uri = "/{$this->bucket}$path";
        $response = Http::withBody(
            $content, $mime
        )->withHeaders($this->setHeaders($uri))->PUT(self::HOST . $uri);
        if ($response->successful()) {
            return config('services.youpai.host') . $path;
        }
        return '';
    }

    /**
     * 设置请求头
     * @param $uri 请求路径
     * @return array
     */
    public function setHeaders(string $uri)
    {
        $headers = [];
        $date = gmdate('D, d M Y H:i:s \G\M\T');
        $headers['Authorization'] = 'UPYUN ' . $this->username . ':' . $this->signature($uri, $date);
        $headers['Date'] = $date;
        return $headers;
    }

    /**
     * 签名认证
     * @param $uri 请求路径
     * @param $date 请求日期时间，GMT 格式字符串 (RFC 1123)，如 Wed, 29 Oct 2014 02:26:58 GMT
     * @return string
     */
    public function signature($uri, $date)
    {
        $signature = base64_encode(hash_hmac("sha1", "PUT&$uri&$date", md5("{$this->password}"), true));

        return $signature;
    }
}

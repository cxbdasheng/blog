<?php

namespace App\Support;

use Illuminate\Support\Facades\Http;

/**
 * Baidu push service
 */
class BaiduPushApi
{
    private $host;

    public function __construct()
    {
        $this->host = config('config.baidu_site_url');
    }

    /**
     * 推送
     * @param string $urls
     * @return bool
     */
    public function push(array $urls)
    {
        $response = Http::withBody(implode("\n", $urls), 'text/plain')->post($this->host);
        if ($response->successful()) {
            return true;
        }
        return false;
    }

    public function isOpen()
    {
        if ($this->host) {
            return true;
        }
        return false;
    }
}

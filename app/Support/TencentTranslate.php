<?php

namespace App\Support;

use TencentCloud\Common\Credential;
use TencentCloud\Common\Profile\ClientProfile;
use TencentCloud\Common\Profile\HttpProfile;
use TencentCloud\Tmt\V20180321\Models\TextTranslateRequest;
use TencentCloud\Tmt\V20180321\TmtClient;

class TencentTranslate
{
    private int $project_id;
    private TmtClient $tmt_client;
    private $status = false;

    public function __construct($secret_id, $secret_key, $region, $project_id)
    {
        if (!$secret_id || !$secret_key || !$region || !$project_id) {
            $this->status = false;
            return $this;
        }
        $this->project_id = $project_id;

        $credential = new Credential(
            $secret_id,
            $secret_key
        );

        $http_profile = new HttpProfile();
        $http_profile->setEndpoint('tmt.tencentcloudapi.com');

        $client_profile = new ClientProfile();
        $client_profile->setHttpProfile($http_profile);

        $this->tmt_client = new TmtClient($credential, $region, $client_profile);
        $this->status = true;
    }

    /**
     * @throws \JsonException
     */
    public function toEnglish(string $word): string
    {
        $request = new TextTranslateRequest();
        $request->fromJsonString(
            json_encode(
                [
                    'SourceText' => $word,
                    'Source' => 'auto',
                    'Target' => 'en',
                    'ProjectId' => $this->project_id,
                ],
                JSON_THROW_ON_ERROR
            )
        );

        return $this->tmt_client->TextTranslate($request)->TargetText;
    }

    public function isOpen()
    {
        return $this->status;
    }
}

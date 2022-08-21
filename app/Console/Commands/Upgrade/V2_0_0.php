<?php

namespace App\Console\Commands\Upgrade;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class V2_0_0 extends Command
{
    protected $signature = 'upgrade:v2.0.0';

    protected $description = 'Upgrade to v2.0.0';

    public const CONFIG = [
        [
            'id' => 229,
            'name' => 'services.tencent_cloud.secret_id',
            'value' => '',
            'created_at' => '2020-03-27 01:03:22',
            'updated_at' => '2020-03-27 01:03:22',
            'deleted_at' => null,
        ],
        [
            'id' => 230,
            'name' => 'services.tencent_cloud.secret_key',
            'value' => '',
            'created_at' => '2020-03-27 01:03:22',
            'updated_at' => '2020-03-27 01:03:22',
            'deleted_at' => null,
        ],
        [
            'id' => 231,
            'name' => 'services.tencent_cloud.region',
            'value' => '',
            'created_at' => '2020-03-27 01:03:22',
            'updated_at' => '2020-03-27 01:03:22',
            'deleted_at' => null,
        ],
        [
            'id' => 232,
            'name' => 'services.tencent_cloud.project_id',
            'value' => '',
            'created_at' => '2020-03-27 01:03:22',
            'updated_at' => '2020-03-27 01:03:22',
            'deleted_at' => null,
        ],
    ];

    public function handle(): int
    {
        foreach (self::CONFIG as $config) {
            DB::table('configs')->insertOrIgnore($config);
        }

        return 0;
    }
}

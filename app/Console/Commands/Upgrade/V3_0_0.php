<?php

namespace App\Console\Commands\Upgrade;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class V3_0_0 extends Command
{
    protected $signature = 'upgrade:v3.0.0';

    protected $description = 'Upgrade to v3.0.0';

    public function handle(): int
    {
        DB::table('configs')->insert([
            [
                'id' => 233,
                'name' => 'services.youpai.bucket',
                'value' => '',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
            [
                'id' => 234,
                'name' => 'services.youpai.username',
                'value' => '',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
            [
                'id' => 235,
                'name' => 'services.youpai.password',
                'value' => '',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ],
            [
                'id' => 236,
                'name' => 'services.youpai.host',
                'value' => '',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ]
        ]);

        return 0;
    }
}

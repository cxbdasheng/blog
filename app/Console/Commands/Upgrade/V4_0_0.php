<?php

namespace App\Console\Commands\Upgrade;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class V4_0_0 extends Command
{
    protected $signature = 'upgrade:v4.0.0';

    protected $description = 'Upgrade to v4.0.0';

    public function handle(): int
    {
        DB::table('configs')->insert([
            [
                'id' => 237,
                'name' => 'config.baidu_site_url',
                'value' => '',
                'created_at' => '2020-03-27 01:03:22',
                'updated_at' => '2020-03-27 01:03:22',
                'deleted_at' => null,
            ]
        ]);

        return 0;
    }
}

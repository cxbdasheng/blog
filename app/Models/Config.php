<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/3/26
 * Time: 23:56
 */

namespace App\Models;

class Config extends BaseModel
{
    protected $table = 'configs';
    protected $fillable = ['name', 'value'];
}

<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/3/24
 * Time: 21:41
 */

namespace App\Models;

class Nav extends BaseModel
{
    protected $table = 'navs';
    protected $fillable = ['name', 'url', 'sort'];
}

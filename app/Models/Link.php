<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/3/24
 * Time: 21:41
 */

namespace App\Models;

class Link extends BaseModel
{
    protected $table = 'links';
    protected $fillable = ['name', 'url', 'sort'];
}

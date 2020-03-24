<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/3/24
 * Time: 21:41
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Navs extends Model
{
    use SoftDeletes;
    protected $table = 'navs';
    protected $fillable = ['name', 'url', 'sort'];
}
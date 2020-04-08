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
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
class Navs extends Model
{
    use SoftDeletes,Cachable;
    protected $table = 'navs';
    protected $fillable = ['name', 'url', 'sort'];
}
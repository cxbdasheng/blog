<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/3/26
 * Time: 23:56
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
class Config extends Model
{
    use SoftDeletes,Cachable;
    protected $table = 'configs';
    protected $fillable = ['name', 'value'];
}
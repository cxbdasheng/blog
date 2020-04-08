<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/4/4
 * Time: 19:09
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
class SocialiteClient extends Model
{
    use SoftDeletes,Cachable;
    protected $table = 'socialite_clients';
    protected $fillable = ['name', 'name', 'client_id','client_secret'];

}
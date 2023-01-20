<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/4/4
 * Time: 19:09
 */

namespace App\Models;

class SocialiteClient extends BaseModel
{

    protected $table = 'socialite_clients';
    protected $fillable = ['name', 'name', 'client_id', 'client_secret'];

}

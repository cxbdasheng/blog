<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/4/4
 * Time: 20:09
 */

namespace App\Models;

use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;

class SocialiteUser extends BaseModel implements AuthenticatableContract, AuthorizableContract
{
    use Notifiable, Authenticatable, Authorizable;

    protected $table = 'socialite_users';
    protected $fillable = ['socialite_client_id', 'name', 'avatar', 'openid', 'access_token', 'last_login_ip', 'login_times', 'email', 'is_admin', 'remember_token'];

    public function socialiteClient()
    {
        return $this->belongsTo(SocialiteClient::class);
    }
}

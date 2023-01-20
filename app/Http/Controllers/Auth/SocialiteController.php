<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/4/4
 * Time: 19:08
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialiteClient;
use URL;
use Socialite;
use App\Models\SocialiteUser;
use Auth;
use GuzzleHttp\Client;
use Exception;

class SocialiteController extends Controller
{
    private $socialiteClients;

    public function __construct(Request $request)
    {
        $this->socialiteClients = SocialiteClient::all();
        $service = $request->route('service');
        // 因为发现有恶意访问回调地址的情况 此处限制允许使用的第三方登录方式
        if (!empty($service) && !$this->socialiteClients->pluck('name')->contains($service)) {
            return abort(404);
        }

    }

    public function redirectToProvider(Request $request, $service)
    {
        // 记录登录前的url
        $data = [
            'targetUrl' => URL::previous(),
        ];
        session($data);
        return Socialite::driver($service)->redirect();
    }

    public function handleProviderCallback(Request $request, SocialiteUser $socialiteUserModel, $service)
    {
        if (!$request->has('code')) {
            return abort(404);
        }
        // 定义各种第三方登录的type对应的数字
        $type = $this->socialiteClients->pluck('id', 'name');
        // 获取用户资料
        $user = Socialite::driver($service)->stateless()->user();
        // 查找此用户是否已经登录过
        $countMap = [
            'socialite_client_id' => $type[$service],
            'openid' => $user->id,
        ];
        $oldUserData = $socialiteUserModel->select('id', 'login_times', 'is_admin', 'email')
            ->where($countMap)
            ->first();
        // 如果已经存在;则更新用户资料  如果不存在;则插入数据
        $name = $user->nickname ?? $user->name;

        if ($oldUserData) {
            $userId = $oldUserData->id;
            // 更新数据
            SocialiteUser::where('id', $userId)->update([
                'name' => $name,
                'access_token' => $user->token,
                'last_login_ip' => $request->getClientIp(),
                'login_times' => $oldUserData->login_times + 1,
            ]);
            // 如果是管理员；则自动登录后台
            if ($oldUserData->is_admin) {
                Auth::guard('admin')->loginUsingId(1, true);
            }
        } else {
            $userId = SocialiteUser::create([
                'socialite_client_id' => $type[$service],
                'name' => $name,
                'openid' => $user->id,
                'access_token' => $user->token,
                'last_login_ip' => $request->getClientIp(),
                'login_times' => 1,
                'is_admin' => 0,
                'email' => (string)$user->email,
            ])->id;

            // 更新头像
            SocialiteUser::where('id', $userId)->update([
                'avatar' => config('app.url') . '/uploads/avatar/' . $userId . '.jpg',
            ]);
        }

        $avatarPath = public_path('uploads/avatar/' . $userId . '.jpg');
        try {
            // 下载最新的头像到本地
            $client = new Client();
            $client->request('GET', $user->avatar, [
                'sink' => $avatarPath,
            ]);
        } catch (Exception $e) {
            // 如果下载失败；则使用默认图片
            copy(public_path('img/default.jpg'), $avatarPath);
        }

        Auth::guard('socialite')->loginUsingId($userId, true);
        // 如果session没有存储登录前的页面;则直接返回到首页
        return redirect(session('targetUrl', url('/')));
    }

    public function logout()
    {
        Auth::guard('socialite')->logout();
        Auth::guard('admin')->logout();

        return redirect()->back();
    }
}

### 喜欢记得点个star，您的star将是我最大的鼓励和支持！！！

## 简介
* 陈大剩博客Tp5.1改版，基于Laravel、Layui开发。替换了Tp5.1富文编辑器，添加邮件通知、时间轴、图片水印、评论qq表情、第三方登入等新功能;   
* 本项目采用创作共用版权：[CC BY-NC 4.0](https://creativecommons.org/licenses/by-nc/4.0/deed.z)    
* 欢迎各位加入贡献者;

## 功能介绍
* 第三方登入
* 文章分类
* 文章标签
* 文章发布
* 文章分享
* 图片水印
* 评论功能
* 评论qq表情
* 浏览数统计
* 第三方用户统计
* 评论统计
* markdown文章编辑器
* 导航栏自定义
* 时间轴
* 文章评论
* 关键词
* 搜索功能
* 系统基本设置
* 友情链接
* 文件上传管理
* 邮件通知
* 流加载
* 首页banner图（Laravel正在开发、Tp版本已开发）

## 运行环境

- [PHP](https://php.net/) >= 7.25
- [Composer](https://getcomposer.org/) 
- [Mysql](https://www.mysql.com/) >= 5.7
- [Nginx](http://nginx.org/) Or  [Apache](https://www.apache.org/)

## 安装

下载项目
```bash
git clone https://github.com/qq851145971/blog.git
```
进入站点；  
```bash  
cd blog 
```  
我们需要复制跟目录下的 `.env.example` 文件并重命名为 `.env` ;  
```bash  
cp .env.example .env  
```  
使用 vim 编辑 .env 或者使用我们创建站点时候的 ftp ;  
```bash  
vim .env  
```  
我们需要改成自己的实际配置；  
APP_NAME 就是自己的项目名称比如我的陈大剩博客；  
APP_URL 就是我们的项目链接比如说我的 http://www.c69p.com；  
DB_DATABASE 就是我们的数据库名比如说 blog；  
DB_USERNAME 数据库用户名比如说 blog ；  
DB_PASSWORD 数据库密码比如说 \*\*\* ；  

使用 composer （注意使用国内镜像） ；  
```bash  
composer install  
```  
生成 key ；  
```bash  
php artisan key:generate  
```  
生成数据表；  
```bash  
php artisan migrate  
```  
生成初始化的数据；  
```bash  
php artisan db:seed  
```  
赋予权限（Windows服务器跳过）  
```bash  
chmod -R 755 *  
chmod -R 777 storage/
chmod -R 777 bootstrap/cache
```  
如果在 `db:seed` 之前迫不及待的访问了项目；  
因为缓存的问题再填充文件不会及时刷新；  
这时候可以使用清除缓存的命令;  
```bash
php artisan cache:clear
```

## 消息通知
如果安装了 `redis` ;  
`QUEUE_CONNECTION` 改为 `redis` ;  
如果已经根据 [laravel文档](https://laravel-china.org/docs/laravel/5.5/queues/1324) 配置好了队列；  
`QUEUE_CONNECTION` 改为 `redis` ;  
消息通知需要配置定时任务;

## composer
composer install --no-dev --optimize-autoloader

## 配置定时任务
```bash
crontab -e
```
添加如下命令；  
```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```
记得将`/path-to-your-project`替换为自己的项目目录;

## 第三方登入
你可以使用 github、 google、 qq、 weibo 登录；  

|名称 | 回调地址|
|:---: | :---:|
|qq | http://c69p.com/auth/oauth/handleProviderCallback/qq|
|weibo | http://c69p.com/auth/oauth/handleProviderCallback/weibo  |
|github | http://c69p.com/auth/oauth/handleProviderCallback/github |
|google | http://c69p.com/auth/oauth/handleProviderCallback/google|   

把 c69p.com 改成你自己的域名；  
## 后台管理
安装配置完成后就可以登录后台进行网站设置了；  
登录链接： `/admin` ;  
初始账号： test@test.com  
初始密码： 123456  
登录后记得修改密码；  

## 分支说明
- dev: 开发分支，我的博客会使用此分支代码先行测试
- master: 经过测试的的稳定代码
- feature/*: 用于增加新功能的分支

## 链接
- 博客：[http://c69p.com](http://c69p.com)   
- github：[https://github.com/qq851145971/blog](https://github.com/qq851145971/blog)   
- 码云：[https://gitee.com/CXBZY/ChenDashengblog](https://gitee.com/CXBZY/ChenDashengblog)    


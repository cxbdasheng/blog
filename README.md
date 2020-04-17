陈大剩博客
=================
站点演示：[陈大剩博客](http://c69p.com)  
喜欢记得点个star，您的star将是我最大的鼓励和支持！
## 运行环境

- [PHP](https://php.net/) >= 7.25
- [Composer](https://getcomposer.org/) 
- [Mysql](https://www.mysql.com/) >= 5.7

##安装

下载项目
```bash
git clone https://github.com/qq851145971/blog.git
```
进入站点；  
```bash  
cd blog 
```  
我们需要复制跟目录下的 `.env.example` 文件并重命名为 `.env` ；  
```bash  
cp .env.example .env  
```  
使用 vim 编辑 .env 或者使用我们创建站点时候的 ftp ；  
```bash  
vim .env  
```  
我们需要改成自己的实际配置；  
APP_NAME 就是自己的项目名称比如我的陈大剩博客；  
APP_URL 就是我们的项目链接比如说我的 http://new.c69p.com；  
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
如果在 `db:seed` 之前迫不及待的访问了项目；  
因为缓存的问题再填充文件不会及时刷新；  
这时候可以使用清除缓存的命令;  
```bash
php artisan cache:clear
```
### 消息通知
如果安装了 `redis` ;  
`CACHE_DRIVER` 改为 `redis` ;  
如果已经根据 [laravel文档](https://laravel-china.org/docs/laravel/5.5/queues/1324) 配置好了队列；  
`QUEUE_DRIVER` 改为 `redis` ;  
### composer
composer install --no-dev --optimize-autoloader
### 配置定时任务
```bash
crontab -e
```
添加如下命令；  
```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```
记得将`/path-to-your-project`替换为自己的项目目录;

### 后台管理
安装配置完成后就可以登录后台进行网站设置了；  
登录链接： `/admin` ；  
初始账号： test@test.com  
初始密码： 123456  
登录后记得修改密码；  

### 分支说明
- develop: 开发分支，我的博客会使用此分支代码先行测试
- master: 经过测试的的稳定代码
- feature/*: 用于增加新功能的分支

## 链接
- 博客：[http://c69p.com](http://c69p.com)   
- github：[https://github.com/qq851145971/blog](https://github.com/qq851145971/blog)   
- 码云：[https://gitee.com/CXBZY/ChenDashengblog](https://gitee.com/CXBZY/ChenDashengblog)    


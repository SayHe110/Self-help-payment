### 安装

---

#### 1.克隆源码
```shell
git clone git@github.com:SayHe110/Self-help-payment.git
cd Self-help-payment 
```

#### 2.安装扩展包依赖
```shell
composer install
```

#### 3.生成配置文件
```shell
cp .env.example .env
```

#### 4.修改配置文件
```php
# 数据库相关配置
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

# dingo 配置
API_STANDARDS_TREE=
API_SUBTYPE=
API_PREFIX=
API_VERSION=
API_DEBUG=

# 百度翻译
BAIDU_TRANSLATE_APPID=
BAIDU_TRANSLATE_KEY=
```

#### 5.生成密钥
```shell
php artisan key:generate
```

#### 6.设置jwtauth密钥用来签名的令牌
```
php artisan jwt:secret
```

#### 7.发布资源
```shell
php artisan vendor:publish --provider='Dingo\Api\Provider\LaravelServiceProvider'
```

#### 8.安装后台管理
运行以下命令发布后台管理资源：
```shell
php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
```
在该命令会生成配置文件 `config/admin.php`，可以在里面修改安装的地址、数据库连接、以及表名，建议都是用默认配置不修改。
<br>
然后运行下面的命令完成安装：
```
php artisan admin:install
```

安装后在浏览器中打开 `{host}/admin` ，使用用户名 `admin` 和密码 `admin` 进行登录
> {host} 为虚拟域名

#### 9.创建数据库并填充测试数据
```
php artisan migrate --seed
```

### 安装前端资源
```shell
npm install
npm run dev
```
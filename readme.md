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
<br>
# dingo 配置
API_STANDARDS_TREE=
API_SUBTYPE=
API_PREFIX=
API_VERSION=
API_DEBUG=
<br>
# 百度翻译
BAIDU_TRANSLATE_APPID=
BAIDU_TRANSLATE_KEY=
```

#### 5.生成密钥
```shell
php artisan key:generate
```

#### 6.发布资源
```shell
php artisan vendor:publish --provider='Dingo\Api\Provider\LaravelServiceProvider'
```

#### 7.安装前端资源
```shell
npm install
npm run dev
```
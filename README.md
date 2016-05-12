laravel-schema-extend
=====================

- support MySQL 'table comment'.
- 因为网上的不支持5.1以后的版本，所以自己改吧
- 让 laravel 的 Schema 支持 MySQL “表注释”，5.1以后已经内置了列注释。

---

> **不会对官方源码照成任何影响。**  
> 继承原生 schema，随源码更新。  


## 使用前的准备

在 composer.json 文件中申明依赖：

* support laravel 5.*
```json
"zedisdog/laravel-schema-extend": "～0.5"
```


在配置文件 `config/app.php` 中替换“别名”

```php
'aliases' => array(
    ...
    // 'Schema' => Illuminate\Support\Facades\Schema::class,
    'Schema'    => zedisdog\LaravelSchemaExtend\Schema::class,
),
```

## 使用方法

```php
Schema::create('tests', function ($table) {
    $table->increments('id')->comment('列注释');
    $table->comment = '表注释';
});
```

## 致谢

- [ghostboyzone](https://github.com/ghostboyzone)
- [xuhuan](https://github.com/xuhuan)
- [xiaobeicn](https://github.com/xiaobeicn)
- [5-say](https://github.com/5-say)

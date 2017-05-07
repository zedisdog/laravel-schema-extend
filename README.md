laravel-schema-extend
=====================

forked from zedisdog/laravel-schema-extend


- support MySQL 'table comment'.
- 'int' data type length setting


## 使用前的准备

在 composer.json 文件中申明依赖：

* support laravel 5.*
```json
"Jialeo/laravel-schema-extend": "～0.5"
```


在配置文件 `config/app.php` 中替换“别名”

```php
'aliases' => array(
    ...
    // 'Schema' => Illuminate\Support\Facades\Schema::class,
    'Schema'    => Jialeo\LaravelSchemaExtend\Schema::class,
),
```

## 使用方法

```php
Schema::create('tests', function ($table) {
    $table->increments('id')->comment('列注释');
    $table->comment = '表注释';

    $table->integer('int')->default(1)->length(1);
    $table->bigInteger('big')->default(1)->length(1);
    $table->smallInteger('small')->default(1)->length(1);
    $table->tinyInteger('tiny')->default(1)->length(1);
    $table->mediumInteger('medium')->default(1)->length(1);
});
```


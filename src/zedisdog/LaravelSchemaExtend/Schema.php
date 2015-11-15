<?php
namespace zedisdog\LaravelSchemaExtend;

use \Illuminate\Support\Facades\Facade;

class Schema extends Facade
{
    /**
     * Get a schema builder instance for a connection.
     *
     * @param  string  $name
     * @return \Illuminate\Database\Schema\Builder
     */
    public static function connection($name)
    {
        $connection = static::$app['db']->connection($name);
        return static::useCustomGrammar($connection);
    }

    /**
     * Get a schema builder instance for the default connection.
     *
     * @return \Illuminate\Database\Schema\Builder
     */
    protected static function getFacadeAccessor()
    {
        $connection = static::$app['db']->connection();
        return static::useCustomGrammar($connection);
    }


    /**
     * 引导系统调用我们自定义的 Grammar
     * @param $connection
     */
    protected static function useCustomGrammar($connection)
    {
        # 仅针对 MySqlGrammar
        if (get_class($connection) === 'Illuminate\Database\MySqlConnection') {
            $MySqlGrammar = $connection->withTablePrefix(new MySqlGrammar);
            $connection->setSchemaGrammar($MySqlGrammar);
        }

        return $connection->getSchemaBuilder();
    }

}
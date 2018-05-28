<?php
namespace Jialeo\LaravelSchemaExtend;

use Illuminate\Support\Fluent;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Connection;
use Illuminate\Database\Schema\Grammars\MySqlGrammar as BaseMySqlGrammar;

class MySqlGrammar extends BaseMySqlGrammar
{
    /**
     * Compile a create table command.
     *
     * @param  \Illuminate\Database\Schema\Blueprint $blueprint
     * @param  \Illuminate\Support\Fluent $command
     * @param  \Illuminate\Database\Connection $connection
     * @param string $comment
     * @return string
     */
    public function compileCreate(Blueprint $blueprint, Fluent $command, Connection $connection)
    {
        $sql = parent::compileCreate($blueprint, $command, $connection);
        // 添加注释
        if (isset($blueprint->comment))
        {
            $blueprint->comment = str_replace("'", "\'", $blueprint->comment);
            $sql .= " comment = '".$blueprint->comment."'";
        }
        // 添加自增起始值
        if (isset($blueprint->autoIncrement)) {
            $blueprint->autoIncrement = intval($blueprint->autoIncrement);
            $sql .= " auto_increment = {$blueprint->autoIncrement}";
        }
        return $sql;
    }


    /**
     * 重载typeInteger
     * Create the column definition for an integer type.
     *
     * @param  \Illuminate\Support\Fluent $column
     * @return string
     */
    public function typeInteger(Fluent $column)
    {
        $length_str = !empty($column->length) ? '(' . $column->length . ')' : '';

        return 'int' . $length_str;
    }

    /**
     * 重载typeBigInteger
     * Create the column definition for a big integer type.
     *
     * @param  \Illuminate\Support\Fluent $column
     * @return string
     */
    protected function typeBigInteger(Fluent $column)
    {
        $length_str = !empty($column->length) ? '(' . $column->length . ')' : '';

        return 'bigint' . $length_str;
    }

    /**
     * 重载typeMediumInteger
     * Create the column definition for a medium integer type.
     *
     * @param  \Illuminate\Support\Fluent $column
     * @return string
     */
    protected function typeMediumInteger(Fluent $column)
    {
        $length_str = !empty($column->length) ? '(' . $column->length . ')' : '';

        return 'mediumint' . $length_str;
    }

    /**
     * 重载typeTinyInteger
     * Create the column definition for a tiny integer type.
     *
     * @param  \Illuminate\Support\Fluent $column
     * @return string
     */
    protected function typeTinyInteger(Fluent $column)
    {
        $length_str = !empty($column->length) ? '(' . $column->length . ')' : '';

        return 'tinyint' . $length_str;
    }

    /**
     * 重载typeSmallInteger
     * Create the column definition for a small integer type.
     *
     * @param  \Illuminate\Support\Fluent $column
     * @return string
     */
    protected function typeSmallInteger(Fluent $column)
    {
        $length_str = !empty($column->length) ? '(' . $column->length . ')' : '';

        return 'smallint' . $length_str;
    }
}
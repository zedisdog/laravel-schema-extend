<?php namespace zedisdog\LaravelSchemaExtend;

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
        if (isset($blueprint->comment))
        {
            $blueprint->comment = str_replace("'", "\'", $blueprint->comment);
            $sql .= " comment = '".$blueprint->comment."'";
        }
        return $sql;
    }
}
<?php

namespace App\Services;

use DB;

/**
 * Class for generate CSV using MySql, but each implementation must define
 * the query without filters, the titles and the filename
 */
abstract class CsvGenerator
{
    protected $query;

    protected $titles;

    protected $filename;

    protected $with_where;

    public function where($field, $value, $not = false)
    {
        $reserverd_word = $this->with_where ? 'AND' : 'WHERE';
        $operator = $not ? '!=' : '=';
        $this->query .= "{$reserverd_word} {$field} {$operator} '{$value}'";
        $this->with_where = true;

        return $this;
    }

    public function whereIf($field, $value)
    {
        return ($value) ? $this->where($field, $value) : $this;
    }

    public function whereNot($field, $value)
    {
        return $this->where($field, $value, true);
    }

    public function orderBy($field, $direction = 'ASC')
    {
        $this->query .= " ORDER BY {$field} {$direction}";
    }

    public function execute()
    {
        $this->query .= "
            INTO OUTFILE '{$this->filename}'
            CHARACTER SET utf8
            FIELDS TERMINATED BY ','
            ENCLOSED BY '\"'
            LINES TERMINATED BY '\n'
        ";
        DB::statement($this->query);

        $file = file_get_contents($this->filename);
        file_put_contents($this->filename, $this->titles . "\n" . $file);

        return $this->filename;
    }
}

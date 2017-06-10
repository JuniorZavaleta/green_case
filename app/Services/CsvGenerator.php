<?php

namespace App\Services;

use DB;

/**
 * Class for generate CSV using MySql, but each implementation must define
 * the query without filters, the titles and the filename
 * @author Junior Zavaleta
 * @version 1.0
 */
abstract class CsvGenerator
{
    /**
     * Query for select data
     * @var string
     */
    protected $query;

    /**
     * Title for the csv file
     * @var string
     */
    protected $titles;

    /**
     * Filename with the path of the file
     * @var string
     */
    protected $filename;

    /**
     * Flag that allow know if a where exists
     * @var bool
     */
    protected $with_where;

    /**
     * Add a condition to the initial query
     * @param  string $field column name
     * @param  mixed  $value value to filter
     * @param  bool   $not   negation flag
     * @return CsvGenerator
     */
    public function where($field, $value, $not = false)
    {
        $reserverd_word = $this->with_where ? 'AND' : 'WHERE';
        $operator = $not ? '!=' : '=';
        $this->query .= "{$reserverd_word} {$field} {$operator} '{$value}'";
        $this->with_where = true;

        return $this;
    }

    /**
     * Function that add a condition if the value exists
     * @param  string $field column name
     * @param  string $value value to filter
     * @return CsvGenerator
     */
    public function whereIf($field, $value)
    {
        return ($value) ? $this->where($field, $value) : $this;
    }

    /**
     * Function that add a condition with negation
     * @param  string $field column name
     * @param  string $value value to filter
     * @return CsvGenerator
     */
    public function whereNot($field, $value)
    {
        return $this->where($field, $value, true);
    }

    /**
     * Only use before execute
     * @param  string $field     column name
     * @param  string $direction direction for order
     * @return CsvGenerator
     */
    public function orderBy($field, $direction = 'ASC')
    {
        $this->query .= " ORDER BY {$field} {$direction}";
    }

    /**
     * Function for generate csv and return the filename
     * @return string   filename of csv generated
     */
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

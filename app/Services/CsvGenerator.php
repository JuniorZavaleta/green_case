<?php

namespace App\Services;

use DB;

/**
 * Class for generate CSV using MySql, but each implementation must define
 * the query without filters, the titles and the filename
 * @author Junior Zavaleta
 * @version 1.0
 */
class CsvGenerator
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
     * Columns of the tables to export
     * @var string
     */
    protected $columns;

    /**
     * Main table to export
     * @var string
     */
    protected $table;

    /**
     * Join relationships with the main table or other table added on join
     * @var string
     */
    protected $joins;

    public function __construct(string $table, array $titles = [], array $columns = [])
    {
        $this->table = $table;
        $this->titles = is_array($titles) ? $this->setTitles($titles) : [];
        $this->columns = is_array($columns) ? $this->setTitles($columns) : [];
    }

    /**
     * Set the titles for the csv
     * @param mixed $titles
     */
    public function setTitles($titles)
    {
        $titles = is_array($titles) ? $titles : func_get_args();

        $this->titles = '"'.implode('", "',$titles).'"';
    }

    /**
     * Set the columns to export
     * @param mixed $columns
     */
    public function setColumns($columns)
    {
        $columns = is_array($columns) ? $columns : func_get_args();

        $this->columns = implode(', ', $columns);
    }

    /**
     * Set the filename of the csv for generated
     * @param string $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Add a join to the query
     * @param  string $table     table to join
     * @param  string $key_one   first key
     * @param  mixed  $operator  operator or second key
     * @param  string $key_two   second key if operator exists
     * @return CsvGenerator
     */
    public function join($table, $key_one, $operator, $key_two = null)
    {
        if (is_null($key_two)) {
            $key_two = $operator;
            $operator = '=';
        }

        $this->joins .= " JOIN {$table} ON {$key_one} {$operator} {$key_two} ";

        return $this;
    }

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
        $query = "SELECT {$this->columns} FROM $this->table ";

        if ($this->joins) {
            $query .= $this->joins;
        }

        $query .= $this->query;

        if (is_null($this->filename)) {
            $this->filename = '/tmp/file.csv';
        }

        $query .= "
            INTO OUTFILE '{$this->filename}'
            CHARACTER SET utf8
            FIELDS TERMINATED BY ','
            ENCLOSED BY '\"'
            LINES TERMINATED BY '\n'
        ";

        DB::statement($query);

        if ($this->titles) {
            $file = file_get_contents($this->filename);
            file_put_contents($this->filename, $this->titles . "\n" . $file);
        }

        return $this->filename;
    }
}

<?php

class Database
{
    public $tableName;
    public $connect;
    public $query;
    public $queryResult;

    protected function __construct()
    {
        $this->connect = new mysqli(SERVER_HOST, SERVER_USERNAME, SERVER_PASSWORD, DB_NAME);
        if ($this->connect->connect_errno) {
            echo "Error: " . $this->connect->connect_error;
            exit();
        }
    }

    public function insert($post)
    {
        $keys = " (";
        $values = "(";
        foreach (array_keys($post) as $key) {
            $keys .= $key . ', ';
            $values .= "'" . $this->connect->real_escape_string($post[$key]) . "', ";
        }
        $keys = substr($keys, 0, -2) . ')';
        $values = substr($values, 0, -2) . ')';
        $this->query = "INSERT INTO " . $this->tableName . $keys . " VALUES " . $values;
        return $this;
    }

    public function select()
    {
        $this->query .= "SELECT * FROM " . $this->tableName;
        return $this;
    }

    public function delete()
    {
        $this->query = "DELETE FROM " . $this->tableName;
        return $this;
    }

    public function update($post)
    {
        $str = '';
        $this->query = "UPDATE " . $this->tableName . " SET ";
        foreach (array_keys($post) as $key) {
            $str .= $key . " = '" . $this->connect->real_escape_string($post[$key]) . "', ";
        }
        $str = substr($str, 0, -2);
        $this->query .= $str;
        return $this;
    }

    public function where($fieldName, $operator, $value)
    {
        if (strpos($this->query, "WHERE")) {
            $this->query .= " " . $fieldName . " " . $operator . " '" . $this->connect->real_escape_string($value) . "'";
        } else {
            $this->query .= " WHERE " . $fieldName . " " . $operator . " '" . $this->connect->real_escape_string($value) . "' ";
        }
        return $this;
    }

    public function and()
    {
        $this->query .= " AND ";
        return $this;
    }

    public function order($field)
    {
        $this->query .= " ORDER BY " . $field;
        return $this;
    }

    public function desc()
    {
        $this->query .= " DESC ";
        return $this;
    }

    public function execute()
    {
        $this->queryResult = mysqli_query($this->connect, $this->query);
        return $this;
    }

    public function numRows()
    {
        if ($this->queryResult) {
            return mysqli_num_rows($this->queryResult);
        } else {
            return false;
        }
    }

    public function fetchAssoc()
    {
        if ($this->queryResult) {
            $array = mysqli_fetch_array($this->queryResult);
            return $array;
        } else {
            return false;
        }
    }

    public function fetchAssocs()
    {
        $array = [];
        for ($i = 0; $i < mysqli_num_rows($this->queryResult); $i++) {
            $array[] = mysqli_fetch_assoc($this->queryResult);
        }
        return $array;
    }
}

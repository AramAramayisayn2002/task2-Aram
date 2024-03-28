<?php
class Admin extends Database
{
    public function __construct()
    {
        $this->tableName = 'admin';
        parent::__construct();
    }
}
<?php
class Posts extends Database
{
    public function __construct()
    {
        $this->tableName = 'posts';
        parent::__construct();
    }
}
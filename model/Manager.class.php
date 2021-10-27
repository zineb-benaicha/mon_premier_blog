<?php

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=mon_blog;charset=utf8', 'root', 'root');
        return $db;
    }
}
<?php

    namespace application\core;

    class Model
    {
        public $dbh, $className;
        public function __construct()
        {
            //$this->dbh = new PDO("mysql:dbname=".DATABASE.";host=".HOSTNAME , USERNAME, PASSWORD);
        }
        public function setClassName($className)
        {
            $this->className = $className;
        }

        public function set_query($sql, $params=Array())
        {
            $sth = $this->dbh->prepare($sql);
            $sth->execute($params);
            return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
        }

        public function get_data($data = null)
        {
            return $data;
        }

    }

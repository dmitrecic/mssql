<?php
class DBConnection 
{
    private $dbname="";
    private $dbhost="";
    private $dbuser="";
    private $dbpass="";
    private $dbcredentials=array();

    public function setDbName($name)
    {
        $this->dbname=$name;
    }

    public function setDbHost($host)
    {
        $this->dbhost=$host;
    }

    public function setDbUser($user)
    {
        $this->dbuser=$user;
    }

    public function setDbPass($pass)
    {
        $this->dbpass=$pass;
    }

    private function prepCredentials()
    {
        $this->dbcredentials=array("Database"=>$this->dbname, "UID"=>$this->dbuser, "PWD"=>$this->dbpass);
    }

    public function connect()
    {
        $this->prepCredentials();
        return sqlsrv_connect( $this->dbhost, $this->dbcredentials);
    }
}
<?php 
 class Database{
    private $dbHost = "host";
    private $dbUser = "user";
    private $dbPassword = "password";
    private $dbName = "database name";

    private $error;
    private $stmt;
    
    public function __construct()
    {
        $this->startDb();
    }

    public function startDb(){
        try
        {
            $this->pdo = new PDO("mysql:host={$this->dbHost};dbname={$this->dbName}",$this->dbUser,$this->dbPassword);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
             $this->error = $e->getMessage();
        }
    }  //startDb()

    
    public function lastInsertId(){
        return $this->lastInsertId();
    }//lastInsertId

    
} //class Database
?>
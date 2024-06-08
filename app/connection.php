<?php
	namespace App;
	require_once("constants.php");
class Connection{
	public $host = HOST;
	public $db_name = DB_NAME;
	public $username = USERNAME;
	public $password = PASSWORD;
	public function connect(){
		try{
			$pdo = new \PDO("mysql:host=$this->host;dbname=$this->db_name;charset=utf8", $this->username, $this->password); 
			$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			return $pdo;
		} catch(\Exception $e){
			exit ('Ошибка подключения: <br><br>' . $e -> getMessage());
		}
	}
}
?>
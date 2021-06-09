<?php
class DB{
	private static $instance = NULL;
    public static function getInstance() {
		//self::<static member> : accessing a static member of itself
      if (!isset(self::$instance)) {
        try {
          self::$instance = new PDO("sqlsrv:server=DESKTOP-L0PL56H\MSSQLSERVER,1433;Database=OnlineMusicHub;ConnectionPooling=0");
        } catch (PDOException $ex) {
          die($ex->getMessage());
        }
      }
      return self::$instance;
	}
}
?>

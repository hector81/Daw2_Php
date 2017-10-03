<?php


	class connect{
		

		
		public static function create(){
			try{
				
				return new PDO("sqlsrv:Server=localhost;Database=cadenaTiendas");

			}catch(PDOException $e){
				print "ERROR!: " . $e->getMessage(). "</br>";
			}
		}
		
	}



/*class MyDatabaseFactory {


    public static function create($type=null) {
        switch ($type) {
            case 0:
                return self::ro();
                break;
            case 1:
                return self::admin();
                break;
            default:
                return self::ro();
                break;
            }
}


    private static function ro() {
        try {
            # MySQL with PDO_MYSQL (Read-only access)
            $dbhost = 'localhost';
            $dbname = 'dbname';
            $dbuser = 'dbuser';
            $dbpass = 'dbpass';
            return new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }  
    }


    private static function admin() {
        try {
            # MySQL with PDO_MYSQL
            $dbhost = 'localhost ';
            $dbname = 'dbname';
            $dbuser = 'dbadminuser';
            $dbpass = 'dbadminpass';
            return new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }  
    }

}*/	
?>



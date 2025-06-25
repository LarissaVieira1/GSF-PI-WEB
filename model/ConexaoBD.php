<?php 
class ConexaoBD {
    private static $pdo;

    public static function getConexao() {
        if (!isset(self::$pdo)) {
            $host = "localhost";
            $dbname = "gsf";
            $user = "root";  
            $password = "admin";


            try {
                // Conectar ao banco com PDO
                $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
                // Ativar o modo de erros
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                echo "Erro ao conectar: " . $e->getMessage();
            }
        }
        return self::$pdo;
    }  
}  
?>
<?php


require_once 'conf.php';



class Connexion {
    protected static $db;

    // Établir la connexion à la base de données
    public static function init() {
        try {
            $dsn = "mysql:host=" . Conf::getHostname() . ";dbname=" . Conf::getDatabase();
            self::$db = new PDO($dsn, Conf::getLogin(), Conf::getPassword());
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           // echo "Connexion à la base de données établie avec succès." ."</br>";
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
            //echo "Connexion à la base de données non réussie.";
        }
    }

    // Obtenir l'instance de la connexion à la base de données
    public static function getDb() {
        if (!self::$db) {
            self::init();
        }
        return self::$db;
    }
}



?>

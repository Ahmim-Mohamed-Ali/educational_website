<?php

class Conf {
    private static $hostname = "db"; // Nom de l'hôte pour docker sinon localhost
    private static $login = "php_docker"; // Login de la base de données pour docker sinon pour wamp changer par root
    private static $password = "pass"; // Mot de passe de la base de données pour docker sinon changez par root
    private static $database = "php_docker"; // Nom de la base de données pour docker sinon phpdatabase

    // Fonction pour récupérer le login de la base de données
    public static function getLogin() {
        return self::$login;
    }

    // Fonction pour récupérer le nom de l'hôte de la base de données
    public static function getHostname() {
        return self::$hostname;
    }

    // Fonction pour récupérer le mot de passe de la base de données
    public static function getPassword() {
        return self::$password;
    }

    // Fonction pour récupérer le nom de la base de données
    public static function getDatabase() {
        return self::$database;
    }
}

?>
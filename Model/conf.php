<?php

class Conf {
    private static $hostname = "localhost"; // Nom de l'hôte
    private static $login = "root"; // Login de la base de données
    private static $password = "root"; // Mot de passe de la base de données
    private static $database = "phpdatabase"; // Nom de la base de données

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
<?php
try {
    $pdo = new PDO('mysql:host=localhost', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create database
    $pdo->exec("CREATE DATABASE IF NOT EXISTS ogame");

    // Use the database
    $pdo->exec("USE ogame");

    // Create tables
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS players (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(100) NOT NULL,
            metal INT DEFAULT 1000,
            crystal INT DEFAULT 1000,
            deuterium INT DEFAULT 1000
        )
    ");

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS planets (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            description TEXT,
            temperature INT,
            player_id INT,
            metal INT DEFAULT 1000,
            crystal INT DEFAULT 1000,
            deuterium INT DEFAULT 1000,
            FOREIGN KEY (player_id) REFERENCES players(id)
        )
    ");

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS fleets (
            id INT AUTO_INCREMENT PRIMARY KEY,
            player_id INT,
            planet_id INT,
            ships INT DEFAULT 0,
            FOREIGN KEY (player_id) REFERENCES players(id),
            FOREIGN KEY (planet_id) REFERENCES planets(id)
        )
    ");

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS combats (
            id INT AUTO_INCREMENT PRIMARY KEY,
            attacker_id INT,
            defender_id INT,
            result VARCHAR(50),
            FOREIGN KEY (attacker_id) REFERENCES players(id),
            FOREIGN KEY (defender_id) REFERENCES players(id)
        )
    ");

    // Create new tables for ships and weapons
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS ships (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            type VARCHAR(50) NOT NULL,
            player_id INT,
            fleet_id INT,
            FOREIGN KEY (player_id) REFERENCES players(id),
            FOREIGN KEY (fleet_id) REFERENCES fleets(id)
        )
    ");

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS weapons (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            damage INT NOT NULL,
            range INT NOT NULL,
            ship_id INT,
            FOREIGN KEY (ship_id) REFERENCES ships(id)
        )
    ");

    echo "Database and tables created successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

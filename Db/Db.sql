CREATE DATABASE testgame;

USE ogame;

-- Players table
CREATE TABLE players (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    metal INT DEFAULT 1000,
    crystal INT DEFAULT 1000,
    deuterium INT DEFAULT 1000
);

-- Planets table
CREATE TABLE planets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    player_id INT,
    metal INT DEFAULT 1000,
    crystal INT DEFAULT 1000,
    deuterium INT DEFAULT 1000,
    FOREIGN KEY (player_id) REFERENCES players(id)
);

-- Fleets table
CREATE TABLE fleets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    player_id INT,
    planet_id INT,
    ships INT DEFAULT 0,
    FOREIGN KEY (player_id) REFERENCES players(id),
    FOREIGN KEY (planet_id) REFERENCES planets(id)
);

-- Combat table
CREATE TABLE combats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    attacker_id INT,
    defender_id INT,
    result VARCHAR(50),
    FOREIGN KEY (attacker_id) REFERENCES players(id),
    FOREIGN KEY (defender_id) REFERENCES players(id)
);

<?php

class Planet {
    private $id;
    private $name;
    private $description;
    private $temperature;
    private $resources;

    public function __construct($id) {
        $this->id = $id;
        $this->loadPlanetData();
    }

    private function loadPlanetData() {
        $pdo = new PDO('mysql:host=localhost;dbname=ogame', 'root', '');
        $stmt = $pdo->prepare("SELECT * FROM planets WHERE id = ?");
        $stmt->execute([$this->id]);
        $planet = $stmt->fetch();

        $this->name = $planet['name'];
        $this->description = $planet['description'];
        $this->temperature = $planet['temperature'];
        $this->resources = [
            'metal' => $planet['metal'],
            'crystal' => $planet['crystal'],
            'deuterium' => $planet['deuterium']
        ];
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getTemperature() {
        return $this->temperature;
    }

    public function getResources() {
        return $this->resources;
    }

    public function setResources($resources) {
        $this->resources = $resources;
        $pdo = new PDO('mysql:host=localhost;dbname=ogame', 'root', '');
        $stmt = $pdo->prepare("UPDATE planets SET metal = ?, crystal = ?, deuterium = ? WHERE id = ?");
        $stmt->execute([$resources['metal'], $resources['crystal'], $resources['deuterium'], $this->id]);
    }

    public function setDescription($description) {
        $this->description = $description;
        $pdo = new PDO('mysql:host=localhost;dbname=ogame', 'root', '');
        $stmt = $pdo->prepare("UPDATE planets SET description = ? WHERE id = ?");
        $stmt->execute([$description, $this->id]);
    }

    public function setTemperature($temperature) {
        $this->temperature = $temperature;
        $pdo = new PDO('mysql:host=localhost;dbname=ogame', 'root', '');
        $stmt = $pdo->prepare("UPDATE planets SET temperature = ? WHERE id = ?");
        $stmt->execute([$temperature, $this->id]);
    }
}
?>

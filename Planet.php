<?php
class Planet {
    private $id;
    private $name;
    private $resources;

    public function __construct($id) {
        $this->id = $id;
        $this->loadPlanetData();
    }

    private function loadPlanetData() {
        // Load planet data from the database
        $pdo = new PDO('mysql:host=localhost;dbname=ogame', 'root', '');
        $stmt = $pdo->prepare("SELECT * FROM planets WHERE id = ?");
        $stmt->execute([$this->id]);
        $planet = $stmt->fetch();

        $this->name = $planet['name'];
        $this->resources = [
            'metal' => $planet['metal'],
            'crystal' => $planet['crystal'],
            'deuterium' => $planet['deuterium']
        ];
    }

    public function getName() {
        return $this->name;
    }

    public function getResources() {
        return $this->resources;
    }

    public function setResources($resources) {
        $this->resources = $resources;
        // Update resources in the database
        $pdo = new PDO('mysql:host=localhost;dbname=ogame', 'root', '');
        $stmt = $pdo->prepare("UPDATE planets SET metal = ?, crystal = ?, deuterium = ? WHERE id = ?");
        $stmt->execute([$resources['metal'], $resources['crystal'], $resources['deuterium'], $this->id]);
    }

    // Additional methods for planet actions can be added here
}
?>

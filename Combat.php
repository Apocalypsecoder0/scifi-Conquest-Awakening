<?php
class Combat {
    private $attacker;
    private $defender;

    public function __construct($attacker, $defender) {
        $this->attacker = $attacker;
        $this->defender = $defender;
    }

    public function battle() {
        // Simple combat logic
        $attackerShips = $this->attacker->getShips();
        $defenderShips = $this->defender->getShips();

        $attackerLosses = rand(0, $attackerShips);
        $defenderLosses = rand(0, $defenderShips);

        $attackerShips -= $attackerLosses;
        $defenderShips -= $defenderLosses;

        $this->attacker->setShips($attackerShips);
        $this->defender->setShips($defenderShips);

        // Determine result
        if ($attackerShips > $defenderShips) {
            $result = 'Attacker wins';
        } elseif ($defenderShips > $attackerShips) {
            $result = 'Defender wins';
        } else {
            $result = 'Draw';
        }

        // Save combat result in database
        $pdo = new PDO('mysql:host=localhost;dbname=ogame', 'root', '');
        $stmt = $pdo->prepare("INSERT INTO combats (attacker_id, defender_id, result) VALUES (?, ?, ?)");
        $stmt->execute([$this->attacker->getPlayerId(), $this->defender->getPlayerId(), $result]);

        return $result;
    }
}
?>

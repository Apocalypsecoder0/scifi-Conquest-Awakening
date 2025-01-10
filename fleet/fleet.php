<?php
session_start();
include 'includes/header.php';
include 'classes/Player.php';
include 'classes/Fleet.php';
include 'classes/Ship.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    echo "<p>You must <a href='index.php?page=login'>log in</a> to manage your fleets.</p>";
    include 'includes/footer.php';
    exit();
}

$username = $_SESSION['username'];
$pdo = new PDO('mysql:host=localhost;dbname=ogame', 'root', '');
$stmt = $pdo->prepare("SELECT * FROM players WHERE username = ?");
$stmt->execute([$username]);
$player = $stmt->fetch();
$player_id = $player['id'];

$fleet = new Fleet();
$ship = new Ship();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create_ship'])) {
        $name = $_POST['name'];
        $type = $_POST['type'];
        $fleet_id = $_POST['fleet_id'];
        $ship->createShip($name, $type, $player_id, $fleet_id);
    } elseif (isset($_POST['add_weapon'])) {
        $ship_id = $_POST['ship_id'];
        $weapon_name = $_POST['weapon_name'];
        $damage = $_POST['damage'];
        $range = $_POST['range'];
        $ship->addWeapon($ship_id, $weapon_name, $damage, $range);
    }
}

$fleets = $fleet->getFleets($player_id);
?>

<main>
    <h2>Your Fleets</h2>
    <?php if (count($fleets) > 0): ?>
        <ul>
            <?php foreach ($fleets as $fleet): ?>
                <li>
                    Fleet ID: <?php echo $fleet['id']; ?> - Ships: <?php echo $fleet['ships']; ?>
                    <ul>
                        <?php
                        $ships = $ship->getShips($fleet['id']);
                        foreach ($ships as $s): ?>
                            <li>
                                Ship Name: <?php echo $s['name']; ?> - Type: <?php echo $s['type']; ?>
                                <ul>
                                    <?php
                                    $weapons = $ship->getWeapons($s['id']);
                                    foreach ($weapons as $weapon): ?>
                                        <li>
                                            Weapon: <?php echo $weapon['name']; ?> - Damage: <?php echo $weapon['damage']; ?> - Range: <?php echo $weapon['range']; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <form action="fleet.php" method="post">
                                    <input type="hidden" name="add_weapon">
                                    <input type="hidden" name="ship_id" value="<?php echo $s['id']; ?>">
                                    <label for="weapon_name">Weapon Name:</label>
                                    <input type="text" id="weapon_name" name="weapon_name" required>
                                    <label for="damage">Damage:</label>
                                    <input type="number" id="damage" name="damage" required>
                                    <label for="range">Range:</label>
                                    <input type="number" id="range" name="range" required>
                                    <button type="submit">Add Weapon</button>
                                </form>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>You do not have any fleets yet.</p>
    <?php endif; ?>

    <h3>Create a New Ship</h3>
    <form action="fleet.php" method="post">
        <input type="hidden" name="create_ship">
        <input type="hidden" name="player_id" value="<?php echo $player_id; ?>">
        <label for="name">Ship Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="type">Ship Type:</label>
        <input type="text" id="type" name="type" required>
        <label for="fleet_id">Fleet ID:</label>
        <input type="number" id="fleet_id" name="fleet_id" required>
        <button type="submit">Create Ship</button>
    </form>
</main>

<?php
include 'includes/footer.php';
?>

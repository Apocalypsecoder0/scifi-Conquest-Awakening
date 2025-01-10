# scifi-conquest-game
# scifi conquest MMORPG

test game MMORPG is a text-based turn-based strategy game where players can explore the universe, manage resources, build fleets, and engage in interstellar combat. This project is a simplified implementation inspired by the classic Ogame MMORPG.

## Features

- **Player Management:** Register and log in as a player.
- **Resource Management:** Manage resources such as metal, crystal, and deuterium.
- **Fleet Management:** Build and manage fleets for combat.
- **Turn-Based Combat:** Engage in turn-based fleet combat with other players.
- **Universe Exploration:** Explore galaxies and planets.

## Getting Started

### Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web Server (e.g., Apache, Nginx)

### Installation

1. **Clone the repository:**
    ```bash
    git clone https://github.com/yourusername/game-mmorpg.git
    cd tgame-mmorpg
    ```

2. **Set up the database:**
    - Create a new MySQL database:
      ```sql
      CREATE DATABASE ogame;
      ```
    - Import the provided SQL script to set up the tables:
      ```bash
      mysql -u yourusername -p ogame < database/ogame.sql
      ```
    - Update the database configuration in the `config.php` file:
      ```php
      <?php
      define('DB_HOST', 'localhost');
      define('DB_NAME', 'ogame');
      define('DB_USER', 'yourusername');
      define('DB_PASS', 'yourpassword');
      ?>
      ```

3. **Start the web server:**
    - Ensure your web server is configured to serve the project directory.

4. **Access the game:**
    - Open your web browser and navigate to `http://localhost/ogame-mmorpg/`.

### Project Structure

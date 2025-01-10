# scifi-conquest-game
Apocalyptic Online Server
# scifi conquest MMORPG
GalaxyCore Engine:
test game MMORPG is a text-based turn-based strategy game where players can explore the universe, manage resources, build fleets, and engage in interstellar combat. This project is a simplified implementation inspired by the classic Ogame MMORPG.

## Features

- **Player Management:** Register and log in as a player.
- **Resource Management:** Manage resources such as metal, crystal, and deuterium.
- **Fleet Management:** Build and manage fleets for combat.
- **Turn-Based Combat:** Engage in turn-based fleet combat with other players.
- **Universe Exploration:** Explore galaxies and planets.
- unit management attack troop and defince troop 
## Getting Started

### Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web Server (e.g., Apache, Nginx)

### Installation

1. **Clone the repository:**
    ```bash
    git clone https://github.com/Apocalypsecoder0/game-mmorpg.git
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
      define('DB_NAME', 'game');
      define('DB_USER', 'yourusername');
      define('DB_PASS', 'yourpassword');
      ?>
      ```

3. **Start the web server:**
    - Ensure your web server is configured to serve the project directory.

4. **Access the game:**
    - Open your web browser and navigate to `http://localhost/game-mmorpg/`.

### Project Structure
### Classes

- **Player:** Handles player data and actions.
- **Planet:** Manages planetary resources.
- **Fleet:** Manages fleet data and actions.
- **Combat:** Handles turn-based combat mechanics.

### Pages

- **Home:** Welcome page with game overview.
- **Login:** Player login page.
- **Register:** Player registration page.
- **Actions:** Handles player actions like attacking other players.

## Contributing

Contributions are welcome! Please fork the repository and create a pull request with your changes.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Acknowledgements

- Inspired by the classic Ogame MMORPG.
- Special thanks to the open-source community for their invaluable resources and support.

## Contact

For questions or suggestions, please open an issue on GitHub or contact the project maintainer at your.email@example.com.

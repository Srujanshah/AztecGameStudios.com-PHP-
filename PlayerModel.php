<?php

namespace AztecGameStudios\Models;

use AztecGameStudios\Domain\Player;
use AztecGameStudios\Exceptions\NotFoundException;
use PDO;

class PlayerModel extends AbstractModel {
    
    public function get(int $playerId): Player {
        $query = 'SELECT * FROM players WHERE players_id = :player';
        $stmt = $this->db->prepare($query);
        $stmt->execute(['player' => playerId]);
        
        $row = $stmt->fetch();

        if(empty($row)) {
            throw new NotFoundException();
        }

        // Return a person class based on database stuff using ID

        $player = Player::create()->setId($row["players_id"])
            ->setScreenName($row["screenName"])
            ->setFirstname($row["firstName"])
            ->setLastname($row["lastName"])
            ->setDob($row["dob"])
            ->setEmail($row["email"])
            ->setPassword($row["password"]);
        return $player;
    }

    public function getByEmail(string $email): Player {
        $query = 'SELECT * FROM players WHERE email = :player';
        $stmt = $this->db->prepare($query);
        $stmt->execute(['player' => $email]);

        $row = $stmt->fetch();

        if(empty($row)) {
            throw new NotFoundException();
        }

        // Return a person class based on database stuff using Email

        $player = Player::create()->setId($row["players_id"])
        ->setScreenName($row["screenName"])
        ->setFirstname($row["firstName"])
        ->setLastname($row["lastName"])
        ->setDob($row["dob"])
        ->setEmail($row["email"])
        ->setPassword($row["password"]);
    return $player;
    }
}

?>
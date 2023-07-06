<?php

namespace Model;

use Base\Model;

class Infolettre extends Model {
    // Nom de la table associée à ce modèle
    protected $table = "infolettre";

    public function ajouter($nom, $courriel) {
        $sql = "INSERT INTO $this->table (nom, courriel)
                VALUES (:nom, :courriel)";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":nom" => $nom,
            ":courriel" => $courriel,
        ]);
    }
}
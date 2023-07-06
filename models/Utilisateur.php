<?php

namespace Model;

use Base\Model;

class Utilisateur extends Model {
    // Nom de la table associée à ce modèle
    protected $table = "utilisateurs";

    public function ajouter($nom, $courriel, $mdp) {
        $sql = "INSERT INTO $this->table (nom, courriel, mot_de_passe)
                VALUES (:nom, :courriel, :mot_de_passe)";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":nom" => $nom,
            ":courriel" => $courriel,
            ":mot_de_passe" => $mdp,
        ]);
    }

    public function modifier($id, $nom, $courriel, $mdp) {
        $sql = "UPDATE $this->table
                SET 
                    nom = :nom, 
                    courriel = :courriel";

        if ($mdp !== null) {
            $sql .= ", mot_de_passe = :mot_de_passe";
        }

        $sql .= " WHERE id = :id";

        $requete = $this->pdo()->prepare($sql);

        $params = [
            ":nom" => $nom,
            ":courriel" => $courriel,
            ":id" => $id,
        ];

        if ($mdp !== null) {
            $params[":mot_de_passe"] = $mdp;
        }

        return $requete->execute($params);
        
    }

    public function parCourriel($courriel) {
        $sql = "SELECT *
                FROM $this->table
                WHERE courriel = :courriel";

        $requete = $this->pdo()->prepare($sql);

        $requete->execute([":courriel" => $courriel]);

        return $requete->fetch();
    }
}
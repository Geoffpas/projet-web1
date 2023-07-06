<?php

namespace Model;

use Base\Model;

class Menu extends Model {
    protected $table = "menu";

    public function ajouter($nom, $description, $prix, $categorie_id) {
        $sql = "INSERT INTO $this->table (nom, description, prix, categorie_id) 
                VALUES (:nom, :description, :prix, :categorie_id)";
        
        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":nom" => $nom,
            ":description" => $description,
            ":prix" => $prix,
            ":categorie_id" => $categorie_id
        ]);
    }


    public function supprimer($id) {
        $sql = "DELETE FROM $this->table
        WHERE id = :id";

        $requete = $this->pdo()->prepare($sql);

        return $requete->execute([
            ":id" => $id
        ]);
    }

    public function modifier($id, $nom, $description, $prix, $categorie_id) {
        $sql = "UPDATE $this->table 
                SET
                    nom = :nom,
                    description = :description,
                    prix = :prix,
                    categorie_id = :categorie_id
                WHERE 
                    id = :id";
    
        $requete = $this->pdo()->prepare($sql);
    
        return $requete->execute([
            ":id" => $id,
            ":nom" => $nom,
            ":description" => $description,
            ":prix" => $prix,
            ":categorie_id" => $categorie_id
        ]);
    }

    public function parCategorie($categorie) {
        $sql = "SELECT
                    menu.id,
                    menu.nom,
                    menu.description,
                    menu.prix,
                    menu.categorie_id
                FROM 
                    menu
                JOIN 
                    categories
                ON
                    menu.categorie_id = categories.id
                WHERE
                    categories.nom = :categorie";

        $requete = $this->pdo()->prepare($sql);

        $requete->execute([":categorie" => $categorie]);

        return $requete->fetchAll();

    }
}


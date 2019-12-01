<?php
    require_once "db.php";
    function addClient(string $nom,string $prenom,string $telephone,string $email,string $adresse):int{
        $pdo = getPdo();
        $sql = $pdo->prepare("INSERT INTO client VALUES(NULL,:nom,:prenom,:telephone,:email,:adresse)");
        $sql->bindValue(':nom',$nom,PDO::PARAM_STR);
        $sql->bindValue(':prenom',$prenom,PDO::PARAM_STR);
        $sql->bindValue(':telephone',$telephone,PDO::PARAM_STR);
        $sql->bindValue(':email',$email,PDO::PARAM_STR);
        $sql->bindValue(':adresse',$adresse,PDO::PARAM_STR);

        $sql->execute();

       return $pdo->lastInsertId();
    }
    function findAllClients(){
        $pdo = getPdo();

        $query = $pdo->prepare("SELECT * FROM client");

        $query->execute();

        return $query->fetchAll();
    }
    function updateClient($id,$nom,$prenom,$adresse,$telephone){
        $pdo = getPdo();
        $requete = $pdo->prepare("UPDATE client SET nom=:nom,prenom=:prenom,adresse=:adresse,telephone=:telephone WHERE id=:id ");
        $requete->bindValue(':nom',$nom,PDO::PARAM_STR);
        $requete->bindValue(':prenom',$prenom,PDO::PARAM_STR);
        $requete->bindValue(':adresse',$adresse,PDO::PARAM_STR);
        $requete->bindValue(':telephone',$telephone,PDO::PARAM_STR);
        $requete->bindValue(':id',$id,PDO::PARAM_INT);

        $resultat = $requete->execute();
        if($resultat){
            return "Le client a été mise à jour avec succès";
        }
        else{
            return "Echec de la mise à jour du client";
        }
    }
    function deleteClient(int $id){
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        $pdo = getPdo();
        $requete = $pdo->prepare("DELETE FROM client WHERE id = :id");
        $requete->bindValue(":id",$id,PDO::PARAM_INT);
        try{
            $requete->execute();
            return "Client supprimé";
        }catch(Exception $e){
            return "Impossible de supprimé un clients qui possède un compte";
        }


    }
    function findClientById(int $id){
        $pdo = getPdo();
        $requete = $pdo->prepare("SELECT * FROM client WHERE id=:id ORDER BY id DESC");
        $requete->bindValue(":id",$id,PDO::PARAM_INT);
        $requete->execute();
        return $requete->fetch();
    }
function comptesClient($id){
    $pdo = getPdo();

    $requete = $pdo->prepare("SELECT cpt.id as idC, cpt.*,clt.* FROM compte cpt JOIN client clt ON clt.id = cpt.idCl WHERE clt.id=:id");
    $requete->bindValue(":id",$id,PDO::PARAM_INT);
    $requete->execute();
    return $requete->fetchAll();
}
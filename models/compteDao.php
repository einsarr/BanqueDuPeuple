<?php
    require_once "clientDao.php";

    function addCompte(string $numero,int $solde,int $etat,int $idCl):int{
        $pdo = getPdo();
        $sql = $pdo->prepare("INSERT INTO compte(id,numero,solde,etat,idCl) VALUES(NULL,:numero,:solde,:etat,:idCl)");
        $sql->bindValue(':numero',$numero,PDO::PARAM_STR);
        $sql->bindValue(':solde',$solde,PDO::PARAM_INT);
        $sql->bindValue(':etat',$etat,PDO::PARAM_INT);
        $sql->bindValue(':idCl',$idCl,PDO::PARAM_INT);

        return $sql->execute();

    }

    function addCompteNewClient(string $nom,string $prenom,string $telephone,string $email,string $adresse,string $numero,int $solde,int $etat):void{
        $pdo = getPdo();
        $pdo->beginTransaction();
        $id = addClient($nom,$prenom,$telephone,$email,$adresse);
        if($id > 0){
            addCompte($numero,$solde,$etat,$id);
        }
        $pdo->rollBack();
    }

    function updateCompte(int $id,string $numero,int $solde,int $etat):string{
        $pdo = getPdo();
        $requete = $pdo->prepare("UPDATE compte SET numero=:numero,solde=:solde,etat=:etat WHERE id=:id ");
        $requete->bindValue(':numero',$numero,PDO::PARAM_STR);
        $requete->bindValue(':solde',$solde,PDO::PARAM_INT);
        $requete->bindValue(':etat',$etat,PDO::PARAM_INT);
        $requete->bindValue(':id',$id,PDO::PARAM_INT);

        $resultat = $requete->execute();
        if($resultat){
            return "Le client a été mise à jour avec succès";
        }
        else{
            return "Echec de la mise à jour du client";
        }
    }

    function findCompteById(int $id){
        $pdo = getPdo();
        $requete = $pdo->prepare("SELECT * FROM compte where id=:id");
        $requete->bindValue(":id",$id,PDO::PARAM_INT);
        $requete->execute();
        return $requete->fetch();
    }
    function findAllCompte(){
        $pdo = getPdo();
        $requete = $pdo->query('SELECT cpt.id as idC,cpt.*,clt.* FROM compte cpt JOIN client clt ON clt.id=cpt.idCl');
        return $requete->fetchAll();

    }



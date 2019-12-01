<?php
require_once "../models/compteDao.php";
//var_dump($_GET);die;
extract($_POST);
if(isset($id) && isset($_GET["update"])){
    updateCompte($id,$numero,$solde,$etat);
    echo "<script>alert('Compte mise à jour avec succès'); window.location = '../comptes';</script>";
}else if(isset($id) && isset($_GET["delete"])){
    echo "DELETE";
}else if(isset($_GET['new'])){
    addCompte($numero,$solde,$etat,$id);
    echo "<script>alert('Compte ajouté avec succès'); window.location = '../clients';</script>";
}else if(isset($_GET['add'])){
    addCompteNewClient($nom,$prenom,$telephone,$email,$adresse,$numero,$solde,$etat);
    echo "<script>alert('Compte ajouté avec succès'); window.location = '../clients';</script>";
}
else{
    header("Location:comptes");
}






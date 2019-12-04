<?php
    require_once "../../public/template/header.php";
    require_once "../../public/template/menu.php";
    require_once "../../models/clientDao.php";

$lesClients = findAllClients();

//var_dump($lesClients);exit(0);

?>
<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading">LISTE DES CLIENTS</div>
        <div class="panel-body">
            <table class="table table-striped table-bordered" id="example1">
                <thead>
                <tr>
                    <th>N°</th><th>Prénom</th><th>Nom</th><th>Téléphone</th></TH><th>Email</th><th>Adresse</th><th>Options</th>
                </tr>
                </thead>
                <tbody>
                <?php $num = 1;foreach($lesClients as $key=>$value):?>
                <tr>
                    <td><?php echo $num++; ?></td>
                    <td><?php echo $value["nom"] ?></td>
                    <td><?php echo $value["prenom"] ?></td>
                    <td><?php echo $value["telephone"] ?></td>
                    <td><?php echo $value["email"] ?>
                    <td><?php echo $value["adresse"] ?></td>
                    <td>
                        <a href="clientController/delete/<?= $value["id"]?>" class="btn btn-x btn-danger" onclick="return confirm('Etes-vous sûre de vouloir supprimer?')"><span class="glyphicon glyphicon-trash"></span></a>
                        <a href="clientController/edit/<?= $value["id"]?>" class="btn btn-x btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
                        <a href="clientController/listeCompte/<?= $value["id"]?>" class="btn btn-x btn-info" data-toggle="modal" data-target="#exampleModalCenter"><span class="glyphicon glyphicon-eye-open"></span></a>
                        <a href="compteController/newCompte/<?= $value["id"]?>" class="btn btn-x btn-success"><span class="glyphicon glyphicon-plus-sign"></span></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

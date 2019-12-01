<?php
require_once "../../public/template/header.php";
require_once "../../public/template/menu.php";
require_once "../../models/compteDao.php";

$lesComptes = comptesClient($_GET['id']);
$leClient = findClientById($_GET['id']);
//var_dump($lesComptes);exit(0);
?>

<div class="col-md-8">
    <div class="panel panel-primary">
        <div class="panel-heading">LISTE DES COMPTES - <b><?php echo $leClient['prenom'] ." ".$leClient['nom']; ?></b></div>
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>N°</th><th>Numéro</th><th>Solde</th><th>Date de création</th><th>Etat</th><th>Options</th>
                </tr>
                </thead>
                <tbody>
                    <?php $num=1; foreach($lesComptes as $key=>$value): ?>
                    <tr>
                        <td><?= $num++ ?></td>
                        <td><?= $value['numero'] ?></td>
                        <td><?= $value['solde'] ?> FCFA</td>
                        <td><?= $value['dateCreation'] ?></td>
                        <td><?= $value['etat']==0?"<span class='text-danger'>Déactivé</span>":"<span class='text-success'>Activé</span>" ?></td>
                        <td>
                            <a href="../../compteController/delete/<?= $value["idC"]?>" class="btn btn-x btn-danger" onclick="return confirm('Etes-vous sûre de vouloir supprimer?')"><span class="glyphicon glyphicon-remove"></span></a>
                            <a href="../../compteController/edit/<?= $value["idC"]?>" class="btn btn-x btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once "../../public/template/footer.php";?>




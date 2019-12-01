  <?php
    require_once "../../public/template/header.php";
    require_once "../../public/template/menu.php";
    require_once "../../models/compteDao.php";

    $lesComptes = findAllCompte();
    //var_dump($lesComptes);exit(0);

    ?>

<div class="col-md-4">
    <div class="panel panel-primary">
        <div class="panel-heading">Création de compte d'un nouveau adhérent</div>
        <div class="panel-body">
            <form method="post" action="compteController/add">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="nom" placeholder="Nom de famille">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="prenom" placeholder="Prénom">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="telephone" placeholder="Téléphone">
                    <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="adresse" placeholder="Adresse">
                    <span class="glyphicon glyphicon-home form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="numero" placeholder="Numéro du compte">
                    <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="solde" placeholder="Solde initial">
                    <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                </div>

                <div class="form-group">
                    <select name="etat" id="etat" class="form-control">
                        <option value="">Selectionner l'état du compte</option>
                        <option value="1">Actif</option>
                        <option value="0">Inactif</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit"  class="btn btn-primary" value="Enrégistrer">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-8">
    <div class="panel panel-primary">
        <div class="panel-heading">LISTE DES COMPTES</div>
        <div class="panel-body">
            <table class="table table-striped table-bordered" id="example1">
                <thead>
                    <tr>
                        <th>N°</th><th>Numéro</th><th>Solde</th><th>Date de création</th><th>Etat</th><th>Options</th>
                    </tr>
                </thead>
                <tbody>
                <?php $num=1;foreach ($lesComptes as $key=>$value): ?>
                    <tr>
                        <td><?php echo $num++ ?></td>
                        <td><?php echo $value['numero'] ?></td>
                        <td><?php echo $value['solde'] ?></td>
                        <td>
                            <?php
                                $date = new DateTime($value['dateCreation']);
                                echo $date->format('d/m/Y H:s:i');
                            ?>
                        </td>
                        <td><?php echo $value['etat']==1?"<span class='text-success'>Activé</span>":"<span class='text-danger'>Déactivé</span>" ?></td>
                        <!--<td><?php //echo $value['prenom'] ?></td>-->
                        <td>
                            <a href="compteController/delete/<?= $value["idC"]?>" class="btn btn-x btn-danger"><span class="glyphicon glyphicon-remove" onclick="return confirm('Etes-vous sûre de vouloir supprimer?')"></span></a>
                            <a href="compteController/edit/<?= $value["idC"]?>" class="btn btn-x btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once "../../public/template/footer.php";?>




<?php
    require_once "../../public/template/header.php";
    require_once "../../public/template/menu.php";
    require_once "../../models/compteDao.php";
    $leCompte = findCompteById($_GET['id']);
    //var_dump($leCompte);exit(0);
?>

<div class="col-md-6">
    <div class="panel panel-warning">
        <div class="panel-heading">Modification de compte</div>
        <div class="panel-body">
            <form method="post" action="../update">
                <input type="hidden" name="id" value="<?php echo $leCompte['id'] ?>">
                <div class="form-group">
                    <label for="numero">Numéro du compte</label>
                    <input type="text" name="numero" class="form-control" value="<?php echo $leCompte['numero'] ?>">
                </div>
                <div class="form-group">
                    <label for="solde">Solde initial</label>
                    <input type="text" name="solde" class="form-control" value="<?php echo $leCompte['solde'] ?>">
                </div>
                <div class="form-group">
                    <label for="etat">Etat du compte</label>
                    <select name="etat" id="etat" class="form-control">
                        <option value="1">Actif</option>
                        <option value="0">Inactif</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit"  class="btn btn-warning" value="Mèttre à jour">
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once "../../public/template/footer.php";?>
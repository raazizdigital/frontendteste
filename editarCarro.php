<?php

include_once 'header.php';
include_once 'Classe/classCarros.php';
$Carro_update = new Carro($_GET['id_carro']);
if (isset($_POST['editar'])) {
    $Carro_update = new Carro($_GET['id_carro'], $_POST['marca'], $_POST['modelo'], $_POST['ano']);
    $resultado_carro = $Carro_update->editar();
    if ($resultado_carro)
        echo '<div class="alert alert-success" role="alert">
        <strong>O carro </strong>foi atualizado.<a href="index.php">Voltar</a></div>';
    else
        echo '<div class="alert alert-danger" role="alert">
        <strong>Vish </strong>Deu erro!.</div>' . $Carro_update->conexao->error;
}
?>

<h1 class="centroform"> Editando carro de ID <br> <?php echo $Carro_update->id_carro; ?> </h1> 

<form class="formulario" name="editaCarro" action="editarCarro.php?id_carro=<?php echo $_GET['id_carro']; ?>" method="POST">

    <label>Marca</label> <input type="text"  class="form-control campos"  value="<?php echo $Carro_update->marca_carro; ?>" name="marca" style="width: 85%" /><br><br>
    <label>Modelo</label> <input type="text"  class="form-control campos"  value="<?php echo $Carro_update->modelo_carro; ?>" name="modelo" style="width: 85%" /><br><br>
    <label>Ano </label><input type="text"  class="form-control campos"  value="<?php echo $Carro_update->ano_carro; ?>" name="ano" style="width: 85%" /><br><br>
    

    <input type="submit" value="Editar" class="btn btn-default add-to-cart centroformbotao campos"  name="editar" />    
</form>
<div class="formulario">
    <input type="submit" value="Voltar" class="btn btn-default add-to-cart centroformbotao campos" name="voltar" onclick="javascript: location.href = 'index.php'" />
</div>
<?php include_once 'footer.php'; ?>

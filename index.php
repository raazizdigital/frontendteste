<?php
include_once 'header.php';
include_once 'Classe/classCarros.php';
$carro = new Carro();
$resultado_marca = $carro->executaLista();



if (isset($_POST['cadastrar'])) { //passa pro classCarros.php cadastrar no bd
    $Carro_cad = new Carro('', $_POST['marca_carro'], $_POST['modelo_carro'], $_POST['ano_carro']);
    $resultado_marca_list_carro = $Carro_cad->inserir();

    if ($resultado_marca_list_carro)
        echo '<div class="alert alert-success" role="alert">
        <strong>Que bacana! </strong>O seu carro foi cadastrado.</div>';
    else
        echo '<div class="alert alert-danger" role="alert">
        <strong>Vsh</strong>Deu erro!.</div>' . $Carro_cad->conexao->error;
}
?>

    <h1 class="formlisttitle">Cadastro de Carros</h1>
<div id="carros" class="container">
    <form class="formulario01" name="editatexto" action="index.php" method="POST"> <!--pega dos dados para mandar pro post-->
        <input type="text" class="form-control campos"  value="" placeholder="Marca do Carro" name="marca_carro" style="width: 85%" /><br>
        <input type="text" class="form-control campos"  value="" placeholder="Modelo do Carro" name="modelo_carro" style="width: 85%" /><br>
        <input type="text" class="form-control campos"   value="" placeholder="Ano do carro" name="ano_carro" style="width: 85%" /><br>
        <input type="submit"  class="btn btn-default add-to-cart centroformbotao01 campos" name="cadastrar" value="Cadastrar" />
    </form>

    <form  id="pequisaadv" method="POST" action="index.php" style=" margin-top: 5%;">    <!--forme da pesquisa  -->
        <select name="marca_carro" class="form-control campos" style="width: 25%"  >   
            <option value = "Sem categoria">Selecione uma marca</option>
            <?php
            //pega as marcas cadastradsa
            $marca = new Carro(); //criei um novo  con dados vazios
            $resultado_marca = $marca->executaListadist(); //faz o select executaLista
            while ($dados_marca = $marca->listaDados()) {
                ?>
                <option value="<?php echo $dados_marca['marca_carro'] ?>"><?php echo $dados_marca['marca_carro'] ?></option>
            <?php } ?>

        </select> 
        <br>        
        <input type="submit" value="Pesquisar" class="btn btn-success"  name="pesquisar" />
        <input type="submit" value="Limpar Pesquisa" class="btn btn-sm btn-warning" name="limpapesquisa" />     
    </form> 

    <?php
    if (isset($_POST['pesquisar'])) {
        $resultado_marca = $carro->pesquisar($_POST['marca_carro']);
    } else if (isset($_POST['limpapesquisa'])) {
        $resultado_marca = $carro->limparpesquisa();
    }

    $Carro_list = new Carro(); //criei um novo carro con dados vazios
    if (isset($_POST['excluir'])) {
        $resultado_marca_list_carro = $Carro_list->excluir($_POST['id']);
        if ($resultado_marca_list_carro)
            echo '<div class="alert alert-success" role="alert">
      <strong></strong>Excluiu.</div>';
        else
            echo '<div class="alert alert-danger" role="alert">
      <strong>Vsh</strong>Deu erro!.</div>' . $Carro_list->conexao->error;
    }

    $resultado_marca_list_carro = $Carro_list->executaLista(); //faz o select executaLista
    ?> 

    <h1 class="formlisttitle">Lista de Carros</h1>
    <form id="cadprodutos" class="formlist" method="POST" action="index.php">
        <input type="submit" class="btn tbn-sm btn-danger" name="excluir" value="Excluir" onclick="return confirm('Você tem certeza?')">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>MARCA</th>
                    <th>MODELO</th>
                    <th>ANO</th>                          
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($dados_list_carro = $carro->listaDados()) { ?>


                    <tr >
                        <th>                           
                            <input  class="cursorpointer formlistradio3" type="radio" name="id" value=" <?php echo $dados_list_carro['id_carro'] ?> " />
                        </th>
                        <td> <?php echo $dados_list_carro['id_carro'] ?> </td>
                        <td> <?php echo $dados_list_carro['marca_carro'] ?> </td>     
                        <td> <?php echo $dados_list_carro['modelo_carro'] ?> </td>                  
                        <td> <?php echo $dados_list_carro['ano_carro'] ?> </td>                                
                        <td><a  href="editarCarro.php?id_carro=<?php echo $dados_list_carro['id_carro'] ?>"><label class="formlistbnt2">Alterar</label></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </form>

    <h1 id="contato"class="formlisttitle">Contatos</h1>
    <form class="formcontato col-sm-7 pull-left">
        <label> Nome: </label> <input class="form-control campos" disabled="" placeholder="Eugenio Gabriel Araújo" > <br>
        <label> Celular: </label>  <input class="form-control campos" type="text" disabled="" placeholder="(31) 98452-3343" > <br>
        <label> Telefone: </label>  <input class="form-control campos" type="text" disabled="" placeholder="(31) 3486-1847" > <br>
        <label> E-mail: </label>  <input class="form-control campos" type="email" disabled="" placeholder="eugenio_gabriel@hotmail.com"> <br>
        <label> Site: </label> <input class="form-control campos" type="url" disabled="" placeholder="www.inovecsolucoes.com.br/eugenio" > <br>
    </form>
    <div class=" col-sm-5 pull-right">

        <img src="images/fim.jpg" class="img-responsive" style="margin-top: 10px;" alt=""/> 
    </div>
</div>

<?php include_once 'footer.php'; ?>
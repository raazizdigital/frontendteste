<?php

class Carro {

    public $id_carro;
    public $marca_carro;
    public $modelo_carro;
    public $ano_carro;
    public $conexao;
    private $resource; //Retorno de um select
    private $dados;  //Dados formatados para exibição

    public function __construct($a = '', $b = '', $c = '', $d = '') {
        $this->conexao = new mysqli('localhost', 'root', '', 'carro');
        if (mysqli_connect_errno($this->conexao)) {
            echo utf8_encode("<div class='alert-danger'>Falha ao conectar ao MySQL: " . mysqli_connect_error() . "<div>");
        }

        //se o código não for vazio e os outros campos forem vazios
        if ($a != '' && $b == '' && $c == '' && $d == '') {
            //pegando os dados do Carros com esse ID
            $sql = "SELECT * FROM Carros WHERE id_carro=$a";
            $resultado = $this->conexao->query($sql);

            //criando um array com o resultado do SELECT
            $vetor = $resultado->fetch_array(MYSQLI_BOTH);

            //separando o vetor em variáveis para preencher o objeto
            list($this->id_carro, $this->marca_carro, $this->modelo_carro, $this->ano_carro) = $vetor;
        } else {  //senão, procedimento padrão
            $this->id_carro = $a;
            $this->marca_carro = $b;
            $this->modelo_carro = $c;
            $this->ano_carro = $d;
        }
    }

    public function inserir() {
        $sql = "insert into Carros(marca_carro,modelo_carro,ano_carro) "
                . "values ('$this->marca_carro', '$this->modelo_carro','$this->ano_carro')";
        $resultado = $this->conexao->query($sql); //Executa a Query 
        return $resultado;
    }

    public function executaLista() {
        $sql = "SELECT * FROM Carros";
        $this->resource = $this->conexao->query($sql);
        return $this->resource;
    }

    public function executaListadist() {
        $sql = "SELECT DISTINCT marca_carro from Carros";
        $this->resource = $this->conexao->query($sql);
        return $this->resource;
    }

    public function executaListamarca() {
        $sql = "SELECT marca_carro FROM Carros";
        $this->resource = $this->conexao->query($sql);
        return $this->resource;
    }

    public function listaDados() {
        $this->dados = $this->resource->fetch_array(MYSQLI_ASSOC);
        return $this->dados;
    }

    public function pesquisar($marca_carro) {
        $sql = "SELECT * FROM Carros WHERE marca_carro LIKE '%$marca_carro%'";
        $this->resource = $this->conexao->query($sql);
        return $this->resource;
    }

    public function limparpesquisa() {
        $sql = "SELECT * FROM Carros";
        $this->resource = $this->conexao->query($sql);
        return $this->resource;
    }

    public function excluir($id_carro) {
        $sql = "DELETE FROM Carros WHERE id_carro=$id_carro ";
        $resultado = $this->conexao->query($sql); // faz a conexão

        return $resultado; // retorna o resultado
    }

    public function editar() {
        $sql = "UPDATE Carros SET marca_carro='$this->marca_carro',modelo_carro='$this->modelo_carro',ano_carro='$this->ano_carro' WHERE id_carro=$this->id_carro";
        $resultado = $this->conexao->query($sql);
        return $resultado;
    }

    public function __destruct() {
        $this->conexao->close();
    }

}

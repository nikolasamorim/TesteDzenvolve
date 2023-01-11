<?php

session_start();

// Requerindo banco de dados
require_once "conexao.php";


$clientes = new clientes;

//verificando envio do formulario e executando função inserir
if (isset($_POST["salvar"])) {
    $clientes->inserir();
}

if (isset($_GET["excluir"])) {
    $codigo = $_GET["excluir"];
    $clientes->excluir($codigo);
}

if (isset($_POST["alterar"])) {
    $alter = $_POST["id"];
    $clientes->alterar($alter);
}






class clientes
{
    public $id;
    public $nome;
    public $cpf;
    public $sexo;
    public $data_nasc;
    public $email;
    public $celular;
    public $profissao;

    //função inserção no banco de dados

    public function inserir()
    {
        try {
            //validação de formulario
            if (
                isset($_POST["nome"]) && !empty($_POST["nome"])
                && isset($_POST["cpf"]) && !empty($_POST["cpf"])
                && isset($_POST["sexo"]) && !empty($_POST["sexo"])
                && isset($_POST["data_nasc"]) && !empty($_POST["data_nasc"])
                && isset($_POST["email"]) && !empty($_POST["email"])
                && isset($_POST["celular"]) && !empty($_POST["celular"])
                && isset($_POST["profissao"]) && !empty($_POST["profissao"])
            ) {
                $this->nome = $_POST["nome"];
                $this->cpf = $_POST["cpf"];
                $this->sexo = $_POST["sexo"];
                $this->data_nasc = $_POST["data_nasc"];
                $this->email = $_POST["email"];
                $this->celular = $_POST["celular"];
                $this->profissao = $_POST["profissao"];

                //conexao e inserção no banco de dados
                $bd = new conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("insert into clientes(id,nome,cpf,sexo,data_nasc,email,celular,profissao)
                                                values (null,?,?,?,?,?,?,?)");
                $sql->execute(array(
                    $this->nome,
                    $this->cpf,
                    $this->sexo,
                    $this->data_nasc,
                    $this->email,
                    $this->celular,
                    $this->profissao
                ));
                if ($sql->rowCount() > 0) {
                    //mensagem de sucesso após validação do insert
                    $_SESSION['title'] = "SUCESSO!!";
                    $_SESSION['message'] = "Cadastro concluído com sucesso!";
                    $_SESSION['msg_type'] = "sucess";

                    header('location: ../');
                } else {
                    //mensagem de erro após validação do insert
                    $_SESSION['title'] = "ERRO!!";
                    $_SESSION['message'] = "Erro ao realizar o cadastro. Não foi possível realizar o cadastro!";
                    $_SESSION['msg_type'] = "erro";

                    header('location: ../');
                }
                //mensagem de erro após validação das variavéis recebidas
            } else {
                $_SESSION['title'] = "ERRO!!";
                $_SESSION['message'] = "Erro ao realizar o cadastro. Preencha todos os dados corretamente!";
                $_SESSION['msg_type'] = "warning";

                header('location: ../');
            }
            //mensagem de erro da função inserir
        } catch (PDOException $msg) {
            $_SESSION['title'] = "ERRO!!";
            $_SESSION['message'] = "Não foi possível realizar o cadastro dos itens!" . $msg->getMessage();
            $_SESSION['msg_type'] = "erro";

            header('location: ../');
        }
    }

    //função de listagem de clientes
    public function listar()
    {
        try {
            //conexão ao bando de dados e recolhimento de dados 
            $bd = new conexao();
            $con = $bd->conectar();
            $sql = $con->prepare("select * from clientes where sexo = 'feminino' 
                                                                          and data_nasc BETWEEN '0001-01-01' AND '2003-01-01';");
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return $result = $sql->fetchAll(PDO::FETCH_CLASS);
            }
            //mensagem de erro função de listagem
        } catch (PDOException $msg) {
            $_SESSION['title'] = "ERRO!!";
            $_SESSION['message'] = "Não foi possível listar os itens!" . $msg;
            $_SESSION['msg_type'] = "erro";

            header('location: ../');
        }
    }

    //função para excluir no banco de dados
    public function excluir($codigo)
    {
        try {
            //validação de variavel
            if (isset($codigo)) {
                $this->id = $codigo;
                //conexão ao banco de dados e comando para excluir no bd
                $bd = new conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("delete from clientes where id = ?");
                $sql->execute(array($this->id));

                //redirecionamenro para a tela de clientes
                if ($sql->rowCount() > 0) {
                    $_SESSION['title'] = "SUCESSO!!";
                    $_SESSION['message'] = "Usuário excluído com sucesso!";
                    $_SESSION['msg_type'] = "sucess";

                    header('location: ../');
                }
            } else {
                //redirecionamento para tela de clientes +
                // Alerta de erro
                $_SESSION['title'] = "ERRO!!";
                $_SESSION['message'] = "Não foi possível excluir o usuário!";
                $_SESSION['msg_type'] = "erro";

                header('location: ../');
            }
            // Alerta de erro
        } catch (PDOException $msg) {
            echo "Não foi possivel excluir o cliente!!: " . $msg->getMessage();
        }
    }

    public function alterar($alter)
    {
        try {
            //validação de variavel
            if (
                isset($_POST["nome"]) && !empty($_POST["nome"])
                && isset($_POST["cpf"]) && !empty($_POST["cpf"])
                && isset($_POST["sexo"]) && !empty($_POST["sexo"])
                && isset($_POST["data_nasc"]) && !empty($_POST["data_nasc"])
                && isset($_POST["email"]) && !empty($_POST["email"])
                && isset($_POST["celular"]) && !empty($_POST["celular"])
                && isset($_POST["profissao"]) && !empty($_POST["profissao"])
            ) {
                $this->id = $alter;
                $this->nome = $_POST["nome"];
                $this->cpf = $_POST["cpf"];
                $this->sexo = $_POST["sexo"];
                $this->data_nasc = $_POST["data_nasc"];
                $this->email = $_POST["email"];
                $this->celular = $_POST["celular"];
                $this->profissao = $_POST["profissao"];
                //conexao e inserção no banco de dados
                $bd = new conexao();
                $con = $bd->conectar();
                $sql = $con->prepare("update clientes set nome = ?, cpf = ?, sexo = ?, data_nasc = ?, email = ?, celular = ?, profissao = ?
                                                where id = ?");
                $sql->execute(array(
                    $this->nome,
                    $this->cpf,
                    $this->sexo,
                    $this->data_nasc,
                    $this->email,
                    $this->celular,
                    $this->profissao,
                    $this->id
                ));
                if ($sql->rowCount() > 0) {
                    //redirecionamento para index depois da efetuação da alteração
                    $_SESSION['title'] = "SUCESSO!!";
                    $_SESSION['message'] = "Usuário alterado com sucesso!";
                    $_SESSION['msg_type'] = "sucess";

                    header('location: ../');
                } else {
                    echo "deu ruim";
                }
            } else {
                //validação erro
                $_SESSION['title'] = "ERRO!!";
                $_SESSION['message'] = "Não foi possível alterar o usuário. Preencha todos os campos!";
                $_SESSION['msg_type'] = "warning";

                header('location: ../');
            }
            //mensagem de erro da função alterar
        } catch (PDOException $msg) {
            echo "Não possível alterar o cliente!!" . $msg->getMessage();
        }
    }
}

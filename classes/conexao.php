<?php


class conexao
{
    private $servidor;
    private $banco;
    private $usuario;
    private $senha;

    function __construct()
    {
        $this->servidor = "107.180.57.185";
        $this->banco = "dz_dev_test";
        $this->usuario = "dz_dev";
        $this->senha = "p?%3DY?#*LBW";
    }

    /* CONSTRUTOR UTILIZADO PARA FAZER TESTES EM SERVIDOR LOCAL WAMPSERVER
    function __construct()
    {
        $this->servidor = "localhost";
        $this->banco = "cadastro_usuarios";
        $this->usuario = "root";
        $this->senha = "";
    }*/

    public function conectar()
    {
        try {
            $con = new PDO(
                "mysql:host={$this->servidor};port=3306;dbname={$this->banco};charset=utf8;",
                $this->usuario,
                $this->senha
            );
            return $con;
        } catch (PDOException $e) {
        }
    }
}

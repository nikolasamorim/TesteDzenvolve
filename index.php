<?php
header("content-type:text/html;charset=utf-8;");
require_once "classes/metodos_clientes.php";
$clientes = new clientes();
$lista = $clientes->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="stylesheet" type="text/css" href="style/main.css">
    <link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">

    <link rel="shortcut icon" href="img/favicon.png">

    <!--fontAwesome-->
    <script src="https://kit.fontawesome.com/f1b6df7d8e.js" crossorigin="anonymous"></script>

    <!--IONICONS-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!--JQUERY-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Clientes - Nikolas Amorim</title>
</head>

<body>

    <?php

    if (isset($_SESSION['message'])) : ?>

        <div id="alert" class="<?= $_SESSION['msg_type'] ?>">
            <div class="title">
                <?php
                echo $_SESSION['title'];
                unset($_SESSION['title']);
                ?>
            </div>
            <p>
                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </p>
        </div>
    <?php endif ?>

    <div class="dashboard-body">
        <section class="menu-lateral">
            <ul>
                <li class="logo"><img id="img" src="img/logo-blue.png" alt="logo.png"></li>
                <li> <a href="index.php">
                        <ion-icon name="home"></ion-icon> Dashboard
                    </a></li>
                <li> <a href="cadastro.php">
                        <ion-icon name="person-add"></ion-icon> Cadastrar
                    </a></li>
            </ul>
            <ul>
                <li id="msg">
                    <ion-icon name="help"></ion-icon> Ajuda
                </li>
            </ul>
        </section>

        <script>
            $(document).ready(function() {
                $("#msg").click(function() {
                    $(this).toggleClass("see");
                    $(".back-msg").toggleClass("see");
                });
            });
        </script>

        <section class="back-msg">
            <div class="container-msg">
                <h1>
                    Como funciona a altera????o das informa????es?
                </h1>
                <label>
                    Existe um ID que ?? gerado automaticamente e n??o pode ser alterado, e ?? ??nico para cada
                    cadastro.
                    As demais informa????es podem ser alteradas.</label>
                <a class="close" id="msg-close" href="#"></a>
            </div>
        </section>
        <script>
            $(document).ready(function() {
                $("#msg-close").click(function() {
                    $(this).toggleClass("see");
                    $(".back-msg").toggleClass("see");
                });
            });
        </script>

        <section class="dashboard-view">
            <nav>
                <ul>
                    <li class="lateral">
                        <ion-icon name="menu-outline"></ion-icon>
                    </li>
                </ul>
                <script>
                    $(document).ready(function() {
                        $(".lateral").click(function() {
                            $(this).toggleClass("desactive");
                            $(".menu-lateral").toggleClass("desactive");
                        });
                    });
                </script>
                <ul>
                    <li>
                        <ion-icon name="person-circle-sharp"></ion-icon>
                    </li>
                </ul>
            </nav>

            <div class="view-area">
                <h2 class="title">Mulheres com idade superior a 20 anos</h2>
                
                <!-- T A B E L A -->
                <div class="scroll-table">
                    <table class="table table-bordered table-hover table-responsive-md">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Sexo</th>
                                <th>Cpf</th>
                                <th>Data (nasc)</th>
                                <th>Email</th>
                                <th>Celular</th>
                                <th>Profiss??o</th>
                                <th>A????es</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- VALIDACAO -->
                            <?php if ($lista) :
                                foreach ($lista as $clientes) : ?>
                                    <tr>
                                        <td>
                                            <!-- Imprimir Nome -->
                                            <?= $clientes->nome; ?>

                                        </td>
                                        <td>
                                            <!-- Imprimir Sexo -->
                                            <?= $clientes->sexo; ?>
                                        </td>
                                        <td>
                                            <!-- Imprimir Cpf -->
                                            <?= $clientes->cpf; ?>
                                        </td>

                                        <td>
                                            <!-- Imprimir Data de Nascimento -->
                                            <?= $clientes->data_nasc; ?>
                                        </td>

                                        <td>
                                            <!-- Imprimir Email -->
                                            <?= $clientes->email; ?>
                                        </td>

                                        <td>
                                            <!-- Imprimir Celular -->
                                            <?= $clientes->celular; ?>
                                        </td>

                                        <td>
                                            <!-- Imprimir Profiss??o -->
                                            <?= $clientes->profissao; ?>
                                        </td>

                                        <td>
                                            <!-- BOT??O ALTERAR -->
                                            <a href="alteracao.php?id=<?= $clientes->id ?>&nome=<?= $clientes->nome ?>
                                        &cpf=<?= $clientes->cpf ?>&sexo=<?= $clientes->sexo ?>
                                        &data_nasc=<?= $clientes->data_nasc ?>&email=<?= $clientes->email ?>
                                        &celular=<?= $clientes->celular ?>&profissao=<?= $clientes->profissao ?>" name="id" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>

                                            <!-- BOT??O EXCLUIR -->
                                            <a href="classes/metodos_clientes.php?excluir=<?= $clientes->id ?>" name="excluir" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>

                                <tr>
                                    <td colspan="8">
                                        <div class="alerta alert-warning"><i class="fas fa-user-alt-slash"></i> Nenhum
                                            cadastro efetivado!!!</div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    </section>
    </div>

    <script src="js/main.js"></script>
    <script src="js/dom.js"></script>
</body>

</html>
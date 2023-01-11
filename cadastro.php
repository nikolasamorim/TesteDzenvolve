<?php
header("content-type:text/html;charset=utf-8;");

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

    <title>Cadastro de Usuários - Nikolas Amorim</title>
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
                    Como funciona a alteração das informações?
                </h1>
                <label for="">
                    Existe um ID que é gerado automaticamente e não pode ser alterado, e é único para cada
                    cadastro.
                    As demais informações podem ser alteradas.</label>
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
                <!-- Formulario -->
                <form class="form-group" action="classes/metodos_clientes.php" name="formulario" method="POST">
                    <!-- Título -->
                    <h1>Cadastrar</h1>
                    <!-- Nome, Cpf e Data -->
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" minlength="2" maxlength="255" required>

                    <input onblur="formataCPF(this)" oninput="mascara(this)" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" type="text" name="cpf" id="cpf" placeholder="Digite seu CPF" inputmode="numeric" minlength="15" required>

                    <select class="form-control" name="sexo" id="sexo" required>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                        <option value="" selected>Escolha uma Opção</option>
                    </select>

                    <input type="date" class="form-control" name="data_nasc" id="data_nasc" required>

                    <!-- E-MAIL, CELULAR E PROFISSÃO -->

                    <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" maxlength="100" required>

                    <input type="tel" class="form-control" id="celular" name="celular" placeholder="Celular" minlength="16" maxlength="15" required>
                    <script>
                        $(document).ready(function() {
                            $('#celular').mask('99 9 99999999');
                        });
                    </script>

                    <input type="text" class="form-control" name="profissao" id="profissao" placeholder="Profisão" minlength="4" maxlength="100" required>


                    <!-- Botao -->
                    <button type="submit" name="salvar" onclick="validar()" class="cad-but">Salvar</button>
                </form>

            </div>
        </section>
    </div>

    <script src="js/main.js"></script>
    <script src="js/dom.js"></script>
</body>

</html>
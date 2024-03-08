<?php
header("Content-type: text/html; charset=utf8;");
session_start();
//var_dump($_POST);
//variaveis
$nome = "";
$email = "";
$senha = "";



if(isset($_POST["salvar"])){// tela de cadastro de usuario -> cadastrousuario.html
    if(isset($_POST["nome"]) && !empty($_POST["nome"])
        && isset($_POST["email"]) && !empty($_POST["email"])
        && isset($_POST["senha"]) && !empty($_POST["senha"])){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $_SESSION["email"] = $_POST["email"];
        $_SESSION["senha"] = $_POST["senha"];
        //echo "Usuário cadastrado com sucesso!!";
        //header("location: index.html");
        // exibir um alerta para o usuario com javascript
        echo "<script>
                alert('Usuário cadastrado com sucesso!!'); // criando uma alerta
                window.location.href = 'login.html'; // redirecionando 
             </script>";

    }else{ // usuario nao preencheu o cadastro completo
        header("location:login.html");
    }


}else if(isset($_POST["entrar"])) { // tela de login -> index.html

    if (isset($_POST["email"]) && !empty($_POST["email"])
        && isset($_POST["senha"]) && !empty($_POST["senha"])) {

        $email = $_POST["email"];
        $senha = $_POST["senha"];

        if ($_SESSION["email"] == $email) {

            if ($_SESSION["senha"] == $senha) {

                echo "<script>
                        alert('Bem Vindo!');
                        window.location.href = 'servicos.html';
                        </script>";

            } else {

                echo "<script>
                             alert('Credenciais Incorretas!');
                             window.location.href = 'login.html';
                        </script>";

            }

        } else {

            header("location:login.html");

        }


    } else { // usuario não preencheu nenhum formulario
        header("location: login.html");
    }
}

?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="logar.css">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <img src="img/logo.png" alt="">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email">
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha">
        <button name="btn" type="submit">Entrar</button>
    </form>
        <?php
                include("conect.php");
                if(isset($_GET["pg"])){
                    $pg = $_GET["pg"];
                    if($pg === "negado"){
                        echo '<p style="color:white;background:red;padding:1%;text-align:center;border-radius:10px;">Acesso Negado! Faça Login!';
                    }else if($pg === "sair"){
                        echo '<p style="color:white;background:blue;padding:1%;text-align:center;border-radius:10px;">Você saiu do sistema! Esperamos que volte!';

                    }

                }
                if(isset($_POST["btn"])){
                    $email = filter_input(INPUT_POST, "email", FILTER_DEFAULT);
                    $senha=  filter_input(INPUT_POST, "senha", FILTER_DEFAULT);
                    $select = "SELECT * FROM logar WHERE email=:email AND senha=:senha";

                    try{
                        $resultado = $conect -> prepare($select);
                        $resultado -> bindParam(":email", $email,PDO::PARAM_STR);
                        $resultado -> bindParam(":senha", $senha,PDO::PARAM_STR);
                        $resultado -> execute();

                        $contar = $resultado -> rowCount();
                        if($contar > 0){
                            $email = $_POST["email"];
                            $senha = $_POST["senha"];
                            $_SESSION["email"] = $email;
                            $_SESSION["senha"] = $senha;
                            echo '<p style="color:white;background:green;padding:1%;text-align:center;border-radius:10px;">Login Feito com Sucesso! Você será redirecionado';
                            header("Refresh: 3, adm/projetoADM.php");
                        }
                        else{
                            echo '<p style="color:white;background:red;padding:1%;text-align:center;border-radius:10px;">Login Falhou! Email ou Senha incorreta';
                        }
                    }catch(PDOException $erro){
                        echo "Houve um Erro" . $erro -> getMessage();
                    }
                }
                
        ?>
</body>
</html>
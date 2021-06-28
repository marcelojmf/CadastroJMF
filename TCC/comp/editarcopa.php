<?php
    include("../conect.php");
    if(!isset($_GET["id"])){
        header("Location:../copinha.php");
        exit;
    }else{
        $id = filter_input(INPUT_GET,"id", FILTER_DEFAULT);
        $selecionar = "SELECT * FROM copinha WHERE id=:id";

        try{
            $resultado = $conect -> prepare($selecionar);
            $resultado -> bindParam(":id",$id,PDO::PARAM_INT);
            $resultado -> execute();

            $contar = $resultado -> rowCount();
            if($contar > 0){
                while($mostrar = $resultado -> FETCH(PDO::FETCH_OBJ)){//enquanto
                    $nomeRetornado = $mostrar -> nome;
                    $nome2Retornado = $mostrar -> nome2;
                    $nome3Retornado = $mostrar -> nome3;
                    $nome4Retornado = $mostrar -> nome4;
                    $nome5Retornado = $mostrar -> nome5;
                    $chamadaRetornado = $mostrar -> chamada;
                    $chamada2Retornado = $mostrar -> chamada2;
                    $chamada3Retornado = $mostrar -> chamada3;
                    $chamada4Retornado = $mostrar -> chamada4;
                    $chamada5Retornado = $mostrar -> chamada5;
                    $generoRetornado = $mostrar -> genero;
                    $equipeRetornado = $mostrar -> equipe;

                }
            }else{
                exit;
            }
        }catch(PDOException $erro){
            echo "ERRO EDITAR: " . $erro -> getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição Copinha</title>
    <link rel="stylesheet" href="../adm/copinhaADM.css">
    <style>
        .dados{border: 1px solid #808080;
               margin-right:25%;
               margin-left:25%;
               margin-top: 2%;
               border-radius:10px;
               background:#fff;
        }

    </style>
</head>
<body>
<section>  
    <form method="POST" text="#fff">
        
        <div>
        <h1>Equipe</h1>
            <input class="name" type="text" name="nome" placeholder="Nome..." id="nome" required="" value="<?php echo $nomeRetornado?>">
            <input class="nmr" type="text" name="chamada" placeholder="N°..." id="chamada" required="" value="<?php echo $chamadaRetornado?>">
            <input class="name" type="text" name="nome2" placeholder="Nome..." id="nome2" required="" value="<?php echo $nome2Retornado?>">
            <input class="nmr" type="text" name="chamada2" placeholder="N°..." id="chamada2" required="" value="<?php echo $chamada2Retornado?>">
            <input class="name" type="text" name="nome3" placeholder="Nome..." id="nome3" required="" value="<?php echo $nome3Retornado?>">
            <input class="nmr" type="text" name="chamada3" placeholder="N°..." id="chamada3" required="" value="<?php echo $chamada3Retornado?>">
            <input class="name" type="text" name="nome4" placeholder="Nome..." id="nome4" value="<?php echo $nome4Retornado?>"> 
            <input class="nmr" type="text" name="chamada4" placeholder="N°..." id="chamada4" value="<?php echo $chamada4Retornado?>">
            <input class="name" type="text" name="nome5" placeholder="Nome..." id="nome5" value="<?php echo $nome5Retornado?>"> 
            <input class="nmr" type="text" name="chamada5" placeholder="N°..." id="chamada5" value="<?php echo $chamada5Retornado?>">

        </div>  
        <div style="display:flex;  margin-top: 2%;">
       <h2>Gênero</h2>
        <select name="genero" class="selecao" style="margin-left:1%;">
             <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
        </select>
        </div>

        <div style="display: flex; flex-direction:row; margin-top: 2%;">
        <h2>Time</h2>
        <input type="text" name="equipe" placeholder="Digite o nome do time..." required="" value="<?php echo $equipeRetornado?>">
        <button type="submit" name="btn-update">Enviar</button>
        </div>
        <div style="display:flex; margin-top: 8%; justify-content: space-around;">
        <a href="projetoADM.php">Voltar para a pagina inicial</a>
        <a href="../adm/edcopaADM.php">Ver equipes já cadastradas</a>
        </div>

</form>
</section>

    <?php
        if(isset($_POST["btn-update"])){
            $nome = $_POST["nome"];
            $chamada = $_POST["chamada"];
            $nome2 = $_POST["nome2"];
            $chamada2 = $_POST["chamada2"];
            $nome3 = $_POST["nome3"];
            $chamada3 = $_POST["chamada3"];
            $nome4 = $_POST["nome4"];
            $chamada4 = $_POST["chamada4"];
            $nome5 = $_POST["nome5"];
            $chamada5 = $_POST["chamada5"];
            $genero = $_POST["genero"];
            $equipe = $_POST["equipe"];

            $editar = "UPDATE copinha SET nome=:nome,nome2=:nome2,nome3=:nome3,nome4=:nome4,nome5=:nome5,
            chamada=:chamada,chamada2=:chamada2,chamada3=:chamada3,chamada4=:chamada4,chamada5=:chamada5,genero=:genero,equipe=:equipe WHERE id=:id"; //query para atualizar os dados
            try{
                $resultado = $conect -> prepare($editar);
                $resultado -> bindParam(":nome",$nome, PDO::PARAM_STR); 
                $resultado -> bindParam(":chamada",$chamada, PDO::PARAM_STR);
                $resultado -> bindParam(":nome2",$nome2, PDO::PARAM_STR); 
                $resultado -> bindParam(":chamada2",$chamada2, PDO::PARAM_STR);
                $resultado -> bindParam(":nome3",$nome3, PDO::PARAM_STR); 
                $resultado -> bindParam(":chamada3",$chamada3, PDO::PARAM_STR);
                $resultado -> bindParam(":nome4",$nome4, PDO::PARAM_STR); 
                $resultado -> bindParam(":chamada4",$chamada4, PDO::PARAM_STR);
                $resultado -> bindParam(":nome5",$nome5, PDO::PARAM_STR); 
                $resultado -> bindParam(":chamada5",$chamada5, PDO::PARAM_STR);
                $resultado -> bindParam(":equipe",$equipe, PDO::PARAM_STR);
                $resultado -> bindParam(":genero",$genero, PDO::PARAM_STR);
                $resultado -> bindParam(":id",$id,PDO::PARAM_INT);
                $resultado -> execute();

                $contar = $resultado -> rowCount();
                if($contar > 0){
                    header("refresh: 1");
                }else {
                    echo'<p c lass="fracasso">Os dados nao foram atualizados!</p>';
                }
            }catch(PDOException $erro){
                echo "ERRO de update: " . $erro -> getMessage();
            }
        }
    ?>

    <section class="dados">
<h2>Nomes:</h2> 
<p><?php echo $nomeRetornado ?> <?php echo $nome2Retornado ?> <?php echo $nome3Retornado ?> <?php echo $nome4Retornado ?> <?php echo $nome5Retornado ?></p>
<h2>Chamada:</h2> 
<p><?php echo $chamadaRetornado ?> <?php echo $chamada2Retornado ?> <?php echo $chamada3Retornado ?> <?php echo $chamada4Retornado ?> <?php echo $chamada5Retornado ?></p>
<h2>Gênero:</h2> 
<p><?php echo $generoRetornado ?></p>
<h2>Equipe:</h2> 
<p><?php echo $equipeRetornado ?></p>


    </section>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipes copinha</title>
    <link rel="stylesheet" href="Teste2.css">
</head>
<body>
<?php
        include("conect.php");

        if(isset($_POST["btn"])){
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
            $equipe = $_POST["equipe"];
            $genero = $_POST["genero"];

        $inserir = "INSERT INTO copinha(nome,chamada,nome2,chamada2,nome3,chamada3,nome4,chamada4,nome5,chamada5,equipe,genero) VALUES(:nome,:chamada,:nome2,:chamada2,:nome3,:chamada3,:nome4,:chamada4,:nome5,:chamada5,:equipe,:genero)"; //QUERY SQL DE INSERÇÃO NO BANCO
     
        try{
            $resultado = $conect -> prepare($inserir); //prepara o envio dos dados pro banco
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
            $resultado -> execute();

            $contar = $resultado -> rowCount();
            if($contar > 0){
                echo "dados enviados com sucesso";
            }else{
                echo "falha no envio dos dados";
            }

        }catch(PDOException $erro){
            echo "houve um erro no código: " . $erro -> getMessage();
        }
    
    }
    ?>

<section>
<h1 style="color:#fff; font-size: 40px; text-align:left;">Equipes já cadastradas</h1>
 <table><!--estrutura da tabela inteira-->
        <tr><!--linhas da tabela-->
            <td>#</td> <!--itens da tabela--> 
            <td> time</td>
            <td> equipe</td> 
            <td> N°</td> 
            <td>gênero</td>
        </tr>
        <?php
            $selecionar = "SELECT * FROM copinha ORDER BY id";

            try{
                $rSelect = $conect -> prepare($selecionar);
                $rSelect -> execute();
                $num = 1;
                $soma = 0;

                $cSelect = $rSelect -> rowCount();
                if($cSelect > 0){
                    while($mostrar = $rSelect -> FETCH(PDO::FETCH_OBJ)){//while = laço de repetição
                        //FETCH = função em PHP que tranforma campos do banco em elementos HTML
                    
        ?>

                <td><?php echo $num++;?></td>
                <td><?php echo $mostrar -> equipe;?></td>
                <td><?php echo $mostrar -> nome; echo "<br>" .  $mostrar -> nome2; echo "<br>" .  $mostrar -> nome3; echo "<br>" .  $mostrar -> nome4; echo "<br>" .  $mostrar -> nome5;?></td>
                <td><?php echo $mostrar -> chamada;   echo "<br>" .  $mostrar -> chamada2;  echo "<br>" .  $mostrar -> chamada3;  echo "<br>" .  $mostrar -> chamada4; echo "<br>" .  $mostrar -> chamada5;?></td>
                <td><?php echo $mostrar -> genero;?></td>
               </tr>
        <?php
                    }
                }
            }catch(PDOException $erro){
                echo "Tá errado:" . $erro -> getMessage();
            }

        ?>
<a href="index.php">Voltar para a pagina inicial</a>


</body>
</html>

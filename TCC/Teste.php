<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipes Feira de ciências</title>
    <link rel="stylesheet" href="Teste.css">
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
            $turma = $_POST["turma"];
            $tema = $_POST["tema"];
            $orientador = $_POST["orientador"];

            $inserir = "INSERT INTO ciencia(nome,chamada,nome2,chamada2,nome3,chamada3,nome4,chamada4,turma,tema,orientador) VALUES(:nome,:chamada,:nome2,:chamada2,:nome3,:chamada3,:nome4,:chamada4,:turma,:tema,:orientador)"; //QUERY SQL DE INSERÇÃO NO BANCO
     
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
                $resultado -> bindParam(":turma",$turma, PDO::PARAM_STR);
                $resultado -> bindParam(":tema",$tema, PDO::PARAM_STR);
                $resultado -> bindParam(":orientador",$orientador, PDO::PARAM_STR);
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

<h1>Equipes já cadastradas</h1>
<a href="index.php">Voltar para a pagina inicial</a>
 <table><!--estrutura da tabela inteira-->
        <tr><!--linhas da tabela-->
            <td>#</td> <!--itens da tabela-->
            <td> turma</td> 
            <td> equipe</td> 
            <td> N°</td> 
            <td> tema</td>
            <td>Orientador</td>
        </tr>
        <?php
            $selecionar = "SELECT * FROM ciencia ORDER BY id";

            try{
                $rSelect = $conect -> prepare($selecionar);
                $rSelect -> execute();
                $num = 1;

                $cSelect = $rSelect -> rowCount();
                if($cSelect > 0){
                    while($mostrar = $rSelect -> FETCH(PDO::FETCH_OBJ)){//while = laço de repetição
                        //FETCH = função em PHP que tranforma campos do banco em elementos HTML
                    
        ?>

                <td><?php echo $num++;?></td>
                <td><?php echo $mostrar -> turma;?></td>
                <td><?php echo $mostrar -> nome; echo "<br>" .  $mostrar -> nome2; echo "<br>" .  $mostrar -> nome3; echo "<br>" .  $mostrar -> nome4;?></td>
                <td><?php echo $mostrar -> chamada;   echo "<br>" .  $mostrar -> chamada2;  echo "<br>" .  $mostrar -> chamada3;  echo "<br>" .  $mostrar -> chamada4;?></td>
                <td><?php echo $mostrar -> tema;?></td>
                <td><?php echo $mostrar -> orientador;?></td>
            
            </tr>

            
        <?php
                    }
                }
            }catch(PDOException $erro){
                echo "Tá errado:" . $erro -> getMessage();
            }
        ?>

</body>
</html>

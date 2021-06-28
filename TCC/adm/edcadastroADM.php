<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipes Feira de ciências</title>
    <link rel="stylesheet" href="cadastroADM.css">
</head>
<body>
<h1>Equipes já cadastradas</h1>
 <table><!--estrutura da tabela inteira-->
        <tr><!--linhas da tabela-->
            <td>#</td> <!--itens da tabela-->
            <td> turma</td> 
            <td> equipe</td> 
            <td> N°</td> 
            <td> tema</td>
            <td>Orientador</td>
            <td>Ações</td>
        </tr>
        <?php
        include("conect.php");
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
                <td style="display:flex; align-self:center;justify-content:space-around;"><a href="../comp/deletciencia.php?id=<?php echo $mostrar -> id;?>" class="delete" onclick="return confirm('Deseja remover esse cadastro?')">X</a>
                <a href="../comp/editarciencia.php?id=<?php echo $mostrar -> id;?>" class="editar">E</a></td>
            
            </tr>

            
        <?php
                    }
                }
            }catch(PDOException $erro){
                echo "Tá errado:" . $erro -> getMessage();
            }
        ?>
        <a href="cadastroADM.php">voltar à pagina inicial</a>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipes copinha</title>
    <link rel="stylesheet" href="copinhaADM.css">
</head>
<body>
<section>
<h1 style="color:#fff; font-size: 50px;">Equipes já cadastradas</h1>
 <table><!--estrutura da tabela inteira-->
        <tr><!--linhas da tabela-->
            <td>#</td> <!--itens da tabela--> 
            <td> time</td>
            <td> equipe</td> 
            <td> N°</td> 
            <td>gênero</td>
            <td>Ações</td>
        </tr>
        <?php
        include("conect.php");
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
<nav>
<td style="display:flex; align-self:center;justify-content:space-around;"><a href="../comp/deletciencia.php?id=<?php echo $mostrar -> id;?>" class="delete" onclick="return confirm('Deseja remover esse cadastro?')">X</a>
                <a href="../comp/editarcopa.php?id=<?php echo $mostrar -> id;?>" class="editar">E</a></td>
                    </nav>
               </tr>
               
        <?php
                    }
                }
            }catch(PDOException $erro){
                echo "Tá errado:" . $erro -> getMessage();
            }
        ?>
</section>
<a href="copinhaADM.php">voltar à pagina inicial</a>

</body>
</html>
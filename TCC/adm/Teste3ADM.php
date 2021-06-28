<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alimentos arrecadados</title>
  <link rel="stylesheet" href="teste3ADM.css">
</head>
<body>

<section>
<h1>Equipes já cadastradas</h1>
<a href="natalADM.php">voltar à pagina inicial</a>
 <table><!--estrutura da tabela inteira-->
        <tr><!--linhas da tabela-->
            <td>#</td> <!--itens da tabela--> 
            <td>Turma</td>
            <td>Feijâo</td>
            <td>Arroz</td> 
            <td>Macarrão</td> 
            <td>Óleo</td>
        </tr>
        <?php
            include("conect.php");
            $selecionar = "SELECT * FROM natal ORDER BY id DESC";

            try{
                $rSelect = $conect -> prepare($selecionar);
                $rSelect -> execute();
                $num = 1;
                $soma_feijao = 0;
                $soma_arroz = 0;
                $soma_macarrao = 0;
                $soma_oleo = 0;

                $cSelect = $rSelect -> rowCount();
                if($cSelect > 0){
                    while($mostrar = $rSelect -> FETCH(PDO::FETCH_OBJ)){//while = laço de repetição
                        //FETCH = função em PHP que tranforma campos do banco em elementos HTML
                    
        ?>

                <td><?php echo $num++;?></td>
                <td><?php echo $mostrar -> turma;?></td>
                <td><?php echo $mostrar -> feijao;?></td>
                <td><?php echo $mostrar -> arroz;?></td>
                <td><?php echo $mostrar -> macarrao;?></td>
                <td><?php echo $mostrar -> oleo;?></td>
               </tr>

                <?php
                    $soma_feijao = $soma_feijao + $mostrar -> feijao;
                    $soma_arroz = $soma_arroz + $mostrar -> arroz;
                    $soma_macarrao = $soma_macarrao + $mostrar -> macarrao;
                    $soma_oleo = $soma_oleo + $mostrar -> oleo;
                ?>
        <?php
                    }
                }
            }catch(PDOException $erro){
                echo "Tá errado:" . $erro -> getMessage();
            }
        ?>
            <tr>
                <td>Total</td>
                <td>Turmas</td>
                <td><?php echo $soma_feijao;?></td>
                <td><?php echo $soma_arroz;?></td>
                <td><?php echo $soma_macarrao;?></td>
                <td><?php echo $soma_oleo;?></td>
            </tr>
        </table>
</section>


</body>
</html>
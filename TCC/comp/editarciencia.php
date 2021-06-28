<?php
    include("../conect.php");
    if(!isset($_GET["id"])){
        header("Location:../cadastro.php");
        exit;
    }else{
        $id = filter_input(INPUT_GET,"id", FILTER_DEFAULT);
        $selecionar = "SELECT * FROM ciencia WHERE id=:id";

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
                    $chamadaRetornado = $mostrar -> chamada;
                    $chamada2Retornado = $mostrar -> chamada2;
                    $chamada3Retornado = $mostrar -> chamada3;
                    $chamada4Retornado = $mostrar -> chamada4;
                    $temaRetornado = $mostrar -> tema;
                    $turmaRetornado = $mostrar -> turma;
                    $oriRetornado = $mostrar -> orientador;
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
    <title>Edição Feira de ciências</title>
    <link rel="stylesheet" href="editarciencia.css">
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
</section>
    <form method="POST" text="#fff">
        
        <label for="equipe">Equipe</label>
        <div>
            <input class="name" type="text" name="nome" placeholder="Nome..." required="" value="<?php echo $nomeRetornado?>">
            <input class="nmr" type="text" name="chamada" placeholder="N°..." required="" value="<?php echo $chamadaRetornado?>">
            <input class="name" type="text" name="nome2" placeholder="Nome..." required="" value="<?php echo $nome2Retornado?>">
            <input class="nmr" type="text" name="chamada2" placeholder="N°..." required="" value="<?php echo $chamada2Retornado?>">
            <input class="name" type="text" name="nome3" placeholder="Nome..." required="" value="<?php echo $nome3Retornado?>">
            <input class="nmr" type="text" name="chamada3" placeholder="N°..." required="" value="<?php echo $chamada3Retornado?>">
            <input class="name" type="text" name="nome4" placeholder="Nome..." value="<?php echo $nome4Retornado?>"> 
            <input class="nmr" type="text" name="chamada4" placeholder="N°..." value="<?php echo $chamada4Retornado?>">

        </div>  
        <label for="turma">Turma</label>
        <select name="turma" class="selecao" value="<?php echo $turma?>">
            <option >1°Informática</option>
            <option >1°Enfermagem</option>
            <option >1°Admisnitração</option>
            <option >2°Informática</option>
            <option >2°Enfermagem</option>
            <option >2°Administração</option>
            <option>3°Informática</option>
            <option >3°Enfermagem</option>
            <option>3°Administração</option>
        </select>
        <label for="tema">Tema</label>
        <input type="text" name="tema" value="<?php echo $temaRetornado?>" required="">

        <label for="orientador" value="<?php echo $oriRetornado?>">Orientador</label>
        <select name="orientador" class="selecao">
            <option value="Leandro">Leandro</option>
            <option value="Sanzio">Sanzio</option>
            <option value="Douglas">Douglas</option>
            <option value="Jéssica">Jéssica</option>
            <option value="D'emery">D'emery</option>
            <option value="Marcos">Marcos</option>

        </select>

        <button type="submit" name="btn-update">Enviar</button>
<a href="../adm/cadastroADM.php">Voltar ao cadastro principal</a>
    </form>

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
            $turma = $_POST["turma"];
            $tema = $_POST["tema"];
            $orientador = $_POST["orientador"];

            $editar = "UPDATE ciencia SET nome=:nome,nome2=:nome2,nome3=:nome3,nome4=:nome4,chamada=:chamada,chamada2=:chamada2,chamada3=:chamada3,chamada4=:chamada4,turma=:turma,tema=:tema,orientador=:orientador WHERE id=:id"; //query para atualizar os dados
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
                $resultado -> bindParam(":turma",$turma, PDO::PARAM_STR);
                $resultado -> bindParam(":tema",$tema, PDO::PARAM_STR);
                $resultado -> bindParam(":orientador",$orientador, PDO::PARAM_STR);
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
<p><?php echo $nomeRetornado ?> <?php echo $nome2Retornado ?> <?php echo $nome3Retornado ?> <?php echo $nome4Retornado ?></p>
<h2>Chamada:</h2> 
<p><?php echo $chamadaRetornado ?> <?php echo $chamada2Retornado ?> <?php echo $chamada3Retornado ?> <?php echo $chamada4Retornado ?></p>
<h2>Turma:</h2> 
<p><?php echo $turmaRetornado ?></p>
<h2>Orientador:</h2> 
<p><?php echo $oriRetornado ?></p>
<h2>Tema:</h2> 
<p><?php echo $temaRetornado ?></p>

        </table>
    </section>
</body>
</html>
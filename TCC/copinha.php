<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro na copinha</title>
    <link rel="stylesheet" href="copinha.css">

</head>
<body>
  <section>  
    <form action="Teste2.php" method="POST" text="#fff">
        
        <div>
        <h1 style="margin:1%; font-family: Arial; font-size: 250%;">Equipe</h1>
            <input class="name" type="text" name="nome" placeholder="Nome..." id="nome" required="">
            <input class="nmr" type="text" name="chamada" placeholder="N°..." id="chamada" required="">
            <input class="name" type="text" name="nome2" placeholder="Nome..." id="nome2" required="">
            <input class="nmr" type="text" name="chamada2" placeholder="N°..." id="chamada2" required="">
            <input class="name" type="text" name="nome3" placeholder="Nome..." id="nome3" required="">
            <input class="nmr" type="text" name="chamada3" placeholder="N°..." id="chamada3" required="">
            <input class="name" type="text" name="nome4" placeholder="Nome..." id="nome4"> 
            <input class="nmr" type="text" name="chamada4" placeholder="N°..." id="chamada4">
            <input class="name" type="text" name="nome5" placeholder="Nome..." id="nome5" > 
            <input class="nmr" type="text" name="chamada5" placeholder="N°..." id="chamada5">

        </div>  

       <div style="display:flex;  margin-top: 2%;">
       <h2>Gênero</h2>
        <select name="genero" class="selecao" style="margin-left:1%;">
             <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
        </select>
        </div>

       
        <div style="flex-diretion:row; display:flex; margin-top: 2%;">
        <h2>Time</h2>
        <input type="text" name="equipe" placeholder="Digite o nome do time..." required="">
        <button type="submit" name="btn">Enviar</button>
        </div>
        <div style="display:flex; margin-top: 8%; justify-content: space-around;">
        <a href="index.php">Voltar para a pagina inicial</a>
        <a href="teste2.php">Ver equipes já cadastradas</a>
        </div>
</form>
</section>
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
                header("Refresh: 2, teste2.php");
            }else{
                echo "falha no envio dos dados";
            }

        }catch(PDOException $erro){
            echo "houve um erro no código: " . $erro -> getMessage();
        }
    
    }
    ?>

</body>
</html>
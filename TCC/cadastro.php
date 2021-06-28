<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro feira de ciências</title>
    <link rel="stylesheet" href="cadastro.css">
</head>

    <form action="Teste.php" method="POST" text="#fff">
        
        <label for="equipe">Equipe</label>
        <div>
            <input class="name" type="text" name="nome" placeholder="Nome..." required="">
            <input class="nmr" type="text" name="chamada" placeholder="N°..." required="">
            <input class="name" type="text" name="nome2" placeholder="Nome..." required="">
            <input class="nmr" type="text" name="chamada2" placeholder="N°..." required="">
            <input class="name" type="text" name="nome3" placeholder="Nome..." required="">
            <input class="nmr" type="text" name="chamada3" placeholder="N°..." required="">
            <input class="name" type="text" name="nome4" placeholder="Nome..." > 
            <input class="nmr" type="text" name="chamada4" placeholder="N°..." >

        </div>  
        <label for="turma">Turma</label>
        <select name="turma" class="selecao">
            <option value="1°Informatica">1°Informática</option>
            <option value="1°Enfermagem">1°Enfermagem</option>
            <option value="1°adiministracao">1°Admisnitração</option>
            <option value="2°Informatica">2°Informática</option>
            <option value="2°Enfermagem">2°Enfermagem</option>
            <option value="2°adiministracao">2°Administração</option>
            <option value="3°Informatica">3°Informática</option>
            <option value="2°Enfermagem">3°Enfermagem</option>
            <option value="3°adiministracao">3°Administração</option>
        </select>
        <label for="tema">Tema</label>
        <input type="text" name="tema" placeholder="Informe o tema do projeto..." required="">

        <label for="orientador">Orientador</label>
        <select name="orientador" class="selecao">
            <option value="Leandro">Leandro</option>
            <option value="Sanzio">Sanzio</option>
            <option value="Douglas">Douglas</option>
            <option value="Jéssica">Jéssica</option>
            <option value="D'emery">D'emery</option>
            <option value="Marcos">Marcos</option>

        </select>

        <button type="submit" name="btn">Enviar</button>
        <div style="display:flex; justify-content:space-around; color:#000;">
        <a href="index.php">voltar para a pagina inicial</a>
        <a href="teste.php">Ver equipes já cadastradas</a>
        </div>
    </form>


    
</body>
</html>
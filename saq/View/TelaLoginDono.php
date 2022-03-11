<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAQ-Login-Dono</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/nav_foot.css">
    <link rel="stylesheet" href="assets/css/style.css"> 
</head>

<body>
    <div class="text-center">
        <nav id="cabecario">
            <h2 >Sistema de Aluguel de Quadras Esportivas</h2>
            <img  src="assets/img/Bola-de-Futebol.png" alt="SAQ" width ="50" /> 
            <img  src="assets/img/BolaDeBasquete-removebg-preview.png" alt="SAQ" width ="55" />
            <img  src="assets/img/BolaDeVolei.png" alt="SAQ" width ="55" />    
        </nav>
    </div>

    <h1>Login Dono</h1>
    <form method="POST">
        <div class="form-login">
            
            <input type="email" id="inputEmail" name="Email_dono" placeholder="Entre com o email" required autofocus> <br>
            
            <input type="password"  id="inputPassword" name="Senha_dono"  placeholder="Entre com a senha" required><br>
            
            <button class="buttonoptions" name="entrar" type="submit">Entrar</button>
            <abbr title="Clique aqui para cadastrar-se"><a id="cadastrese" href="TelaCadastroDono.php">Cadastre-se</a></abbr> <br><br> 
       
            <?php
                //Conecta com os arquivos
                require_once '../Controller/Conexao.php';
                require_once '../Model/Dono.php';
                
                //Instancias
                $d = new Dono;
                $conexao = new Conexao;
                
                if(isset($_POST['entrar'])) //Se o usuário clicar no botão "entrar"
                {
                    //php recebe os dados do formulário
                    $email = addslashes($_POST["Email_dono"]);
                    $senha = addslashes($_POST["Senha_dono"]);
                    
                    //verifica se esta tudo preenchido
                    if(!empty($email) && !empty($senha))
                    {
                        $conexao->conectar("saq", "localhost", "root", ""); //Conecta com BD
                        if($d -> logar($email, $senha)) //Se a função "logar" retornar "true"
                        {
                            //session_start();
                            setcookie("Email_dono", $email); //Cria o cookie da sessão com o email
                            header("location: TelaDono.php"); //Redireciona para a Tela do Dono
                        }
                        else //Se a função "logar" retornar "false"
                        {
                            echo"<div id='erro'>Senha ou Email incorretos!</div>";
                        }
                    }
                }
            ?>
            <a href="../index.html"> Voltar para index </a>
        </div>        
   </form>
</body>

<footer class="rodape">
    <div class="internorodape"><br>
    <p>APP Desenvolvido por</p><a href="https://github.com/WALTER-OBS-DEBUG" target="_blank" >Walter Jonas, Antony Gusmão e Mikael Hayden &copy; </a>
    <i class="bi bi-diamond-half"></i>
    </div>
</footer>
</html>
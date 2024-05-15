<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./TelaLogin.css">
    <title>Página de Login</title>
</head>
<body>
    <script language=javascript>

    //javascript para impossibilitar a entrada de dados do tipo string baseado na tabela ASC II
    function blokletras(keypress){
        if(keypress>=48 && keypress<=57){
            return true;
        }
        else{
            return false;
        }
    }
    </script>
 <style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif;
}

body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #000;
}

.Principal{
    position: relative;
    width: 400px;
    height: 500px;
    background: #000;
    border: 2px solid #ff1818;
    box-shadow: 0 0 45px groove #8E2F2C;
    border-radius: 50px 0px 50px 0px;
    padding: 20px;
}

.Principal:hover{
    animation: animate 1s linear infinite;
}

.Login{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    
}

h2{
    height: 70px;
    font-size: 30px;
    color: #fff;
    text-align: center;  
}

.info{
    position: relative;
    margin: 30px 0;
    border-bottom: 2px solid #fff;
}

.info label{
    position: absolute;
    top: 50%;
    left: 5px;
    transform: translateY(-50%);
    color: #fff;
    pointer-events: none;
    transition: .5s;
}

.info input{
    width: 320px;
    height: 40px;
    font-size: 16px;
    color: #ffffff;
    padding: 0px 10px;
    background: transparent;
    border: none;
    outline: none;
}

.info input:focus~label,
.info input:valid~label{
    top: -5px;
}

.button{
    position: relative;
    width: 50%;
    height: 40px;
    background:  #8E2F2C;
    font-size: 16px;
    color: #fff;
    font-weight: 500;
    cursor: pointer;
    border-radius: 30px;
    border: none;
    outline: none;
}
.button1{
    background-color: #000;
    color: white;
    border: 1px solid rgba(255,24,24,.5);
    width: 120px;
}
a{
    text-decoration: none;
    color:white;
}
</style>
    <div class="Principal">
        <div class="Login">
            <form action="" method="post">
                <h2>Tela de Login</h2>
                <div class="info">
                    <input type="text" required name="nme" maxlength="20">
                    <label for="">Seu Nome</label>
                </div>

                <div class="info">
                    <input type="password" required name="senha" maxlength="5" onkeypress="return blokletras(window.event.keyCode)">
                    <label for="">Sua Senha</label>
                </div>

                <button class="button" name="logar">Logar</button>
            </form>
        </div>
    </div>
    <?php
    extract($_POST, EXTR_OVERWRITE); 
    if(isset($logar))
    {
        include_once 'usuario.php';
        $u = new Usuario();
        $u->setUsuario($nme);
        $u->setSenha($senha);
        $pro_bd=$u->login();

        $existe = false;
        foreach($pro_bd as $pro_mostrar) 
        {
            $existe = true;
            ?>
           <?php echo '<div style="color:white; font-size: 20px; margin: 20px;">'."Seja muito bem vinda(o) ".$pro_mostrar[0]."
            !! Clique no Botão abaixo para ter acesso ao:".
            '<div style="color: rgba(255, 24, 24, 0.7); font-size: 20px;">'.
            "<em>Menu Principal</em> da <em>AUTORIA</em> e suas informações.</strong>";?>

            <Center>
            <br><button class="button button1"><a href="MenuPrincipal.html">Entrar</button></br>
            </Center>
        <?php
        }
        if($existe==false){
            echo '<script> alert("Login inválido\nTente Novamente")</script>';
        }
    }
    ?>
</div>
</body>
</html>
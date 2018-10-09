<?php 
session_start();
include "header.php";

if(isset($_SESSION['status'])){($_SESSION['status']=='sucess'? header("location:index.php"):"");};

?>
    <title>NextFlix - Login</title>

    <main class="login">
        <header class="login">
            <figure>
                <a href="index.php"><img src="img/netflix-text.png" alt="NextFlix"></a>
            </figure>
        </header>

        <section class="login">
            <section>
                <h1>Sign In</h1>
                <form action="login-check.php" method="POST" >
                    <h4 id="danger3">
                        <?php if(isset($_SESSION['status'])){echo ($_SESSION['status']=='fail'?"User ou senha incorretos.":"");}; ?>
                    </h4>
                    <label for="login">
                        <h2>User:</h2>
                        <input type="text" name="login" id="login" placeholder="Digite seu usuário... ">
                        <h3 id="danger1">
                            Campo obrigatório.
                        </h3>
                    </label>
                    <label for="pw">
                        <h2>Password:</h2>
                        <input type="password" name="pw" id="pw" placeholder="Digite sua senha...">
                        <h3 id="danger2">
                            Campo obrigatório.
                        </h3>
                    </label>
                    <button <?php if(isset($_SESSION['status'])){echo ($_SESSION['status']=='fail'?"style='background-color: #F00;'":"");}; ?> onclick="validate(this)" type="submit" value="entar" name="entrar" >Login</button>
                </form>
            </section>
        </section>

        <footer class="login">
            &copyhireia
        </footer>
    </main>

    <script>
        /* Pega todos os inputs e coloca num Array = inputs */
        var inputs = document.getElementsByTagName("input");
        
        /* Adiciona no evento "focusout", a função check */
        for(var i = 0; i < inputs.length; i++){
            inputs[i].addEventListener("focusout", function(){ check(this); });    
        }

        /* Segura a atualização da página com PREVENTDEFAULT caso esteja vazio os inputs, e emite aviso. Else, envia o form */
        function validate(form) {
           if(document.getElementById("login").value == "" || document.getElementById("pw").value == ""){
                event.preventDefault(); //Caso tente enviar com algum campo vazio ele checa e mostra qual está vazio.
                this.check(inputs[0]);
                this.check(inputs[1]);
           }
           else {
               form.submit();
           }
        }
        
        /* Checa se os inputs estão vazios, caso estejam mostra a mesagem de "Campo obrigatório" */
        function check(x){
            if(x.value == ""){
                if(x.id == "login"){
                    document.getElementById("danger1").style.opacity = "1";
                }
                if(x.id == "pw"){
                    document.getElementById("danger2").style.opacity = "1";
                }
            }
            else
            {
                if(x.id == "login"){
                    document.getElementById("danger1").style.opacity = "0";
                }
                if(x.id == "pw"){
                    document.getElementById("danger2").style.opacity = "0";
                }
            }
        }
</script>
    

<?php
session_destroy(); //Destroy a sessão. Estou usando este método para executar a ação de "SAIR" do usuário logado.
include "footer.php"
?>
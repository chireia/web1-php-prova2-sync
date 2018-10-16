<?php 
    session_start();
    $current = "Login";
    require_once "head.php";

    if(isset($_SESSION['status'])){($_SESSION['status']=='sucess'? header("location:index.php"):"");};
?>

    <main class="login">
        <header>
            <figure>
                <a href="index.php"><img src="img/netflix-text.png" alt="NextFlix"></a>
            </figure>
        </header>

        <section>
            <section>
                <h1>Sign In</h1>
                <form action="crud.php" method="post" onsubmit="validate(event)">
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
                    <button <?php if(isset($_SESSION['status'])){echo ($_SESSION['status']=='fail'?"style='background-color: #F00;'":"");}; ?> type="submit" name="action" value="login">Login</button>
                </form>
            </section>
        </section>

        <footer>
            &copyhireia
        </footer>
    </main>

    <script>
        /* Pega todos os inputs e coloca num Array = inputs */
        var fields = document.querySelectorAll("input");
        
        /* Adiciona no evento "focusout", a função check */
        for(let field of fields){
            field.addEventListener("focusout", function(){ check(this); })    
        }

        /* Segura a atualização da página com PREVENTDEFAULT caso esteja vazio os inputs, e emite aviso. Else, envia o form */
        function validate(event) {
            for (let field of fields) {
                if(field.value == ""){
                    event.preventDefault(); //Caso tente enviar com algum campo vazio ele checa e mostra qual está vazio.
                     this.check(field);
                }
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
require_once "footer.php"
?>
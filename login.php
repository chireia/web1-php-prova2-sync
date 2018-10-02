<?php 
session_start();
include "header.php";

if(isset($_SESSION['status'])){($_SESSION['status']=='sucess'? header("location:index.php"):"");};

?>
    <title>NextFlix - Login</title>

    <main class="login">
        <header class="login">
            <figure>
                <img src="img/netflix-text.png" alt="NextFlix">
            </figure>
        </header>

        <section class="login">
            <section>
                <h1>Sign In</h1>
                <form action="login-check.php" method="POST" >
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
                        <h4 id="danger3">
                            <?php if(isset($_SESSION['status'])){echo ($_SESSION['status']=='fail'?"Fail.":"");}; ?>
                        </h4>
                    </label>
                    <button onclick="validate(this)" type="submit" value="entar" name="entrar" >Login</button>
                </form>
            </section>
        </section>

        <footer class="login">
            &copyhireia
        </footer>
    </main>

    <script>
        var inputs = document.getElementsByTagName("input");
        for(var i = 0; i < inputs.length; i++){
            inputs[i].addEventListener("focusout", function(){ check(this); });    
        }

        function toggle() {
            var x = document.getElementById("danger3");
            if(x.style.display == "none"){
                x.style.display = "block";
            }
            else{
                x.style.display = "none";
            }
        }

        function validate(form) {
           if(document.getElementById("login").value == "" || document.getElementById("pw").value == ""){
                event.preventDefault();
           }
           else {
               form.submit();
           }

        }

        function check(x){
            if(x.value == ""){
                if(x.id == "login"){
                    document.getElementById("danger1").style.display = "block";
                }
                if(x.id == "pw"){
                    document.getElementById("danger2").style.display = "block";
                }
            }
            else
            {
                if(x.id == "login"){
                    document.getElementById("danger1").style.display = "none";
                }
                if(x.id == "pw"){
                    document.getElementById("danger2").style.display = "none";
                }
            }
        }
        
</script>
    

<?php
include "footer.php"
?>
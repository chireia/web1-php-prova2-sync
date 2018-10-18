<?php
    session_start();
    $current = "Create";
    require_once "head.php";
    require_once "connectDB.php";

    /* Se o login não estiver realizado, manda para tela de login */
    $_SESSION['status']=='sucess'? true : header("location:login.php");
    $_SESSION['type']=='Admin'? true : header("location:index.php");
?>

    <main class="<?=$current?>">
        <header id="pc">
            <figure>
                <a href="index.php"><img src="img/netflix-text.png" alt="NextFlix"></a>
            </figure>

            <nav id="menus">
                <a href="index.php" <?=$current=='Home' ? "class='mhere'" : false?>><h3>Home</h3></a>
                <a href="create.php" <?=$current=='Create' ? "class='mhere'" : false?>><h3>Create</h3></a>
            </nav>

            <section id="user">
                <div>Eae 
                    <?= $_SESSION['user'] ?>
                </div>
                <div>
                    <?= "Você é um usuário ".$_SESSION['type'] ?>
                </div>
            </section>

            <button>
                <a href="login.php">Logoff</a>
            </button>
        </header>

        <header id="mobile">
            <figure>
                <a href="index.php"><img src="img/netflix-text.png" alt="NextFlix"></a>
            </figure>
            <div id="burger">
                <div id="burger-btn">
                    <i class="material-icons md-light">menu</i>
                </div>
                <nav id="burger-itens">
                    <div class="user">
                    <i class="material-icons">person</i> 
                        <span><?= $_SESSION['user'] ?></span>
                    </div>
                    <a href="index.php" <?=$current=='Home' ? "class='mhere'": false?>><i class="material-icons md-light">home</i><span class="item">Home</span></a>
                    <?=isset($_SESSION['type']) && $_SESSION['type']=='Admin'?
                    "<a href='create.php' class='mhere'><i class='material-icons md-light mhere'>backup</i><span class='item mhere'>Create</span></a>":false;?>
                    <a href="login.php" class="logoff"><i class="material-icons md-light logoff">exit_to_app</i><span class="item logoff">Logoff</span></a>
                </nav>
            </div>
        </header>
        
        <section>
            <h1>Movie Registration</h1>
            <?=(isset($_SESSION['insert']) && $_SESSION['insert']=='sucess')?"<span class='sucess'>Sucess!</span>":false?>
            <?=(isset($_SESSION['insert']) && $_SESSION['insert']=='fail')?"<span class='fail'>Fail!</span>":false?>
            <form action="crud.php" method="post" onsubmit="validate(event)">
                <label for="mname">
                    <h3>Movie Name: </h3>
                    <input id="mname" type="text" placeholder="Name..." name="mname"  maxlength="300" autofocus>
                </label><br>
                <label for="mdesc">
                    <h3>Movie Description:</h3>
                    <textarea id="mdesc" type="text" placeholder="Desc..." name="mdesc" maxlength="600"></textarea>
                </label><br>
                <label for="mdur">
                    <h3>Movie Duration:</h3>
                    <input id="mdur" type="number" placeholder="minutes" name="mdur" min="0" maxlength="9999" step="1" >
                </label><br>
                <label for="mclassf">
                    <h3>Movie Classification:</h3>
                    <select name="mclassf" id="mclassf">
                        <option value=""></option>
                        <?php 
                            $query = "SELECT * FROM classifications c ORDER BY c.classificationId";
                            $options = mysqli_query($con, $query);
                            
                            while ($option = mysqli_fetch_array($options)) {
                                echo "<option value='".$option['classificationId']."'>".$option['classificationSimbol']."</option>";
                            }
                        ?>
                    </select>
                </label><br>
                <label for="mgenre">
                    <h3>Movie Genre:</h3>
                    <select name="mgenre" id="mgenre">
                        <option value=""></option>
                        <?php 
                            $query = "SELECT * FROM genres g ORDER BY g.genreName";
                            $options = mysqli_query($con, $query);
                            
                            while ($option = mysqli_fetch_array($options)) {
                                echo "<option value='".$option['genreId']."'>".$option['genreName']."</option>";
                            }
                        ?>
                    </select>
                </label><br>
                <button type="submit" name="action" value="create">Save</button>
            </form>
        </section>

        <footer>
            &copyhireia
        </footer>
    </main>

    <script>
        /* Pega todos os inputs e coloca num Array = fields */
        var fields = document.querySelectorAll('input, select, textarea');
        console.log(fields);
        
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
                x.style.borderColor = "#F00";
            }
            else
            {
                x.style.borderColor = "#0F0";
            }
        }
    </script>
<?php
    unset($_SESSION['insert']);
    require_once "footer.php"
?>
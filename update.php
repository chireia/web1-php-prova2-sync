<?php
    session_start();
    $current = "Update";
    require_once "head.php";
    require_once "connectDB.php";

    /* Se o login não estiver realizado, manda para tela de login */
    $_SESSION['status']=='sucess'? true : header("location:login.php");
    $_SESSION['type']=='Admin'? true : header("location:index.php");

    
    if(isset($_GET['id'])){      
        $id = $_GET['id'];
        $query = "SELECT * FROM movies WHERE movieId = $id";
        $select = mysqli_query($con, $query);
        $item = mysqli_fetch_array($select);
    }
    else {
        header("location:index.php");
    }
?>

    <main class="<?=$current?>">

        <header id="pc">
            <figure>
                <a href="index.php"><img src="img/netflix-text.png" alt="NextFlix"></a>
            </figure>

            <nav id="menus">
                <a href="index.php" <?=$current=='Home' ? "class='mhere'" : false?>><h3>Home</h3></a>
                <?=isset($_SESSION['type']) && $_SESSION['type']=='Admin'?
                "<a href='create.php' <?=$current=='Create' ? 'class='mhere'' : false?><h3>Create</h3></a>":false;?>
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
                    <a href="index.php" <?=$current=='Home' ? "class='mhere'": false?>><i class="material-icons md-light <?=$current=='Home' ? 'mhere': false?>">home</i><span class="item <?=$current=='Home' ? 'mhere' : false?>">Home</span></a>
                    <?=isset($_SESSION['type']) && $_SESSION['type']=='Admin'?
                    "<a href='create.php'><i class='material-icons md-light'>backup</i><span class='item'>Create</span></a>":false;?>
                    <a href="login.php" class="logoff"><i class="material-icons md-light logoff">exit_to_app</i><span class="item logoff">Logoff</span></a>
                </nav>
            </div>
        </header>

        <section>
            <h1>Movie Update</h1>
            <form action="crud.php" method="post" onsubmit="validate(event)">
                <input type="hidden" name="mid" value="<?=$item['movieId']?>">
                <label for="mname">
                    <h3>Movie Name: </h3>
                    <input id="mname" type="text" placeholder="Name..." name="mname"  maxlength="300" autofocus value="<?=$item['movieName']?>">
                </label><br>
                <label for="mdesc">
                    <h3>Movie Description:</h3>
                    <input id="mdesc" type="text" placeholder="Desc..." name="mdesc" maxlength="600" value="<?=$item['movieDesc']?>">
                </label><br>
                <label for="mdur">
                    <h3>Movie Duration:</h3>
                    <input id="mdur" type="number" placeholder="minutes" name="mdur" min="0" maxlength="9999" step="1" value="<?=$item['movieDuration']?>">
                </label><br>
                <label for="mclassf">
                    <h3>Movie Classification:</h3>
                    <select name="mclassf" id="mclassf">
                        <?php 
                            $query = "SELECT * FROM classifications c ORDER BY c.classificationId";
                            $options = mysqli_query($con, $query);
                            
                            while ($option = mysqli_fetch_array($options)) {
                                echo "<option value='".$option['classificationId']."'";
                                echo $option['classificationId'] == $item['movieClassificationId']?" selected ":"";
                                echo ">".$option['classificationSimbol']."</option>";
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
                                echo "<option value='".$option['genreId']."'";
                                echo $option['genreId'] == $item['movieGenreId']? "selected":false;
                                echo ">".$option['genreName']."</option>";
                            }
                        ?>
                    </select>
                </label><br>
                <button type="submit" name="action" value="edit">Save</button>
            </form>
        </section>
    </main>

    <script>
        /* Pega todos os inputs e coloca num Array = fields */
        var fields = document.querySelectorAll('input, select');
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
    require_once "footer.php"
?>
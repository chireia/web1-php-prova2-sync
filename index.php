<?php
    $current = "Home";
    session_start();
    require_once "head.php";
    require_once "connectDB.php";

    /* Se o login não estiver realizado, manda para tela de login */
    $_SESSION['status']=='sucess'? true : header("location:login.php");
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
                <div>Olá 
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
            <i class="material-icons md-light">menu</i>
        </header>

        <section>
            <h1>Movie List</h1>
            <?=(isset($_SESSION['delete']) && $_SESSION['delete']=='sucess')?"<span class='fail'>Delete Sucess!</span>":false?>
            <?=(isset($_SESSION['delete']) && $_SESSION['delete']=='fail')?"<span class='fail'>Delete Fail!</span>":false?>
            <?=(isset($_SESSION['update']) && $_SESSION['update']=='sucess')?"<span class='sucess'>Update Sucess!</span>":false?>
            <?=(isset($_SESSION['update']) && $_SESSION['update']=='fail')?"<span class='fail'>Update Fail!</span>":false?>
            <?php 
            $query = "SELECT * FROM movies m INNER JOIN genres g ON m.movieGenreId = g.genreId INNER JOIN classifications c ON m.movieClassificationId = c.classificationId ORDER BY m.movieName";
            $select = mysqli_query($con, $query);
            
            while ($res = mysqli_fetch_array($select)) {
                echo    "<article>
                            <h3>".$res['movieName']."</h3>
                            <p><a href='movie.php?id=".$res['movieId']."'><img src='img/".$res['movieGenreId'].".png' width='100'></a></p>
                            <p>".$res['movieDuration']."</p>
                            <p>".$res['genreName']."</p>
                            <p>".$res['classificationSimbol']."</p>";
                            if(isset($_SESSION['type']) && $_SESSION['type']=='Admin'){
                                echo "<a href='update.php?id=$res[movieId]&action=edit'><button>Edit</button></a>";
                                echo "<a onclick='sure(event)' href='crud.php?id=$res[movieId]&action=del'><button>Delete</button></a>";
                            };
                echo    "</article>";
            }
            ?>
        </section>

        <footer>

        </footer>
    </main>

    <script>
        function sure(event) {
            var opt = confirm("Sure?");
            if (opt == true) {
            }
            else{
                event.preventDefault();
            }
        }
    </script>
<?php
    unset($_SESSION['update']);
    unset($_SESSION['delete']);
    require_once "footer.php"
?>
<?php
    session_start();
    $current = "Movie";
    require_once "head.php";
    require_once "connectDB.php";

    /* Se o login não estiver realizado, manda para tela de login */
    $_SESSION['status']=='sucess'? true : header("location:login.php");
    
    if(isset($_GET['id'])){      
        $id = $_GET['id'];
        $query = "SELECT * FROM movies m INNER JOIN genres g ON m.movieGenreId = g.genreId INNER JOIN classifications c ON m.movieClassificationId = c.classificationId WHERE movieId = $id";
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
            <h1>Movie Overview</h1>
            <figure><img src="img/<?=$item['movieGenreId']?>.png"></figure>
            <section>
                <div id="title">
                    <h2><?=$item['movieName']?></h2>
                    <img src="img/<?=$item['classificationSimbol']?>.png" width='40px'>
                </div>
                <div>
                    <h3>Description:</h3>
                    <p><?=$item['movieDesc']?></p>
                </div>
                <div id="DG">
                    <h3>Duration: <?=$item['movieDuration']?> m</h3>
                        <h3>Genre: <?=$item['genreName']?></h3>

                </div>
            </section>
        </section>

        <footer>
            &copyhireia
        </footer>
    </main>

<?php
    require_once "footer.php"
?>
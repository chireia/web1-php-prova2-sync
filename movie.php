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
            
        </header>

        <section>
            <h1>Movie Overview</h1>
            <figure><img src="img/<?=$item['movieGenreId']?>.png"></figure>
            <section>
                <h2><?=$item['movieName']?></h2>
                <span><?=$item['classificationSimbol']?></span>
                <p><?=$item['movieDesc']?></p>
                <p><?=$item['movieDuration']?></p>
                <p><?=$item['genreName']?></p>
            </section>
        </section>
    </main>

<?php
    require_once "footer.php"
?>
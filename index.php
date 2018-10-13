<?php
    session_start();
    include "header.php";
    include "connectDB.php";

    /* Se o login não estiver realizado, manda para tela de login */
    $_SESSION['status']=='sucess'? true : header("location:login.php");
?>
    
    <title>NextFlix - Home</title>

    <main class="index">

        <header class="index">
            <figure>
                <a href="index.php"><img src="img/netflix-text.png" alt="NextFlix"></a>
            </figure>
            <section id="menus">
                <a href="index.php">Home</a>
                <a href="">Register</a>
                <a href="">Update</a>
            </section>
           <section id="user">
                <div>Boa noite <?= $_SESSION['user'] ?></div>
                <div><?= "Você é um usuário ".$_SESSION['type'] ?></div>
            </section>
            <button>
                <a href="login.php">Logoff</a>
            </button>
        </header>

        <section class="index">
            <table>
                <?php 
                $query = "SELECT m.movieId,m.movieName,m.movieDesc,g.genreName,c.classificationSimbol FROM movies m INNER JOIN genres g ON m.movieGenreId = g.genreId INNER JOIN classifications c ON m.movieClassificationId = c.classificationId";
                $select = mysqli_query($con, $query);
                
                while ($res = mysqli_fetch_array($select)) {
                    echo "<tr><td>".$res['movieId']."</td><td>".$res['movieName']."</td><td>".$res['movieDesc']."</td><td>".$res['genreName']."</td><td>".$res['classificationSimbol'];
                }

                ?>
            </table>
        </section>

        <footer>

        </footer>
    </main>

<?php
    include "footer.php"
?>
<?php
    header('Content-type: application/json');
    require_once "connectDB.php";
    
/*  
    movieId
    movieName
    movieDesc
    movieDuration
    movieClassificationId
    movieGenreId
    genreId
    genreName
    classificationId
    classificationSimbol
    classificationDesc
 */

    $query = "SELECT * FROM movies m INNER JOIN genres g ON m.movieGenreId = g.genreId INNER JOIN classifications c ON m.movieClassificationId = c.classificationId";
    $res = mysqli_query($con, $query);

    while ($arr = mysqli_fetch_assoc($res)) {
        $json[] = $arr;
    }

    
    echo (json_encode($json));
?>
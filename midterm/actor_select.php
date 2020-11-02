<?php 
    $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
   
    if(isset($_GET['first_name']) && isset($_GET['last_name'])){
        $filtered_id = mysqli_real_escape_string($link, $_GET['first_name']);
        $filtered_id2 = mysqli_real_escape_string($link, $_GET['last_name']);
    } else {
        $filtered_id = mysqli_real_escape_string($link, $_POST['first_name']);
        $filtered_id2 = mysqli_real_escape_string($link, $_POST['last_name']);
    }
    
    $query = "
        select film.film_id, title, first_name, last_name, description, release_year, name, rating,
        special_features, rental_duration, rental_rate
        from film
        inner join film_actor 
        on film.film_id = film_actor.film_id 
        inner join actor 
        on film_actor.actor_id = actor.actor_id
        inner join film_category 
        on film.film_id = film_category.film_id
        inner join category 
        on film_category.category_id = category.category_id 
        WHERE first_name='{$filtered_id}' and last_name='{$filtered_id2}'
        ORDER BY 1 DESC;
    ";

    $result = mysqli_query($link, $query);
    $film = '';

    while($row = mysqli_fetch_array($result)){
        $film .= '<tr>';
        $film .= '<td>'.$row['film_id'].'</td>';
        $film .= '<td>'.$row['first_name'].'</td>';
        $film .= '<td>'.$row['last_name'].'</td>';
        $film .= '<td>'.$row['title'].'</td>';
        $film .= '<td>'.$row['description'].'</td>';
        $film .= '<td>'.$row['release_year'].'</td>';
        $film .= '<td>'.$row['name'].'</td>';
        $film .= '<td>'.$row['rating'].'</td>';
        $film .= '<td>'.$row['special_features'].'</td>';
        $film .= '<td>'.$row['rental_duration'].'</td>';
        $film .= '<td>'.$row['rental_rate'].'</td>';
        $film .= '</tr>';
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="uft-8">
    <title> 배우 출연 영화 </title>
    <style> 
        body{
            background-color: #F0DFF4;
            font-family: Concolas,m monospace;
            font-family: 12px;
            text-align: center;
        }
        table{
            width: 100%;
        }
        th,td{
            padding: 10px;
            border-bottom: 1px solid #dadada;
    
        }
    </style>
</head>
<body>
        <h2><a href="index.php">매장 재고 영화 시스템</a> | 배우 출연 영화</h2>
        <table>
            <tr>
                <th>film_id</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>title</th>
                <th>description</th>
                <th>release_year</th>
                <th>category_name</th>
                <th>rating</th>
                <th>special_features</th>
                <th>rental_duration</th>
                <th>rental_rate</th>
            </tr>
            <?=$film?>
        </table>
</body>
</html>

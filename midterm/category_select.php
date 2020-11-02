<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
    $filtered = array(
        'category' => mysqli_real_escape_string($link, $_POST['category'])
    );

    $query = "
        select film.film_id, title, description, release_year, name, rating,
        special_features, rental_duration, rental_rate
        from film 
        inner join film_category 
        on film.film_id = film_category.film_id
        inner join category 
        on film_category.category_id = category.category_id 
        where category.category_id = {$filtered['category']}
        ORDER BY 1 desc";

    $result = mysqli_query($link, $query);
    $film = '';

    while($row = mysqli_fetch_array($result)){
        $film .= '<tr>';
        $film .= '<td>'.$row['film_id'].'</td>';
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
    <title> 카테고리별 영화 </title>
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
        <h2><a href="index.php">매장 재고 영화 시스템</a> | 카테고리별 영화</h2>
        <table>
            <tr>
                <th>film_id</th>
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

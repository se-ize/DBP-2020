<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
    $filtered = array(
        'id' => mysqli_real_escape_string($link, $_POST['id'])
    );

    $query = "
        select film.film_id, title,
        rental.rental_date, rental.return_date, rental.last_update 
        from film 
        inner join inventory 
        on film.film_id = inventory.film_id 
        inner join rental 
        on inventory.inventory_id = rental.inventory_id
        where film.film_id = {$filtered['id']}
        ORDER BY 3 DESC";
    
    $result = mysqli_query($link, $query);
    $film = '';

    while($row = mysqli_fetch_array($result)){
        $film .= '<tr>';
        $film .= '<td>'.$row['film_id'].'</td>';
        $film .= '<td>'.$row['title'].'</td>';
        $film .= '<td>'.$row['rental_date'].'</td>';
        $film .= '<td>'.$row['return_date'].'</td>';
        $film .= '<td>'.$row['last_update'].'</td>';
        $film .= '</tr>';
    }

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="uft-8">
    <title> 영화 대여 및 반납일 </title>
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
    <h2><a href="index.php">매장 재고 영화 시스템</a> | 영화 대여 및 반납일</h2>
    <table>
        <tr>
            <th>film_id</th>
            <th>title</th>
            <th>rental_date</th>
            <th>return_date</th>
            <th>last_update</th>
        </tr>
        <?=$film?>
    </table>
</body>

</html>

<?php
    $link = mysqli_connect("localhost", "admin", "admin", "employees");
    $filtered = array(
        'num' => mysqli_real_escape_string($link, $_POST['num']),
        'strength' => mysqli_real_escape_string($link, $_POST['strength']),
        'range' => mysqli_real_escape_string($link, $_POST['range'])
    );
    $query = "SELECT * FROM employees 
    where emp_no between {$filtered['num']} and {$filtered['num']}+{$filtered['strength']}-1
    ORDER BY emp_no {$filtered['range']}";
    
    $result = mysqli_query($link, $query);
    $emp_info = '';

    while($row = mysqli_fetch_array($result)){
        $emp_info .= '<tr>';
        $emp_info .= '<td>'.$row['emp_no'].'</td>';
        $emp_info .= '<td>'.$row['birth_date'].'</td>';
        $emp_info .= '<td>'.$row['first_name'].'</td>';
        $emp_info .= '<td>'.$row['last_name'].'</td>';
        $emp_info .= '<td>'.$row['gender'].'</td>';
        $emp_info .= '<td>'.$row['hire_date'].'</td>';
        $emp_info .= '<td><a href="emp_update.php?emp_no='.$row['emp_no'].'">update</a></td>';
        $emp_info .= '<td><a href="emp_delete.php?emp_no='.$row['emp_no'].'">delete</a></td>';
        $emp_info .= '</tr>';
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> 직원 관리 시스템 </title>
</head>

<body>
    <h2><a href="index.php">직원 관리 시스템 | 직원 정보 조회</a></h2>
    <table border="1">
        <tr>
            <th>emp_no</th>
            <th>birth_date</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>gender</th>
            <th>hire_date</th>
            <th>update</th>
            <th>delete</th>
        </tr>
        <?=$emp_info?>
    </table>
    <form action="emp_selectname.php" method="POST">
        이름으로 조회
        <input type="text" name="first_name" placeholder="first_name">
        <input type="text" name="last_name" placeholder="last_name">
        <input type="submit" value="Search">
    </form>
    <form action="emp_delete.php" method="POST">
</body>

</html>
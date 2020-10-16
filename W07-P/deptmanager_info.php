<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'employees');

    if(mysqli_connect_errno()){
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }

    $query = "
         SELECT dept_manager.dept_no, dept_name, first_name, last_name, from_date, to_date
         FROM dept_manager 
         INNER JOIN employees 
         ON employees.emp_no = dept_manager.emp_no
         INNER JOIN departments 
         ON dept_manager.dept_no = departments.dept_no
         ORDER BY dept_no DESC
    ";

    $article = '';
    $result = mysqli_query($link, $query);
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row['dept_no'];
        $article .= '</td><td>';
        $article .= $row['dept_name'];
        $article .= '</td><td>';
        $article .= $row['first_name'];
        $article .= '</td><td>';
        $article .= $row['last_name'];
        $article .= '</td><td>';
        $article .= $row['from_date'];
        $article .= '</td><td>';
        $article .= $row['to_date'];
        $article .= '</td></tr>';
    }

    mysqli_free_result($result);
    mysqli_close($link);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="uft-8">
    <title> 부서별 매니저 정보 </title>
    <style> 
        body{
            font-family: Concolas,m monospace;
            font-family: 12px;
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
        <h2><a href="index.php">직원 관리 시스템</a> | 부서별 매니저 정보</h2>
        <table>
            <tr>
                <th>dept_no</th>
                <th>dept_name</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>from_date</th>
                <th>to_date</th>
            </tr>
            <?= $article ?>
        </table>
</body>
</html>
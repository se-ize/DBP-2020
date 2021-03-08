<?php 
    $link = mysqli_connect("localhost", "dbpt07", "dbp2020!!", "dbpt07");
    
    if(mysqli_connect_errno()){
        echo "MySQL 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }
    
?>
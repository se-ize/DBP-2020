<?php
  $link = mysqli_connect("localhost:3307", "root", "rootroot", "dbp");
  $filtered = array(
      'name' => mysqli_real_escape_string($link, $_POST['name']),
      'debutwork' => mysqli_real_escape_string($link, $_POST['debutwork'])
    );
    $query = "
        INSERT INTO playwright
            (name, debutwork)
            VALUES(
                '{$filtered['name']}',
                '{$filtered['debutwork']}'
            )
    ";

    $result = mysqli_query($link, $query);
    if ($result == false) {
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
        error_log(mysqli_error($link));
    } else {
        header('Location: playwright.php'); //문제가 없으면 바로 보냄
    }

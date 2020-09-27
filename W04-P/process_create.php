<?php
  $link = mysqli_connect("localhost:3307", "root", "rootroot", "dbp");
  $filtered = array(
        'title' => mysqli_real_escape_string($link, $_POST['title']),
        'reason' => mysqli_real_escape_string($link,
        $_POST['reason']),
        'playwright_id' => mysqli_real_escape_string($link, $_POST['playwright_id'])
    );
    $query = "
        INSERT INTO drama
            (title, reason, created, playwright_id)
            VALUES(
                '{$filtered['title']}',
                '{$filtered['reason']}',
                NOW(),
                '{$filtered['playwright_id']}'
            )
    ";

    $result = mysqli_multi_query($link, $query);
    if ($result == false) {
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
        error_log(mysqli_error($link));
    } else {
        echo '성공했습니다. <a href="index.php">돌아가기</a>';
    }

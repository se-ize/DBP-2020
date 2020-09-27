<?php
  $link = mysqli_connect("localhost:3307", "root", "rootroot", "dbp");
  settype($_POST['id'], 'integer');
  $filtered = array(
      'id' => mysqli_real_escape_string($link, $_POST['id']),
      'name' => mysqli_real_escape_string($link, $_POST['name']),
      'debutwork' => mysqli_real_escape_string($link, $_POST['debutwork'])
  );
  $query = "
      UPDATE playwright
          SET
              name = '{$filtered['name']}',
              debutwork = '{$filtered['debutwork']}'
          WHERE
              id = '{$filtered['id']}'
  ";

  $result = mysqli_query($link, $query);
  if( $result == false ){
      echo '수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
      error_log(mysqli_error($link));
  } else {
      header('Location: playwright.php');
  }
?>

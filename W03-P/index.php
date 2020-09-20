<?php
  $link = mysqli_connect("localhost:3307", "root", "rootroot", "dbp");
  $query = "SELECT * FROM drama";
  $result = mysqli_query($link, $query);
  $list = '';
  while ($row = mysqli_fetch_array($result)) {
      $list = $list."<li><a href=\"index.php?id={$row['id']}\">
    {$row['title']}</a></li>";
  }

  $article = array(
    'title' => '당신의 인생드라마를 소개해주세요&#128525;',
    'reason' => ''
  );

  if (isset($_GET['id'])) {
      $query = "SELECT * FROM drama WHERE id={$_GET['id']}";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $article = array(
    'title' => $row['title'],
    'reason' => $row['reason']
  );
      $update_link = '<a href="update.php?id='.$_GET['id'].'">수정해보세요&#128512;</a>';
      $delete_link = '
  <form action="process_delete.php" method="POST">
  <input type="hidden" name="id" value="'.$_GET['id'].'">
  <input type="submit" value="삭제해보세요&#128557;">
  </form>
  ';
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> 인생드라마를 소개합니다 </title>
  <style>
    h1 { background-color: #E6E6FA; width: 220px; }
    body { background-color: #FFFACD; }
    h2 { color: red; }
  </style>
</head>
<body>
  <h1><a href="index.php"> 인생드라마&#128250;</a></h1>
  <ol> <?= $list ?> </ol>
  <a href="create.php"> 추가해보세요&#128521;</a>
  <?=$update_link?>
  <?=$delete_link?>
  <h2> <?= $article['title'] ?> </h2>
   <?=$article['reason'] ?>
</body>
</html>

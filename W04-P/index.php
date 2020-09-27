<?php
  $link = mysqli_connect("localhost:3307", "root", "rootroot", "dbp");
  $query = "SELECT * FROM drama";
  $result = mysqli_query($link, $query);
  $list ='';
  while ($row = mysqli_fetch_array($result)) {
      $escaped_title = htmlspecialchars($row['title']);
      $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
  }

  $article = array(
    'title' => '당신의 인생드라마를 소개해주세요&#128525;',
    'reason' => ''
  );

  $update_link = '';
  $delete_link = '';
  $playwright = '';

  if (isset($_GET['id'])) {
      $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
      $query = "SELECT * FROM drama LEFT JOIN playwright
      ON drama.playwright_id = playwright.id WHERE
      drama.id={$filtered_id}";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $article['title'] = htmlspecialchars($row['title']);
      $article['reason'] = htmlspecialchars($row['reason']);
      $article['name'] = htmlspecialchars($row['name']);

      $update_link = '<a href="update.php?id='.$_GET['id'].'">수정해보세요&#128512;</a>';
      $delete_link = '
        <form action="process_delete.php" method="post">
          <input type="hidden" name="id" value="'.$_GET['id'].'">
          <input type="submit" value="삭제해보세요&#128557;">
        </form>
      ';

      $playwright = "<p>by {$article['name']}</p>";
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
    <a href="playwright.php">playwright</a>
    <ol><?= $list ?></ol>
    <a href="create.php"> 추가해보세요&#128521;</a>
    <?= $update_link ?>
    <?= $delete_link ?>
    <h2><?= $article['title'] ?></h2>
    <?= $article['reason'] ?>
    <?= $playwright ?>
  </body>
</html>

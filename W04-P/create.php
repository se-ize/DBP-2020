<?php
  $link = mysqli_connect("localhost:3307","root","rootroot","dbp");
  $query = "SELECT * FROM drama";
  $result = mysqli_query($link, $query);
  $list ='';

  while ($row = mysqli_fetch_array($result)) {
      $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

  $article = array(
    'title' => '인생드라마',
    'reason' => '이유'
  );

  $updated_link = '';

  if (isset($_GET['id'])) {
      $query = "SELECT * FROM drama WHERE id={$_GET['id']}";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $article = array(
      'title' => $row['title'],
      'reason' => $row['reason']
    );
      $updated_link = '<a href="update.php?id'.$_GET['id'].'">update</a>';
  }

  $query = "SELECT * FROM playwright";
  $result = mysqli_query($link, $query);
  $select_form = '<select name="playwright_id">';
  while ($row = mysqli_fetch_array($result)) {
    $select_form .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
  }
  $select_form .= '</select>';

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> 인생드라마를 소개합니다 </title>
    <style>
      h1 { background-color: #E6E6FA; width: 220px; }
      body { background-color: #FFFACD; }
    </style>
  </head>
  <body>
    <h1><a href="index.php"> 인생드라마&#128250; </a></h1>
    <ol><?= $list ?></ol>
    <form action="process_create.php" method="POST">
      <p><input type="text" name="title" placeholder="드라마 제목"></p>
      <p><textarea name="reason" placeholder="인생드라마인 이유는?"></textarea></p>
      <?= $select_form ?>
      <p><input type="submit"></p>
    </form>
  </body>
</html>

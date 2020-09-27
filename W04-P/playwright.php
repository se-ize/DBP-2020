<?php
  $link = mysqli_connect("localhost:3307", "root", "rootroot", "dbp");
  $query = "SELECT * FROM playwright";
  $result = mysqli_query($link, $query);
  $playwright_info = '';

  while ($row = mysqli_fetch_array($result)) {
    $filtered = array(
      'id' => htmlspecialchars($row['id']),
      'name' => htmlspecialchars($row['name']),
      'debutwork' => htmlspecialchars($row['debutwork'])
    );
    $playwright_info .= '<tr>';
    $playwright_info .= '<td>'.$filtered['id'].'</td>';
    $playwright_info .= '<td>'.$filtered['name'].'</td>';
    $playwright_info .= '<td>'.$filtered['debutwork'].'</td>';
    $playwright_info .= '<td><a href="playwright.php?id='.$filtered['id'].'">update</a></td>';
    $playwright_info .= '
    <td>
      <form action="process_delete_playwright.php" method="post">
        <input type="hidden" name="id" value="'.$filtered['id'].'">
        <input type="submit" value="delete">
      </form>
    </td>
    ';
    $playwright_info .= '</tr>';
  };

  $escaped = array(
    'name' => '',
    'debutwork' => ''
  );

  $form_action = 'process_create_playwright.php';
  $label_submit = 'Create playwright';
  $form_id = ''; //처음에 playwright 페이지 가면 비어있음

  if(isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
    settype($filtered_id, 'integer');
    $query = "SELECT * FROM playwright WHERE id = {$filtered_id}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $escaped['name'] = htmlspecialchars($row['name']);
    $escaped['debutwork'] = htmlspecialchars($row['debutwork']);

    $form_action = 'process_update_playwright.php';
    $label_submit = 'Update playwright';
    $form_id = '<input type="hidden" name="id" value="'.$_GET['id'].'">';
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
  </style>
</head>
<body>
  <h1><a href="index.php"> 인생드라마&#128250; </a></h1>
  <p><a href="index.php">drama</a></p>

  <table border="1">
    <tr>
      <th>id</th>
      <th>name</th>
      <th>debutwork</th>
      <th>update</th>
      <th>delete</th>
    </tr>
      <?= $playwright_info ?>
  </table>
  <br>
  <form action="<?= $form_action ?>" method="post">
    <?= $form_id ?>
    <label for="fname">name:</label><br>
    <input type="text" id="name" name="name" placeholder="name"
    value="<?=$escaped['name']?>"><br>
    <label for="lname">debutwork:</label><br>
    <input type="text" id="debutwork" name="debutwork" placeholder="debutwork"
    value="<?=$escaped['debutwork']?>"><br><br>
    <input type="submit" value="<?= $label_submit ?>">
</form>
</body>
</html>

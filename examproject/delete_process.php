<?php

	include 'db_con.php';
	$filtered_id = mysqli_real_escape_string($link, $_POST['id']);

	$query = "DELETE FROM learningcourse WHERE id = '{$filtered_id}'";

	$result = mysqli_query($link, $query);
    $del_res = " ";
    
    $prevPage = $_SERVER['HTTP_REFERER'];
	if ($result == false) {
        $del_res = '삭제하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
        error_log(mysqli_error($link));
    } else {

        if(strpos($prevPage, 'course_detail'))
            header('Location:delete_edit.php');
        else
            header('Location:'.$prevPage);
    }
	
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>전국평생학습강좌</title>
    <link rel="stylesheet" href="main.css" type="text/css">
    <style>
        th {
            border-top: 2px solid #6b6b6b;
        }

        .pageButton {
            font-weight: bold;
            margin: 0px;
            margin-left:10px;
            font-family: 'NanumBarunpen', sans-serif;
            font-size: larger;
            text-align: center;
        }

        #button {
            width: 200px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        table{
            font-size: 13px;
        }

        #area-form {
            padding-bottom: 10px;
        }

    </style>
</head>

<body>
    <div id="wrap">
        <div id="header">전국평생학습강좌</div>
        <div id="nav">
            <a href="index.php">강좌안내</a>
            <a href="search.php">맞춤강좌 찾기</a>
            <a href="insert.php">강좌등록</a>
            <a href="delete_edit.php">강좌수정/삭제</a>
        </div>
		
        <div id="contents">
           <p><?= $del_res?></p>
         </div>
            

    </div>
</body>

</html>
<?php

    include 'db_con.php';

    $filtered_id = mysqli_real_escape_string($link, $_GET['id']);

    $query ="SELECT * FROM learningcourse WHERE id=".$filtered_id;

    $result = mysqli_query($link, $query);
    $article = '';
    $course_name = '';
    while($row = mysqli_fetch_array($result)){
        $course_name .= $row['course_name'];
        $article .= '<h2>'.$row['course_name'].'</h2>';
        $article .= '<table>';
        $article .= '<tr>';
        $article .= '<th>접수기간</th>';
        $article .= '<td>'.$row['receipt_start'].' ~ '.$row['receipt_finish'].'</td>';
        $article .= '<th>접수방법</th>';
        $article .= '<td>'.$row['receipt_method'].'</td>';
        $article .= '</tr>';
        $article .= '<tr>';
        $article .= '<th>교육기간</th>';
        $article .= '<td>'.$row['start_date'].' ~ '.$row['finish_date'].'</td>';
        $article .= '<th>교육시간</th>';
        $article .= '<td>'.$row['day'].' '.$row['start_time'].' ~ '.$row['finish_time'].'</td>';
        $article .= '</tr>';
        $article .= '<tr>';
        $article .= '<th>강사명</th>';
        $article .= '<td>'.$row['teacher_name'].'</td>';
        $article .= '<th>정원</th>';
        $article .= '<td>'.$row['capacity'].'명</td>';
        $article .= '</tr>';
        $article .= '<tr>';
        $article .= '<th>교육대상</th>';
        $article .= '<td>'.$row['target'].'</td>';
        $article .= '<th>수강료</th>';
        $article .= '<td>'.$row['price'].'원</td>';
        $article .= '</tr>';
        $article .= '<th>교육방법</th>';
        $article .= '<td>'.$row['on_off'].'</td>';
        $article .= '<th>접수/선정방법</th>';
        $article .= '<td>'.$row['receipt_method'].' '.$row['select_method'].'</td>';
        $article .= '</tr>';
        $article .= '<tr>';
        $article .= '<th>운영기관</th>';
        $article .= '<td>'.$row['agency'].'</td>';
        $article .= '<th>운영기관 전화번호</th>';
        $article .= '<td>'.$row['agency_phone'].'</td>';
        $article .= '</tr>';
        $article .= '<tr>';
        $article .= '<th>교육장소</th>';
        $article .= '<td>'.$row['address'].'<br>'.$row['place'].'</td>';
        $article .= '<th>홈페이지</th>';
        $article .= '<td><a href="'.$row['website'].'">'.$row['website'].'</a></td>';
        $article .= '<tr>';
        $article .= '<th>제공기관</th>';
        $article .= '<td>'.$row['provider_name'].'</td>';
        $article .= '<th>직업능력개발훈련비<br>지원강과여부</th>';
        $article .= '<td>'.$row['support'].'</td>';
        $article .= '</tr>';
        $article .= '<tr>';
        $article .= '<th>학점은행제평가<br>(학점)인정여부</th>';
        $article .= '<td>'.$row['academic'].'</td>';
        $article .= '<th>평생학습계좌제평가<br>인정여부</th>';
        $article .= '<td>'.$row['learning_account'].'</td>';
        $article .= '</tr>';
        $article .= '</table>';

        $article .= '<form id="forms" action = "delete_process.php" method = "POST">
                    <input type="hidden" name="id" value="'.$row['id'].'">
                    <input type="image" src="https://www.flaticon.com/svg/static/icons/svg/84/84086.svg" width="25" value="삭제">
                </form>';

        $article .= '<form id="forms" action = "edit.php?id='.$row['id'].'" method = "POST">
                            <input type="hidden" name="id" value="'.$row['id'].'">
                            <input type="image" src="https://www.flaticon.com/svg/static/icons/svg/84/84380.svg" width="25" value="수정">
                        </form>';

    }
    mysqli_free_result($result);
    mysqli_close($link);

    $buttonArticle ='';
    $prevPage = $_SERVER['HTTP_REFERER'];
	if (strpos($prevPage, 'edit.php')) {
        $buttonArticle .= '<a href="delete_edit.php">강좌목록으로</a>';
    } else {
        $buttonArticle .= '<a href="javascript:history.back()">강좌목록으로</a>';
    }

?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title><?=$course_name?></title>
    <link rel="stylesheet" href="main.css" type="text/css">
    <style>
        table {
            border: 1px solid #cccccc;
        }
        td {
            width: 400px;
            text-align: left;
            padding-left: 20px;
        }
        th{
            width: 200px;
            border-top: none;
        }
        h2{
            padding-left: 20px;
        }
        #button {
            width: 200px;
            margin: 0 auto;
            margin-top: 10px;
            padding: 20px;
            text-align: center;
            font-family: 'NanumBarunpen', sans-serif;
            font-weight: bold;
            font-size: larger;
        }

        #forms{
            margin: 10px;
            float:right;
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
            <?= $article ?>
            <div id="button">
                <!-- <a href="javascript:history.back()">강좌목록으로</a> -->
                <?= $buttonArticle ?>
            </div>
        </div>
    </div>
</body>

</html>

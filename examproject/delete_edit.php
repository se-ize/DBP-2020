<?php
    include 'db_con.php';

    //페이징 구현
    $currentPage = 1;
    if (isset($_GET["page"])){
        $currentPage = $_GET["page"];
    }

    $searchQuery = '';
    $searchParam = '?course_name=';
    if (!empty($_GET)){
        $searchQuery .= 'WHERE course_name like "%'.$_GET['course_name'].'%" and ';
        $searchQuery .= 'teacher_name like "%'.$_GET['teacher_name'].'%" ';
        $searchParam .= $_GET['course_name'].'&teacher_name='.$_GET['teacher_name'];
    }
    
    $queryCount = "SELECT count(*) as count FROM learningcourse ".$searchQuery;
    $resultCount = mysqli_query($link, $queryCount);

    $rowCount = mysqli_fetch_array($resultCount);
    $totalRowNum = $rowCount['count'];

    $rowPerPage = 10; //페이지당 보여줄 강좌의 수
    $begin = ($currentPage - 1) * $rowPerPage;
    $lastPage = $totalRowNum / $rowPerPage;

    $pageParam = '&page=';

    $back = '';
    $firstPage = '';
    if($currentPage > 1){
        $back .= '<a class="pageButton" href="delete_edit.php'.$searchParam.$pageParam.($currentPage-1).'">이전</a>';
        $firstPage .= '<a class="pageButton" href="delete_edit.php'.$searchParam.$pageParam.'1">처음으로</a>';
    }

    $next = '';
    if($currentPage < $lastPage){
        $next .= '<a class="pageButton" href="delete_edit.php'.$searchParam.$pageParam.($currentPage+1).'">다음</a>';
    }

    //강좌 리스트 구현
    $query ='SELECT * FROM learningcourse '.$searchQuery.'order by id desc limit '.$begin.','.$rowPerPage;

    $result = mysqli_query($link, $query);
    $article = '';
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr>';
        $article .= '<td width=200px><a href="course_detail.php?id='.$row['id'].'">'.$row['course_name'].'</a></td>';
        $article .= '<td width=50px>'.$row['teacher_name'].'</td>';
        $article .= '<td width=450px>'.$row['address'].' '.$row['place'].'</td>';
        $article .= '<td width=100px>'.$row['start_date'].' ~ '.$row['finish_date'].'</td>';
        $article .= '<td width=100px>'.$row['price'].'원</td>';
        $article .= '<td width=50px>
                        <form action = "edit.php?id='.$row['id'].'" method = "POST">
                            <input type="hidden" name="id" value="'.$row['id'].'">
                            <input type="image" src="https://www.flaticon.com/svg/static/icons/svg/84/84380.svg" width="20" value="수정">
                        </form>
                    </td>';
        $article .= '<td width=50px>
                        <form action = "delete_process.php" method = "POST">
                            <input type="hidden" name="id" value="'.$row['id'].'">
                            <input type="image" src="https://www.flaticon.com/svg/static/icons/svg/84/84086.svg" width="20" value="삭제">
                        </form>
                    </td>';
        $article .= '</tr>';
    }

    if(strlen($article)==0){
        $article .= '<td colspan="7">조회된 강좌가 없습니다</td>';
    };

    mysqli_free_result($result);
    mysqli_close($link);

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
            <div id="area-form">
                <form action="delete_edit.php" method="GET">
                    <input type="text" name="course_name" placeholder="강좌명">
                    <input type="text" name="teacher_name" placeholder="강사명">
                    <input type="submit" value="검색">
                </form>
            </div>
            <table>
                <tr>
                    <th width=200px>강좌명</th>
                    <th width=50px>강사명</th>
                    <th width=450px>교육장소</th>
                    <th width=100px>교육기간</th>
                    <th width=100px>수강료</th>
					<th width=50px>수정</th>
					<th width=50px>삭제</th>
                </tr>
                <?= $article ?>
            </table>
            <div id = button>
                <?= $firstPage ?>
                <?= $back ?>
                <?= $next ?>
            </div>

        </div>
    </div>
</body>

</html>

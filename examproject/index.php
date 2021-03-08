<?php

    include 'db_con.php';

    //페이징 구현
    $currentPage = 1;
    if (isset($_GET["page"])){
        $currentPage = $_GET["page"];
    }

    $areaQuery = '';
    $areaParam = '';
    if (isset($_GET["area"])){
        $areaQuery .= 'WHERE substring_index(provider_name, " ", 1) = "'.$_GET['area'].'" ';
        $areaParam .= '?area='.$_GET['area'];
    }

    $queryCount = "SELECT count(*) as count FROM learningcourse ".$areaQuery;
    $resultCount = mysqli_query($link, $queryCount);

    $rowCount = mysqli_fetch_array($resultCount);
    $totalRowNum = $rowCount['count'];

    $rowPerPage = 10; //페이지당 보여줄 강좌의 수
    $begin = ($currentPage - 1) * $rowPerPage;
    $lastPage = $totalRowNum / $rowPerPage;

    $pageParam = '?page=';
    if(strlen($areaParam)>0){
        $pageParam = '&page=';
    }

    $back = '';
    $firstPage = '';
    if($currentPage > 1){
        $back .= '<a class="pageButton" href="index.php'.$areaParam.$pageParam.($currentPage-1).'">이전</a>';
        $firstPage .= '<a class="pageButton" href="index.php'.$areaParam.$pageParam.'1">처음으로</a>';
    }

    $next = '';
    if($currentPage < $lastPage){
        $next .= '<a class="pageButton" href="index.php'.$areaParam.$pageParam.($currentPage+1).'">다음</a>';
    }

    //강좌 리스트 구현
    $query ='SELECT * FROM learningcourse '.$areaQuery.'order by id desc limit '.$begin.','.$rowPerPage;

    $result = mysqli_query($link, $query);
    $article = '';
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr>';
        $article .= '<td width=200px><a href="course_detail.php?id='.$row['id'].'">'.$row['course_name'].'</a></td>';
        $article .= '<td width=50px>'.$row['teacher_name'].'</td>';
        $article .= '<td width=450px>'.$row['address'].' '.$row['place'].'</td>';
        $article .= '<td width=100px>'.$row['start_date'].' ~ '.$row['finish_date'].'</td>';
        $article .= '<td width=100px>'.$row['receipt_start'].' ~ '.$row['receipt_finish'].'</td>';
        $article .= '<td width=100px>'.$row['price'].'원</td>';
        $article .= '</tr>';
    }
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
                <form action="index.php" method="GET">
                    <select name="area">
                        <option value="">지역선택</option>
                        <option value="경기도">경기도</option>
                        <option value="인천광역시">인천광역시</option>
                        <option value="서울특별시">서울특별시</option>
                        <option value="강원도">강원도</option>
                        <option value="충청북도">충청북도</option>
                        <option value="충청남도">충청남도</option>
                        <option value="경상북도">경상북도</option>
                        <option value="전라남도">경상남도</option>
                        <option value="전라북도">전라북도</option>
                        <option value="전라남도">전라남도</option>
                        <option value="부산광역시">부산광역시</option>
                        <option value="대전광역시">대전광역시</option>
                        <option value="광주광역시">광주광역시</option>
                        <option value="울산광역시">울산광역시</option>
                        <option value="제주특별자치도">제주특별자치도</option>
                    </select>
                    <input type="submit" value="검색">
                </form>
            </div>
            <table>
                <tr>
                    <th width=200px>강좌명</th>
                    <th width=50px>강사명</th>
                    <th width=450px>교육장소</th>
                    <th width=100px>교육기간</th>
                    <th width=100px>접수기간</th>
                    <th width=100px>수강료</th>
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

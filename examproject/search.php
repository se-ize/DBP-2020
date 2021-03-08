<?php 
    include 'db_con.php';

    $currentPage = 1;
    if (isset($_GET["page"])){
        $currentPage = $_GET["page"];
    }

    $searchQuery='';
    $searchParam = '?area=';
    if (!empty($_GET)){
        $searchQuery .= 'WHERE provider_name like "%'.$_GET['area'].'%" and ';
        $searchQuery .= 'target like "%'.$_GET['age'].'%" and ';
        $searchQuery .= 'day like "%'.$_GET['day'].'%" and ';
        if($_GET['time']=='오전')
            $searchQuery .= 'substring_index(start_time, ":", 1)<12 and ';
        else if($_GET['time']=='오후')
            $searchQuery .= 'substring_index(start_time, ":", 1)>=12 and ';
        $searchQuery .= 'on_off like "%'.$_GET['onoff'].'%" and ';
        if($_GET['price']=='무료')
            $searchQuery .= 'price = 0';
        else if($_GET['price']=='유료')
            $searchQuery .= 'price >= 1';
        else
            $searchQuery .= 'price like "%%"';
        $searchParam .= $_GET['area'].'&age='.$_GET['age'].'&day='.$_GET['day'].'&time='.$_GET['time'].'&onoff='.$_GET['onoff'].'&price='.$_GET['price'];

        //페이징
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
            $back .= '<a class="pageButton" href="search.php'.$searchParam.$pageParam.($currentPage-1).'">이전</a>';
            $firstPage .= '<a class="pageButton" href="search.php'.$searchParam.$pageParam.'1">처음으로</a>';
        }

        $next = '';
        if($currentPage < $lastPage){
            $next .= '<a class="pageButton" href="search.php'.$searchParam.$pageParam.($currentPage+1).'">다음</a>';
        }


        //리스트
        $query = 'SELECT * FROM learningcourse '.$searchQuery.' limit '.$begin.','.$rowPerPage;
        $result = mysqli_query($link, $query);
        $article='';
        while($row = mysqli_fetch_array($result)){
            $article .= '<tr>';
            $article .= '<td width=300px><a href="course_detail.php?id='.$row['id'].'">'.$row['course_name'].'</a></td>';
            $article .= '<td width=75px>'.$row['teacher_name'].'</td>';
            $article .= '<td width=150px>'.$row['provider_name'].'</td>';
            $article .= '<td width=150px>'.$row['target'].'</td>';
            $article .= '<td width=100px>'.$row['day'].'</td>';
            $article .= '<td width=150px>'.$row['start_time'].' ~ '.$row['finish_time'].'</td>';
            $article .= '<td width=100px>'.$row['on_off'].'</td>';
            $article .= '<td width=75px>'.$row['price'].'원</td>';
            $article .= '</tr>';
        }

        if(strlen($article)==0){
            $article .= '<td colspan="7">조회된 강좌가 없습니다</td>';
        };

        mysqli_free_result($result);
        mysqli_close($link);
    }
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>맞춤강좌 찾기</title>
    <link rel="stylesheet" href="main.css" type="text/css">
    <style>
        #forms {
            margin:0 auto;
            width: 1000px;
            text-align: center;
            font-size: 14px;
            
        }
        #options{
            text-align: center;
            padding-right: 10px;
            float: left;
            padding-bottom: 10px;
        }

        table{
            font-size: 13px;
        }

        select{
            width:100px;
        }

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
            <div id="forms">
                <form action="search.php" method="GET">
                    <div id="options">
                        <label for="area">지역: </label>
                        <select name="area">
                            <option value="">전체</option>
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
                    </div>
                    <div id="options">
                        <label for="age">대상: </label>
                        <select name="age">
                            <option value="">전체</option>
                            <option value="아동">아동</option>
                            <option value="초등">초등</option>
                            <option value="중등">중등</option>
                            <option value="고등">고등</option>
                            <option value="청년">청년</option>
                            <option value="중년">중년</option>
                            <option value="어르신">노년</option>
                            <option value="장애인">장애인</option>
                            <option value="외국인">외국인</option>
                        </select>
                    </div>
                    <div id="options">
                        <label for="day">요일: </label>
                        <select name="day">
                            <option value="">전체</option>
                            <option value="월">월</option>
                            <option value="화">화</option>
                            <option value="수">수</option>
                            <option value="목">목</option>
                            <option value="금">금</option>
                            <option value="토">토</option>
                            <option value="일">일</option>
                        </select>
                    </div>
                    <div id="options">
                        <label for="time">시간대: </label>
                        <select name="time">
                            <option value="">전체</option>
                            <option value="오전">오전</option>
                            <option value="오후">오후</option>
                        </select>
                    </div>
                    <div id="options">
                        <label for="onoff">온/오프라인: </label>
                        <select name="onoff">
                            <option value="">전체</option>
                            <option value="온라인">온라인</option>
                            <option value="오프라인">오프라인</option>
                        </select>
                    </div>
                    <div id="options">
                        <label for="price">수강료: </label>
                        <select name="price">
                            <option value="">전체</option>
                            <option value="무료">무료</option>
                            <option value="유료">유료</option>
                        </select>
                    </div>
                    <div id="options">
                        <input type="submit" value="검색">
                    </div>
                </form>
            </div>
            <table>
                <tr>
                    <th width=300px>강좌명</th>
                    <th width=75px>강사명</th>
                    <th width=150px>지역</th>
                    <th width=150px>대상</th>
                    <th width=100px>요일</th>
                    <th width=150px>시간대</th>
                    <th width=100px>온/오프라인</th>
                    <th width=75px>수강료</th>
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

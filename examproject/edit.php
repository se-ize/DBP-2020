<?php
include 'db_con.php';

if(isset($_GET['id'])){
        $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
    } else {
        $filtered_id = mysqli_real_escape_string($link, $_POST['id']);
    }
    $query = " SELECT * FROM learningcourse WHERE id='{$filtered_id}' ";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
 ?>

<html>
<head>
    <meta charset="UTF-8">
    <title>강좌수정</title>
    <link rel="stylesheet" href="main.css" type="text/css">
    <style>
        table {
            border: 1px solid #cccccc;
            font-size: 14px;
        }
        td {
            width: 400px;
            text-align: left;
            padding-left: 20px;
        }
        th{
            text-align:right;
            padding-right: 20px;
            width: 250px;
            border-top: none;
        }
        p {
            text-align: right;
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
            <form action="edit_process.php" method="POST">
                <table>
                    <tr>
                        <th>강좌명</th>
                        <td><input type="text" name="course_name" value="<?=$row['course_name']?>" placeholder="course_name"></td>
                        <th>강좌번호</th>
                        <td><input type="text" name="id" value="<?=$row['id']?>" placeholder="id" readonly></td>
                    </tr>
                    <tr>
                        <th>강사명</th>
                        <td><input type="text" name="teacher_name" value="<?=$row['teacher_name']?>" placeholder="teacher_name"></td>
                        <th>강좌내용</th>
                        <td><input type="text" name="category" value="<?=$row['category']?>" placeholder="category"></td>
                    </tr>
                    <tr>
                        <th>교육시작일</th>
                        <td><input type="date" value="<?=$row['start_date']?>" name="start_date"></td>
                        <th>교육종료일</th>
                        <td><input type="date" value="<?=$row['finish_date']?>" name="finish_date"></td>
                    </tr>
                    <tr>
                        <th>교육시작시각</th>
                        <td><input type="time" value="<?=$row['start_time']?>" name="start_time"></td>
                        <th>교육종료시각</th>
                        <td><input type="time" value="<?=$row['finish_time']?>" name="finish_time"></td>

                    </tr>
                    <tr>
                        <th>교육대상</th>
                        <td><input type="text" name="target" value="<?=$row['target']?>" placeholder="target"></td>
                        <th>교육방법</th>
                        <td><input type="text" name="on_off" value="<?=$row['on_off']?>" placeholder="온라인 or 오프라인"></td>
                    </tr>
                    <tr>
                        <th>운영요일</th>
                        <td><input type="text" name="day" value="<?=$row['day']?>" placeholder="day"></td>
                        <th>교육장소</th>
                        <td><input type="text" name="place" value="<?=$row['place']?>" placeholder="place"></td>
                    </tr>
                    <tr>
                        <th>강좌정원</th>
                        <td><input type="number" name="capacity" value="<?=$row['capacity']?>" placeholder="capacity"></td>
                        <th>수강료</th>
                        <td><input type="number" name="price" value="<?=$row['price']?>" placeholder="price"></td>
                    </tr>
                    <tr>
                        <th>교육장 도로명주소</th>
                        <td><input type="text" name="address" value="<?=$row['address']?>" placeholder="address"></td>
                        <th>운영기관</th>
                        <td><input type="text" name="agency" value="<?=$row['agency']?>"  placeholder="agency"></td>
                    </tr>
                    <tr>
                        <th>운영기관 전화번호</th>
                        <td><input type="text" name="agency_phone" value="<?=$row['agency_phone']?>" placeholder="agency_phone"></td>
                        <th>접수방법</th>
                        <td><input type="text" name="receipt_method" value="<?=$row['receipt_method']?>" placeholder="receipt_method"></td>
                    </tr>
                    <tr>
                        <th>접수시작일</th>
                        <td><input type="date" name="receipt_start" value="<?=$row['receipt_start']?>"></td>
                        <th>접수종료일</th>
                        <td><input type="date" name="receipt_finish" value="<?=$row['receipt_finish']?>"></td>
                    </tr>
                    <tr>
                        <th>선정방법</th>
                        <td><input type="text" name="select_method" value="<?=$row['select_method']?>" placeholder="select_method"></td>
                        <th>홈페이지</th>
                        <td><input type="text" name="website" value="<?=$row['website']?>" placeholder="website" placeholder="website"></td>
                    </tr>
                    <tr>
                        <th>직업능력개발훈련비<br> 지원강좌여부</th>
                        <td><input type="text" name="support" value="<?=$row['support']?>" placeholder="N or Y"></td>
                        <th>학점은행제평가(학점)<br> 인정여부</th>
                        <td><input type="text" name="academic" value="<?=$row['academic']?>" placeholder="N or Y"></td>
                    </tr>
                    <tr>
                        <th>평생학습계좌제평가<br> 인정여부</th>
                        <td><input type="text" name="learning_account" value="<?=$row['learning_account']?>" placeholder="N or Y"></td>
                        <th>데이터기준일자</th>
                        <td><input type="date" name="data_date" value="<?=$row['data_date']?>"></td>
                    </tr>
                    <tr>
                        <th>제공기관코드</th>
                        <td><input type="number" name="provider_code" value="<?=$row['provider_code']?>" placeholder="provider_code"></td>
                        <th>제공기관명</th>
                        <td><input type="text" name="provider_name" value="<?=$row['provider_name']?>" placeholder="provider_name"></td>
                    </tr>
                </table>
                <p><input type="submit" value="강좌수정"></p>
            </form>
        </div>
    </div>
</body>

</html>

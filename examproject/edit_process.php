<?php
include 'db_con.php';
header('Content-Type: text/html; charset=utf-8');

$filtered = array(
    'id' => mysqli_real_escape_string($link, $_POST['id']),
    'course_name' => mysqli_real_escape_string($link, $_POST['course_name']),
    'teacher_name' => mysqli_real_escape_string($link, $_POST['teacher_name']),
    'start_date' => mysqli_real_escape_string($link, $_POST['start_date']),
    'finish_date' => mysqli_real_escape_string($link, $_POST['finish_date']),
    'start_time' => mysqli_real_escape_string($link, $_POST['start_time']),
    'finish_time' => mysqli_real_escape_string($link, $_POST['finish_time']),
    'category' => mysqli_real_escape_string($link, $_POST['category']),
    'target' => mysqli_real_escape_string($link, $_POST['target']),
    'on_off' => mysqli_real_escape_string($link, $_POST['on_off']),
    'day' => mysqli_real_escape_string($link, $_POST['day']),
    'place' => mysqli_real_escape_string($link, $_POST['place']),
    'capacity' => mysqli_real_escape_string($link, $_POST['capacity']),
    'price' => mysqli_real_escape_string($link, $_POST['price']),
    'address' => mysqli_real_escape_string($link, $_POST['address']),
    'agency' => mysqli_real_escape_string($link, $_POST['agency']),
    'agency_phone' => mysqli_real_escape_string($link, $_POST['agency_phone']),
    'receipt_start' => mysqli_real_escape_string($link, $_POST['receipt_start']),
    'receipt_finish' => mysqli_real_escape_string($link, $_POST['receipt_finish']),
    'receipt_method' => mysqli_real_escape_string($link, $_POST['receipt_method']),
    'select_method' => mysqli_real_escape_string($link, $_POST['select_method']),
    'website' => mysqli_real_escape_string($link, $_POST['website']),
    'support' => mysqli_real_escape_string($link, $_POST['support']),
    'academic' => mysqli_real_escape_string($link, $_POST['academic']),
    'learning_account' => mysqli_real_escape_string($link, $_POST['learning_account']),
    'data_date' => mysqli_real_escape_string($link, $_POST['data_date']),
    'provider_code' => mysqli_real_escape_string($link, $_POST['provider_code']),
    'provider_name' => mysqli_real_escape_string($link, $_POST['provider_name'])
);

$query = "
        UPDATE learningcourse
        SET
            course_name = '{$filtered['course_name']}',
            teacher_name = '{$filtered['teacher_name']}',
            start_date = '{$filtered['start_date']}',
            finish_date = '{$filtered['finish_date']}',
            start_time = '{$filtered['start_time']}',
            finish_time = '{$filtered['finish_time']}',
            category = '{$filtered['category']}',
            target = '{$filtered['target']}',
            on_off = '{$filtered['on_off']}',
            day = '{$filtered['day']}',
            place = '{$filtered['place']}',
            price = '{$filtered['price']}',
            address = '{$filtered['address']}',
            agency = '{$filtered['agency']}',
            agency_phone = '{$filtered['agency_phone']}',
            receipt_start = '{$filtered['receipt_start']}',
            receipt_finish = '{$filtered['receipt_finish']}',
            receipt_method = '{$filtered['receipt_method']}',
            select_method = '{$filtered['select_method']}',
            website = '{$filtered['website']}',
            support = '{$filtered['support']}',
            academic = '{$filtered['academic']}',
            learning_account = '{$filtered['learning_account']}',
            data_date = '{$filtered['data_date']}',
            provider_code = '{$filtered['provider_code']}',
            provider_name = '{$filtered['provider_name']}'
          WHERE id = '{$filtered['id']}'
        ";

$result = mysqli_query($link, $query);

$prevPage = $_SERVER['HTTP_REFERER'];
	if ($result == false) {
        $del_res = '수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
        error_log(mysqli_error($link));
    } else {
        header('Location:course_detail.php?id='.$filtered[id]);
    }
 ?>

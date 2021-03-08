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
        INSERT INTO learningcourse (
            id,
            course_name,
            teacher_name,
            start_date,
            finish_date,
            start_time,
            finish_time,
            category,
            target,
            on_off,
            day,
            place,
            capacity,
            price,
            address,
            agency,
            agency_phone,
            receipt_start,
            receipt_finish,
            receipt_method,
            select_method,
            website,
            support,
            academic,
            learning_account,
            data_date,
            provider_code,
            provider_name
        ) VALUES (
            '{$filtered['id']}',
            '{$filtered['course_name']}',
            '{$filtered['teacher_name']}',
            '{$filtered['start_date']}',
            '{$filtered['finish_date']}',
            '{$filtered['start_time']}',
            '{$filtered['finish_time']}',
            '{$filtered['category']}',
            '{$filtered['target']}',
            '{$filtered['on_off']}',
            '{$filtered['day']}',
            '{$filtered['place']}',
            '{$filtered['capacity']}',
            '{$filtered['price']}',
            '{$filtered['address']}',
            '{$filtered['agency']}',
            '{$filtered['agency_phone']}',
            '{$filtered['receipt_start']}',
            '{$filtered['receipt_finish']}',
            '{$filtered['receipt_method']}',
            '{$filtered['select_method']}',
            '{$filtered['website']}',
            '{$filtered['support']}',
            '{$filtered['academic']}',
            '{$filtered['learning_account']}',
            '{$filtered['data_date']}',
            '{$filtered['provider_code']}',
            '{$filtered['provider_name']}'
        )
    ";

$result = mysqli_query($link, $query);
if ($result == false) {
    echo '저장하는 과정에서 문제가 생겼습니다.';
    error_log(mysqli_error($link));
    print_r($query);
} else {
    header('Location:course_detail.php?id='.$filtered[id]);
}
 ?>

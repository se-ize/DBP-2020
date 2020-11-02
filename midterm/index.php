<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> 매장 재고 영화 시스템 </title>
    <style>
        body { background-color: #F0DFF4; }
    </style>
</head>

<body>
    <h1>매장 재고 영화 시스템</h1>

    <form action="film_select.php" method="POST">
    (1) 영화 검색</br>
    <input type="text" name="num" placeholder="시작 film_id(1~1000)">
    <input type="text" name="strength" placeholder="몇 번까지">
    <input type="submit" value="Search">
    </form>

    <form action="category_select.php" method="POST">
    (2) 카테고리별 영화 검색<br>
            <select name="category">
            <option value="1">Action</option>
            <option value="2">Animation</option>
            <option value="3">Children</option>
            <option value="4">Classics</option>
            <option value="5">Comedy</option>
            <option value="6">Documentary</option>
            <option value="7">Drama</option>
            <option value="8">Family</option>
            <option value="9">Foreign</option>
            <option value="10">Games</option>
            <option value="11">Horror</option>
            <option value="12">Music</option>
            <option value="13">New</option>
            <option value="14">Sci-Fi</option>
            <option value="15">Sports</option>
            <option value="16">Travel</option>
            </select>
    <input type="submit" value="Search">
    </form>

    <form action="actor_select.php" method="POST">
    (3) 배우 출연 영화 검색</br>
        <input type="text" name="first_name" placeholder="first_name">
        <input type="text" name="last_name" placeholder="last_name">
        <input type="submit" value="Search">
    </form>

    <form action="return_select.php" method="POST">
    (4) 영화 대여 및 반납일 검색</br>
    <input type="text" name="id" placeholder="film_id">
    <input type="submit" value="Search">
    </form>

</body>

</html>
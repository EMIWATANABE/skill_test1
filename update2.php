<?php

    $dsn = 'mysql:dbname=skilltest1;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->query('SET NAMES utf8');

    $date = htmlspecialchars($_POST['date']);
    $title = htmlspecialchars($_POST['title']);
    $detail = htmlspecialchars($_POST['detail']);
    $id = htmlspecialchars($_POST['id']);

    $sql = 'UPDATE `tasks` SET `date` = ?, `title` = ?, `detail` = ? WHERE `id` = ? ';
    $data[] = $date;
    $data[] = $title;
    $data[] = $detail;
    $data[] = $id;

    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    //データベースを切断
    $dbh = null;

    header("Location: schedule.php");
    exit();

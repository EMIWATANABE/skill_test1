<?php

    //削除する処理

    //データベースに接続
    $dsn = 'mysql:dbname=skilltest1;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->query('SET NAMES utf8');

    $id = $_GET['id'];

    $sql = 'DELETE FROM `tasks` WHERE `id` = ?';
    $data[] = $_GET['id'];

    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    //データベースを切断
    $dbh = null;

    //リダイレクト
    header("Location: schedule.php");
    exit();
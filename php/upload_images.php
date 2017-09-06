<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-Type: text/json; charset=UTF-8");
//define('SITE_ROOT', realpath(dirname(__FILE__)));
$filename = date('Ymdhis') . rand(100, 1000)
        . '.' . pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);
$upfile = $_SERVER['DOCUMENT_ROOT'] . '/uploads/images/'
        . $filename;
if (is_uploaded_file($_FILES['images']['tmp_name'])) {
    if (!move_uploaded_file($_FILES['images']['tmp_name'], $upfile)) {
        echo json_encode(array('code' => 1, 'msg' => '无法移动'));
    } else {
        echo json_encode(array(
            'code' => 0,
            'msg' => '上传成功',
            'picUrl' => 'http://' . $_SERVER['HTTP_HOST'] . '/uploads/images/' . $filename));
    }
} else {
    echo json_encode(array('code' => 2, 'msg' => '上传失败'));
}

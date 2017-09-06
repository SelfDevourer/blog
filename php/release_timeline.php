<?php

header("Content-Type: text/json; charset=UTF-8");
$content = $_POST['content'];
$db = new mysqli("127.0.0.1", "SelfDevourer", "c5xQc68dGeF3iXONZDZT", "selfdevourer_blog");
if (mysqli_connect_errno()) {
    echo json_encode(array('code' => -1, 'msg' => '数据库连接异常'));
    exit;
}
$insert = 'insert into timeline(content, create_day) values("' . $content . '", date_format(now(), "%Y %m %e"));';
$insert_result = $db->real_query($insert);
if ($insert_result) {
    echo json_encode(array('code' => 0, 'msg' => '发布成功'));
} else {
    echo json_encode(array('code' => 1, 'msg' => '发布失败'));
}
if (isset($_POST['images'])) {
    $images = $_POST['images'];
    $id = $db->insert_id;
    foreach ($images as $image) {
        $insert_images = 'insert into timeline_images(url, t_id) values("' . $image . '", ' . $id . ')';
        $insert_images_result = $db->real_query($insert_images);
    }
}

//$select = 'select * from timeline;';
//$select_result = $db->query($select);
//$num_result = $select_result->num_rows;
//for ($i = 0; $i < $num_result; $i++) {
//    $row = $select_result->fetch_assoc();
//    echo stripcslashes($row['content']);
//}
?>
<?php
include_once "db.php";
// dd($_POST);
// exit();
foreach ($_POST['id'] as $idx => $id) {
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        // $del = $Poster->find($id)['img'];
        // unlink("../img/{$del}");
        $Poster->del($id);
    } else {
        $poster = $Poster->find($id);
        if (isset($_POST['sh']) && in_array($id, $_POST['sh'])) {
            $poster['sh'] = 1;
        } else {
            $poster['sh'] = 0;
        }
        $poster['text'] = $_POST['text'][$idx];
        $poster['ani'] = $_POST['ani'][$idx];
        $Poster->save($poster);
    }
}
to('../back.php?do=poster');

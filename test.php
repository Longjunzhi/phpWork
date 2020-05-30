<?php
include './db.php';
$condition=[
    good_id=>'1'
];
$data=[
    good_name=>'连衣qun',
    good_prize=>'90'
];
$r= db::updateTable('goods',$condition,$data);
var_dump ($r);

?>
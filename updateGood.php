<?php
include './db.php';

if($_POST){
  if($_POST['g_id']==""){
    echo "出错";
    die;
}
$condition=[
    "good_id"=>$_POST['g_id']
];
if($_POST['g_name']!=""){
    $data=array();
    $data=[
        "good_name"=>$_POST['g_name'],
        "good_prize"=>$_POST['g_prize']
    ];
    if (db::updateTable('goods',$condition,$data)==true){
        echo "更改商品成功！";
    }else{
        echo "更改商品失败！！！";
    }
}

$g_info =db::getTable("goods",$condition);
}
?>

<html>
<title>
更改商品
</title>
<body>
    <form method="post" action="">
    <table>
        <input hidden  type="text" name="g_id" value="<?php echo $_POST['g_id']?>">
        <?php foreach($g_info as $val){ ?>
             
                 <label>商品名字:
                 <input  type="text" name="g_name" value="<?php echo $val['good_name']?>">
                 </label><br />
                 <label>商品价格:
                 <input  type="text" name="g_prize" value="<?php echo $val['good_prize']?>">
                 </label><br />
              <?php }  ?>
    <tr>
    <td>
    <button type="submit">更改</button>
    </td>
    </tr>
    </table>
    </form>

</body>
</html>
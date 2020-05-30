<?php
include './db.php';
$rows =db::getTable("good_status");

if($_POST){
  if($_POST['s_id']==0 || $_POST['g_name']==''||$_POST['g_prize']==''){
    echo "名字价格为空或没选择状态";
    die;
}
$data=array();
$data=[
    "good_name"=>$_POST['g_name'],
    "good_prize"=>$_POST['g_prize'],
    "good_status_id"=>$_POST['s_id']
];

  if (db::add('goods',$data)==true){
      echo "添加商品成功！";
  }else{
      echo "添加商品失败！！！";
  }
}
?>


<html>
<title>
添加商品
</title>
<body>
    <form method="post" action="">
    <table>
    <tr>
        <td>
        商品名称:
        </td>
        <td><input type="text" name="g_name"></td>
    </tr>
    <tr>
        <td>
        商品价格:
        </td>
        <td><input type="number" name="g_prize"></td>
    </tr>
    <tr>
        <td>
        商品状态:
        </td>
        <td>
        <select name="s_id">
        <option value="0">请选择</option>
        <?php foreach($rows as $v){ ?>
        <option value="<?php echo $v['good_status_id'];?>"><?php echo $v['good_status_name'];?></option>
        <?php }?>
        </select>
        </td>
    </tr>
    <tr>
    <td></td>
    <td>
    <button type="submit">添加</button>
    </td>
    </tr>
    </table>
    </form>

</body>
</html>
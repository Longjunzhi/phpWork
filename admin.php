<html>
<title>服饰后台管理</title>
<body>
<?php
include './db.php';
/**
 * author:pang
 * time:2020.05.29
 * param:
 * 连接数据库
 * 查询数据库的商品信息显示
 * 增加新的商品
 * 修改商品信息
 * 删除商品
 */
    $rows =db::getTable("users");
    foreach($rows as $val){
         echo "name:".$val['user_name'].'---'.$val['user_number'];
         echo '<br />';
         }

?>
<button>增加新的商品</button>
    <ul>
        <li>
            <label ><?php  ?></label>
        </li>
        <li>
            <label>商品id:1</label><br />
            <label>商品名字:天使上衣</label><br />
            <label>商品价格:59.9</label><br />
            <label>商品状态:正常</label><br />
            <button>修改</button><button>删除</button></li><br />
        <li>
            <label>商品id:2</label> <br />
            <label>商品名字:阿尼克上衣</label> <br />
            <label>商品价格:29.9</label> <br />
            <label>商品价格:正常</label><br />
            <button>修改</button><button>删除</button></li><br />
    </ul>
</body>
</html>
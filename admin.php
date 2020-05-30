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
     $rows =db::getTable("goods_info_view",null);

?>
<ul>
    <li>
        <a href="addGoods.php">
            <button>增加新的商品</button>   
        </a>
    </li>
</ul>
    <ul>
 
         <?php foreach($rows as $val){ ?>
        <li>
            <label>商品id:<?php echo $val['g_id']?></label><br />
            <label>商品名字:<?php echo $val['商品名']?></label><br />
            <label>商品价格:<?php echo $val['价格']?></label><br />
            <label>商品状态:<?php echo $val['状态']?></label><br />
            <button>修改</button><button>下架</button><br />
        </li>
         <?php }  ?>
    </ul>
    <script>
    
    </script>
</body>

</html>
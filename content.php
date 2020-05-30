<?php
include 'db.php';
/**
 * author:pang
 * time:2020.05.30
 * param:
 * 主页面
 * 游览商品
 * 注册/登录功能
 * 加入购物车
 * 查看购物车
 * 购买商品
 * 查看订单
 * 
 */
$condition=[
    's_id'=>'1'
];
$rows =db::getTable("goods_info_view",$condition);
?>
<html>
<title>
首页
</title>
<body>
    <ul>
        <li>
            <input name='key_words' type="text">
                <button>搜索</button> 
                <a href="register.php"><button>注册</button></a>  
                <a href="login.php"><button>登录</button></a>  
        </li>
    </ul>
    <ul>
         <?php foreach($rows as $val){ ?>
        <li>
            <label>商品id:<?php echo $val['g_id']?></label><br />
            <label>商品名字:<?php echo $val['商品名']?></label><br />
            <label>商品价格:<?php echo $val['价格']?></label><br />
            <label>商品数量:- 0 +</label><br />
            <button>加入购物车</button><button>立即购买</button><br />
        </li>
         <?php }  ?>
    </ul>
</body>
</html>
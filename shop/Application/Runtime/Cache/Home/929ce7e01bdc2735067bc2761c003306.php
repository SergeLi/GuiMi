<?php if (!defined('THINK_PATH')) exit();?>    <html lang="zh-CN">
    <head>
    
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta charset="utf-8">
        <meta http-equiv="Cache-Control" content="no-siteapp">
        <title><?php echo ($seoInfo['title']); ?></title>
        <meta name="keywords" content="<?php echo ($seoInfo['keywords']); ?>">
        <meta name="description" content="<?php echo ($seoInfo['description']); ?>">
        <link href="/Public/Home/css/iconfont/iconfont.css" rel="stylesheet"/>
        <link href="/Public/Home/css/common.css" rel="stylesheet"/>
        <link href="/Public/Home/css/home.css" rel="stylesheet"/>
        <link href="/Public/Home/css/iconfont/iconfont.css" rel="stylesheet"/>
        <link href="/Public/Home/css/common.css" rel="stylesheet"/>
        <link href="/Public/Home/css/uc.css" rel="stylesheet"/>
        <link href="/Public/Home/css/goods-detail.css" rel="stylesheet"/>
        <!-- 外部样式用于头部 -->
        <link href="/Public/Home/css/topbar.css" rel="stylesheet"/>
        <link href="/Public/Home/css/cart.css" rel="stylesheet"/>
        <!-- 外部样式用于导航栏 -->
        <link href="/Public/Chat/css/home-chat.css" rel="stylesheet"/>
        

    
 
    </head>
    <body>

        <!--头部--> 
    <div id="M_PC_top_nav">
        <div id="M_PC_top_nav_container">
            <div class="inner"> 
                <ul> 
                    <li class="go-home"> 
                        <a href="<?php echo U('Index/index');?>"> 
                            <em class="home">
                            </em>首页
                        </a> 
                    </li> 
                    <?php if(!empty(session('userinfo'))): ?><li class="drop"> 
                        <a href="<?php echo U('User/index');?>" class="nick"> 
                            <!-- 小头像 -->
                            <?php if(empty(session('userinfo.qq_openid'))): ?><img class="face" src="/Uploads<?php echo session('userinfo.user_img');?>">
                            <?php echo session('userinfo.username');?>
                            <?php else: ?>
                            <img class="face" src="<?php echo session('userinfo.user_img');?>">
                            <?php echo session('userinfo.nikname'); endif; ?>
                            <em class="arrow">
                            </em> 
                        </a> 
                        <ul class="down account"> 
                            <li> 
                                <a href="<?php echo U('User/index');?>" target="_blank" style="min-width: 80px;"> 个人中心 </a> 
                            </li> 
                            <li>
                                <!-- 退出登录 -->
                                <a href="<?php echo U('Login/logout');?>"> 退出 </a>
                            </li> 
                        </ul> 
                    </li> 
                    <li class="drop"> 
                        <a href="<?php echo U('User/favorite');?>" target="_blank"> 
                            <em class="collect">
                            </em>我的收藏 
                        </a> 
                    </li>
                    <?php else: ?>
                    <li> <a href="#"><em class="weixin"></em>微信登录</a> </li>
                    <li> <a href="<?php echo U('QQLogin/qqLogin');?>"> <em class="qq"></em>QQ登录</a> </li>
                    <li> <a href="<?php echo U('Login/index');?>">登录</a> </li>
                    <li> <a href="<?php echo U('Register/index');?>">注册</a> </li><?php endif; ?>  
                    <li class="drop cart-wrapper"> 
                        <a target="_blank" href="<?php echo U('Cart/index');?>" class="my-cart"> 
                            <em class="cart">
                            </em>我的购物车  
                            <!-- 下面是提示购物车件数 空的时候不输出 -->
                            <?php if($total != '0' and $total != ''): ?><span class="cart-num"><?php echo ($total); ?></span><?php endif; ?>
                        </a>  
                        <?php if(CONTROLLER_NAME != Cart): ?><!-- 这里是购物车显示的部分 -->
                        <div class="down"> 
                            <?php if($total != '0' and $total != ''): ?><ul class="cart-goods">
                                <?php if(is_array($top_cartinfo)): foreach($top_cartinfo as $key=>$top_cart): ?><li> 
                                    <a href="<?php echo U('Home/Goods/index/id/'.$top_cart['gid']);?>" target="_blank" style="padding: 0; float: left;"> 
                                        <span class="cart-goods-img" style="background-image: url(/Uploads<?php echo $top_cart['colorpic'];?>);width: 53px;height: 53px;">
                                        </span> 
                                    </a> 
                                    <div class="cart-goods-desc"> 
                                        <p> 
                                            <a href="<?php echo U('Home/Goods/index/id/'.$top_cart['gid']);?>" target="_blank" style="padding: 0; float: left;"> 
                                                <span class="cart-goods-title"><?php echo ($top_cart['gname']); ?></span> 
                                            </a> 
                                            <span class="cart-goods-price" style="line-height: 30px">￥<?php echo ($top_cart['price']); ?> </span> 
                                        </p> 
                                        <p class="cart-goods-info"> 
                                            <span class="cart-goods-title">  
                                                <span>颜色:<?php echo ($top_cart['color']); ?> </span> &nbsp;&nbsp;  
                                                <span>尺码:<?php echo ($top_cart['size']); ?> </span> &nbsp;&nbsp;  
                                                <!-- <span>数量:<?php echo ($top_cart['num']); ?> </span> &nbsp;&nbsp;   -->
                                            </span> 
                                            <span style="color: black" class="del-cart-goods" data-stock="1weod5s">　x<?php echo ($top_cart['num']); ?></span> 
                                            <!-- <em class="del-cart-goods" data-stock="1weod5s"></em> -->
                                        </p> 
                                    </div>
                                </li><?php endforeach; endif; ?>
                            </ul> 
                            <p class="cart-account"> 
                                <span>购物车里还有
                                    <a class="num" href="<?php echo U('cart/index');?>" target="_blank"> <?php echo ($total); ?> </a>件商品
                                </span> 
                                <a class="check-cart" href="<?php echo U('cart/index');?>" target="_blank" data-ptp-cache-id="1.XLXCOb.0.0.gQlG3wL">查看购物车</a>
                            </p> 
                            <?php else: ?>
                                <!-- 购物车空的时候输出 -->
                                <div class="cart-goods shop_cart_info empty_cart" style="width: 180px;">购物车里没有商品！</div><?php endif; ?>
                            
                        </div><?php endif; ?>
                    </li> 
                    <li> 
                        <a href="<?php echo U('Order/allOrder');?>" target="_blank" data-ptp-cache-id="1.zfrD1b.0.0.B6rzP"> 
                            <em class="order">
                            </em>我的订单
                        </a>
                    </li> 
                        <li class="drop"> 
                            <a target="_blank">帮助中心
                            </a> 
                        </li> 
                        <li>
                            <a href="<?php echo U('Message/index');?>"  class="last">邮件信息<span id='email'><?=strtolower(CONTROLLER_NAME)=='message'?'':$num?></span></a>
                        </li> 
                    </ul> 
                </div>
            </div>
        </div>
    <!--头部结束-->

    
    
            <div class="header-wrap">
            <div class="header wrapper">
                <a href="<?php echo U('Index/index');?>" class="logo">
                    <!-- <img src="/Public/Home/img/logo3.png" alt="" /> -->
                    <img src="/Uploads<?php echo ($seoInfo['logopic']); ?>" style='width: 200px;height: 70px;' alt="" />
                </a>
            <!-- 讯搜 -->
            <div class="header-schbox">
                <div class="inner clearfix">
                <form action="<?php echo U('List/index');?>" method="get">
                    <div class="search-switch">
                        <i class="arrow"></i>
                        <div class="item">商品</div>
                    </div>
                    <input value="<?php echo str_replace('+', ' ', $_GET['marke']);?>" name="marke" class="search-txt" placeholder="搜流行宝贝">
                    <button class="search-btn"></button>
                    <div class="suggest-box">
                        <div class="item" data-title="上衣 短款 短袖">上衣 短款 短袖<div class="tags"><span>雪纺</span><span>蕾丝</span><span>一字领</span></div></div>
                    </div>
                </form>
                </div>
                <div class="hot-words">
                    <?php
 Vendor('XunSearch.lib.XS'); $xs= new \XS('goods'); $search = $xs->search; $hostwords = $search->getHotQuery(); foreach ($hostwords as $k=>$v) { ?>
                        <a href="/Home/List/index/marke/<?=$k?>.html"><?=$k?></a>
                    <?php }?>
                </div>
            </div>
            <!-- 定位结束 -->



                <div class="contact">
                    <div class="item">
                        <span class="ico iconfont">&#xe61b;</span>
                        <span class="tel">400-000-0000</span>
                    </div>
                    <div class="item" style='position:relative'>
                         <span class="ico iconfont" id='online'>&#xe61d;</span><a class="kefu">在线客服</a>
                         <?php if(session("?userinfo")): ?><!-- 在线聊天界面 -->
                         <div  class='chatbox'>
                            <div id="container">
                                <div class="header">
                                    <span style="float: left;">客服</span>
                                    <span style="float: right;" id='closebox'>X </span>
                                </div>
                                <ul class="content">
                                </ul>
                                <div class="footer">
                                    <div id="user_face_icon">
                                        <img src="http://www.xttblog.com/icons/favicon.ico" alt="">
                                    </div>
                                    <input id="text" type="text" placeholder="说点什么吧...">
                                    <span id="btn" style='color:white;font-size:14px;'>发送</span>
                                </div>
                            </div>  
                         </div><?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="nav-box">
            <div class="nav wrapper" style='position:relative;'>
    <div class='my-bar'>
            <div class="slogan" style='text-align:center;font-size:16px;color:white;'>全部分类</div>
        <div class="side-category" style="display: block;position:absolute;top:40px;width:213px;left:0px;opacity:0.9;display:none;z-index:100px;">
            
            <div class="side-category-bd">
            <?php if(is_array($bar)): foreach($bar as $k=>$v): ?><div class="f-item" onmouseenter='getMsg($(this),<?php echo ($k); ?>)'>
                    <div class="f-box">
                        <div class="f-tit"> <a href="<?php echo U('List/index',['tid'=>$k]);?>"><?php echo ($v['name']); ?></a></div>
                        <div class="f-list">
                        <?php if(is_array($v["child"])): foreach($v["child"] as $k1=>$v1): ?><a href="<?php echo U('List/index',['tid'=>$k1]);?>"><?php echo ($v1); ?></a><?php endforeach; endif; ?>
                        </div>
                    </div>
                    <div class="c-box" style=' display:none;'>
                        <div class="hd">分类</div>
                        <div class="bd">
                            <div class="list-wrap">
                            </div>
                        </div>
                  <!--       <div class="ft">
                            <a href=""><img class="ad" src="/Public/Home/uploads/10.jpg" /></a>
                        </div> -->
                    </div>
                </div><?php endforeach; endif; ?>
               
             
            </div>

        </div>

    </div>
                <ul class="nav-ul">
                    <li><a href="<?php echo U('Index/index');?>">首页</a></li>
                    <li><a href="<?php echo U('List/index', ['tid'=>16]);?>">女装馆</a></li>
                    <li><a href="<?php echo U('List/index', ['tid'=>77]);?>">男装城</a></li>
                    <li><a href="">新品首发</a></li>
                </ul>
                <div class="nav-ad"><a class="ad" href=""><img src="/Public/Home/uploads/nav-ad.jpg" alt="" /></a></div>
           
        </div>
        </div>
        <!--头部-->


    
    
    <div class="wrapper uc-router">
        <ul>
            <li><a href="">首页</a></li>
            <li><span class="divider"></span></li>
            <li><span>个人中心</span></li>
        </ul>
    </div> 

    <div class="wrapper">
        <div class="uc-main clearfix">
            <div class="uc-aside">
                <div class="uc-menu">
                    <div class="tit">订单中心</div>
                    <ul class="sublist">
                        <li><a href="<?php echo U('Order/allOrder');?>">我的订单</a></li>
                        <li><a href="<?php echo U('User/favorite');?>">我的收藏</a></li>
                        <li><a href="<?php echo U('History/index');?>">浏览历史</a></li>
                    </ul>
                    <div class="tit">客户服务</div>
                    <ul class="sublist">
                        <li><a href="<?php echo U('Order/comeBackInfo');?>">退货中心</a></li>
                    </ul>
                    <div class="tit">账户中心</div>
                    <ul class="sublist">
                        <li><a href="<?php echo U('User/userInfo');?>">账户信息</a></li>
                        <li><a href="<?php echo U('User/safe');?>">账户安全</a></li>
                        <li><a href="<?php echo U('Address/index');?>">收货地址</a></li>
                    </ul>
                    <div class="tit">消息中心</div>
                    <ul class="sublist">
                        <li><a href="<?php echo U('Order/waitEvaluate');?>">商品评价</a></li>
                        <li><a href="<?php echo U('Message/index');?>">站内消息</a></li>
                    </ul>
                </div>
            </div>
            <div class="uc-content">
                <div class="uc-panel">
                    <div class="uc-bigtit">收货地址</div>
                    <div class="uc-panel-bd">

                            <!-- <div class="ui-msg-info ui-msg-block">您已创建 2 个收货地址，最多可创建 5 个</div> -->

                            <div class="address-list">
                                <div class="col col-4">
                                    <a class="item va-m-box ta-c add">
                                        <div class="add-new">
                                            <span class="ico"><i class="iconfont icon-tianjia"></i></span>
                                            <div class="label">添加收货地址</div>
                                        </div>
                                    </a>
                                </div>
                                <?php if(is_array($addressList)): foreach($addressList as $key=>$v): ?><div class="col col-4 lz-div">
                                        <div class="item <?php echo ($v['state'] == 2 ? 'active': ''); ?>">
                                            <div class="action">
                                                <div class="fl">
                                                    <a class="edit" val="<?php echo ($v['id']); ?>" href="javascript:;">修改</a>
                                                    <a val="<?php echo ($v['id']); ?>"  class="del lz-del" href="javascript:;">删除</a></div>
                                                <div class="fr"><a class="setdft lz-default" href="javascript:;">设为默认</a></div>

                                            </div>
                                            <div class="info">
                                                <div class="info-item name ellipsis"><?php echo ($v['area']); ?>（<?php echo ($v['name']); ?> 收）</div>
                                                <div class="info-item address"><?php echo ($v['address']); ?></div>
                                                <div class="info-item tel ellipsis"><?php echo ($v['phone']); ?></div>
                                            </div>
                                        </div>
                                    </div><?php endforeach; endif; ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="bg-body" style="display: none"> </div>
    <div id="addressform" style="display:none" class="layer-address">
        <form class="lz-form" action="" method="post">
            <div>
                <input class="hid" type="hidden" name="">
            </div>
            <div class="control-group">
                <div class="hd">
                    收货人姓名：
                </div>
                <div class="bd">
                    <input class="ui-txtin ui-txtin-thin lz-name" style="width: 200px;" type="text" name="name" id="">
                </div>
            </div>
            <div class="control-group">
                <div class="hd">
                    联系电话：
                </div>
                <div class="bd">
                    <input class="ui-txtin ui-txtin-thin lz-phone" style="width: 200px;" type="text" name="phone" id="">
                </div>
            </div>
            <div class="control-group">
                <div class="hd">
                    所在地区：
                </div>
                <div class="bd">
                    <select class="ui-txtin ui-txtin-thin" id="lz-sf" style="width: 133px;"  name="sf">
                        <option value="">选择省</option>
                        <?php if(is_array($list)): foreach($list as $key=>$v): ?><option value="<?php echo ($v['id']); ?>">--<?php echo ($v['area_name']); ?>--</option><?php endforeach; endif; ?>
                    </select>
                    <select class="ui-txtin ui-txtin-thin" id="lz-city" style="width: 133px;" name="city">
                        <option value="">选择市</option>
                    </select>
                    <select class="ui-txtin ui-txtin-thin" id="lz-area" style="width: 133px;" name="area">
                        <option value="">选择区</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <div class="hd">
                    详细地址：
                </div>
                <div class="bd">
                    <input class="ui-txtin ui-txtin-thin lz-address" style="width: 500px;" type="text" name="address" id="" placeholder="请填写具体地址，不需要重复填写省/市/区">
                </div>
            </div>
            <div class="control-group">
                <div class="hd">
                    邮政编码：
                </div>
                <div class="bd">
                    <input class="ui-txtin ui-txtin-thin lz-code" style="width: 200px;" type="text" name="code" id="">
                </div>
            </div>
            <div class="control-bottom clearfix">
                <button class="fl btn ui-btn-theme">保存</button><a href="" class="fr btn ui-btn cancle">取消</a>
            </div>
        </form>
    </div>


    
         <!--脚部-->
        <div class="fatfooter">
            <div class="wrapper">
                <div class="fatft-service">
                    <div class="item">
                        <a href="">
                            <img src="/Public/Home/img/ico/ft-ser1.png" alt="" class="ico" />
                            <span>品质保障</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <img src="/Public/Home/img/ico/ft-ser2.png" alt="" class="ico" />
                            <span>七天无理由退换货</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <img src="/Public/Home/img/ico/ft-ser3.png" alt="" class="ico" />
                            <span>特色服务体验</span>
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <img src="/Public/Home/img/ico/ft-ser4.png" alt="" class="ico" />
                            <span>帮助中心</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="fatft-links">
                <div class="wrapper">
                    <div class="col-link">
                        <div class="tit">购物指南</div>
                        <div class="link"><a href="">购物流程</a></div>
                        <div class="link"><a href="">账户安全</a></div>
                        <div class="link"><a href="">联系客服</a></div>
                        <div class="link"><a href="">会员介绍</a></div>
                    </div>
                    <div class="col-link">
                        <div class="tit">配送方式</div>
                        <div class="link"><a href="">配送服务查询上</a></div>
                        <div class="link"><a href="">门自提</a></div>
                        <div class="link"><a href="">物流费用标准</a></div>
                    </div>
                    <div class="col-link">
                        <div class="tit">支付方式</div>
                        <div class="link"><a href="">银联支付</a></div>
                        <div class="link"><a href="">支付宝支付</a></div>
                        <div class="link"><a href="">微信支付</a></div>
                    </div>
                    <div class="col-link">
                        <div class="tit">售后服务</div>
                        <div class="link"><a href="">售后政策</a></div>
                        <div class="link"><a href="">价格保护</a></div>
                        <div class="link"><a href="">退单说明</a></div>
                        <div class="link"><a href="">取消订单</a></div>
                    </div>
                    <div class="col-link">
                        <div class="tit">联系我们</div>
                        <div class="link"><a href="">商家入驻</a></div>
                        <div class="link"><a href="">营销服务</a></div>
                        <div class="link"><a href="">关于我们</a></div>
                        <div class="link"><a href="">广告服务</a></div>
                    </div>
                    <div class="col-contact">
                        <div class="phone">400-889-8188</div>
                        <div class="time">周一至周日 8:00-18:00 <br />（仅收市话费）</div>

                    </div>
                </div>
            </div>
            <div style='margin: 0 auto;width:800px;'>
                <?php if(is_array($link)): foreach($link as $k=>$v): ?><a href='<?php echo ($v["toUrl"]); ?>'><img src='<?php echo ($v["img"]); ?>'></a><?php endforeach; endif; ?>
            </div>
        </div>
        <div class="footer">
            <div>安徽XXX网络科技有限公司 版权所有 Copyright © 2016-2018   备案号：皖ICP备123456789</div>
        </div>


        <!--脚部-->
    
       
    </body>
    <script src="/Public/Home/js/jquery.js"></script>
    <link rel="stylesheet" href="/Public/Home/js/slick/slick.css"/>
    <script src="/Public/Home/js/slick/slick.min.js"></script>
    <script src="/Public/Home/js/global.js"></script>

    <script>
        $('.home-full-banner').slick({
            autoplay: true,
            autoplaySpeed: 5000,
            arrows: false,
            dots: true,
            fade: true
          });


        +function () {
     
            a = 0;
            $('.my-bar').on('mouseenter',function () {
            
                //控制导航显示
            if (a == 0)   {   
                $('.side-category').css({'z-index':10000});
                $('.side-category').slideDown(300,function(){
                    a = 1;       
                    b = 0;
                });
            }
            })
        }();

        +function () {
            b = 0
            $('.my-bar').on('mouseleave',function () {
          
                //控制导航显示
                if (b == 0) {
                    $('.side-category').slideUp(300,function(){

                        b = 1;
                        a = 0;
                    });
                }
                
            });
        }();
       
     

         zAction.add({
            'category-toggle':function () {
                if ($(this).hasClass('on')) {
                    $(this).removeClass('on').prev().slideDown(200);
                }
                else {
                    $(this).addClass('on').prev().slideUp(200);
                }
            },

        });
   

    </script>
    <script src="/Public/Home/js/jquery.js"></script>
    <link rel="stylesheet" href="/Public/Home/js/icheck/style.css"/>
    <script src="/Public/Home/js/icheck/icheck.min.js"></script>
    <script src="/Public/Home/js/laydate/laydate.js"></script>
    <script src="/Public/Home/js/global.js"></script>
    <script type="text/javascript" src="/Public/Chat/js/swfobject.js"></script>
    <script type="text/javascript" src="/Public/Chat/js/web_socket.js"></script>
    <script type="text/javascript" src="/Public/Chat/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Chat/js/jquery-sinaEmotion-2.1.0.min.js">
    </script>
    <script type="text/javascript" src="/Public/Chat/js/chat-home.js">
    </script>
    
<script src="/Public/Home/js/layer/layer.js"></script>
<script>
var heigh= $(document).height();
$('.address-list .add').click(function() {
    $('.lz-name').attr('value', '');
    $('.lz-code').attr('value', '');
    $('.lz-address').attr('value', '');
    $('.lz-phone').attr('value', '');
    $('.lz-form').attr('action', '');
    show(); 
});
$('.clearfix .cancle').click(function() {
    $("#addressform").css({'display':'none'});
    $("#bg-body").css({'display':'none'});
    return false;
});

$('.lz-del').click(function() {
    var val = $('.lz-del').attr('val');
    var fd = $(this).parent().parent().parent();
    console.log(val);
    $.ajax({
        url:"<?php echo U('Address/del');?>",
        data:'id='+val,
        type:'get',
        success:function (res) {
            if (res !== 0) {
                window.location.reload();
            }
        }
    });
});

$('.lz-default').click(function() {
    var val = $(this).parent().prev().children('.lz-del').attr('val');
    $.ajax({
        url:"<?php echo U('Address/setDefault');?>",
        data:'id='+val,
        type:'get',
        success:function (res) {
            console.log(res);
            if (res !== 0) {
                window.location.reload();
            }
        }
    });
});

$('.address-list .fl .edit').click(function() {
    var val = $(this).attr('val');
    $('#addressform .lz-form .hid').attr('name','id');
    $('#addressform .lz-form .hid').attr('value',val);
    // 需要ajax去添加表单信息
    $.ajax({
        url:"<?php echo U('Address/getAddressInfo');?>",
        data:'id='+val,
        type:'post',
        async:false,
        success:function(res){
            if (res !== 0) {

                $('.lz-name').attr('value', res.name);
                $('.lz-code').attr('value', res.code);
                $('.lz-address').attr('value', res.address);
                $('.lz-phone').attr('value', res.phone);
                $('.lz-form').attr('action', "<?php echo U('Address/edit');?>");

            }
        }
    });
    show(); 
});
function show() {
    $("#addressform").css({
        'width':650,
    'height':350,
    'background-color':'#FFf',   
    'margin': 'auto',
    'position': 'absolute',
    'z-index':9999999999,
    'top': 300,
    'bottom': 0,

    'left': 0,
    'right': 0,
    'display':'block',
    });
    $('#bg-body').css({
        'width':'100%',
    'height':heigh,
    'background-color':'#000',
    'position':'absolute',
    'top':0,
    'left':0,
    'z-index':999999999,
    'opacity':0.3,
    'display':'block',
    });
}

 
    $('#addressform #lz-sf').change(function(){
        var val = $(this).val();
        console.log(val);
        $('#addressform #lz-city').empty();
        $('#addressform #lz-city').append('<option value="">选择市</option>');
        $('#addressform #lz-area').empty();
        $('#addressform #lz-area').append('<option value="">选择区</option>');
       $('#addressform #lz-city').length=1;
       $.ajax({
            url:"<?php echo U('User/getArea');?>",
            type:'get',
            data:'id='+val,
            success:function(res){
                var data = JSON.parse(res);
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    $('#addressform #lz-city').append('<option value="'+data[i].id+'">'+data[i].area_name+'</option>');
                }
            }
        });
    });

    $('#addressform #lz-city').change(function(){
        console.log($(this));
        var val = $(this).val();
        console.log(val);
        $('#addressform #lz-area').empty();
        $('#addressform #lz-area').append('<option value="">选择区</option>');
       $('#addressform #lz-area').length=1;
       $.ajax({
            url:"<?php echo U('User/getArea');?>",
            post:'get',
            data:'id='+val,
            success:function(res){
                var data = JSON.parse(res);
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    $('#addressform #lz-area').append('<option value="'+data[i].id+'">'+data[i].area_name+'</option>');
                }
            }
        });
    });

</script>

    </html>
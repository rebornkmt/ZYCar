<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><meta http-equiv="content-type" content="text/html;charset=utf-8">
<title><?php echo ($meta_title); ?>_<?php echo C('WEB_SITE_TITLE');?></title>
<head>
<link href="/yershop2/Public/Home/css/top.css" rel="stylesheet">
<link href="/yershop2/Public/Home/css/common.css" rel="stylesheet">
<link href="/yershop2/Public/Home/css/tuan.css" rel="stylesheet">
<link href="/yershop2/Public/Home/css/footer.css" rel="stylesheet">

<script type="text/javascript" src="/yershop2/Public/Home/js/public.js"></script>
<script type="text/javascript" src="/yershop2/Public/Home/js/jquery.min.js"></script>
</head>
<body>
<!-- 工具条 -->
	<!-- 顶部工具条 --><div class="top"><div class="topbar">      <span class="welcome" style="float:left"><a href="javascript:void(0);" onclick="SetHome(this,'<?php echo get_index_url();?>')">设为首页</a>		<a href="javascript:void(0);" onclick="AddFavorite('<?php echo C('SITENAME');?>',location.href)" title="<?php echo C('SITENAME');?>">收藏本站</a>		</span>   	<span class="welcome" style="float:left">		<a href="javascript:void(0);" onclick="AddFavorite('<?php echo C('SITENAME');?>',location.href)" title="<?php echo C('SITENAME');?>"><?php echo session("user_area");; ?></a>		</span>  	  <div class="topaccount">	 <span class="operate_nav"> 			<span  id="userfavor"><a rel="nofollow" ><i></i>我的收藏&nbsp;<b></b></a> </span>			<ul id="favormenu" class="top_lg_info_down" style="display:none;"> <li><a rel="nofollow" href="<?php echo U('center/collect');?>">收藏的商品</a></li></ul> </span>  <span class="operate_nav">			<span  id="account"><a rel="nofollow" >我的账号&nbsp;</a><i id="icount" class="fa fa-angle-down"></i> </span>			<ul id="dbox" class="top_lg_info_down" style="display:none;"> <li><a rel="nofollow" href="<?php echo U('center/index');?>">个人中心</a></li> <li><a rel="nofollow" href="<?php echo U('account/security');?>">账号安全</a></li> <li><a rel="nofollow" href="<?php echo U('center/coupon');?>">优惠券</a></li><li><a rel="nofollow" href="<?php echo U('center/comment');?>">我的评论</a></li> <?php if(is_login()): ?><li><a rel="nofollow" href=":U('User/profile')}">修改密码</a></li><?php else: endif; ?></ul>		    	|</span>		  <span class="operate_nav"> 			<span  id="sell"><a rel="nofollow" >我的订单&nbsp;<b></b></a> </span>			<ul id="sellmenu" class="top_lg_info_down" style="display:none;"> <li><a rel="nofollow" href="<?php echo U('center/allorder');?>">所有订单</a></li> <li><a rel="nofollow" href="<?php echo U('center/needpay');?>">待支付订单</a></li> <li><a rel="nofollow" href="<?php echo U('shop/tobeshipped');?>">待发货订单</a></li><li><a rel="nofollow" href="<?php echo U('shop/tobeconfirmed');?>">待确认订单</a></li></ul>		  |</span><span class="operate_nav" >	 欢迎光临<?php echo C('SITENAME');?> <?php if(is_login()): ?><a href="" class="red"><?php echo get_username();?></a>,<a rel="nofollow" href="<?php echo U('User/logout');?>">退出</a><?php else: ?> ,请<a href="<?php echo U('User/login');?>" >[登录]</a>&nbsp;<a href="<?php echo U('User/register');?>" style="padding-left:0;padding-right:10px"> [免费注册] </a><?php endif; ?>		|</span>  <span class="operate_nav" >	  </span> </div> </div></div><script type="text/javascript">//头部topbar会员中心显示与隐藏var Account= document.getElementById('account');            var Downmenu= document.getElementById('dbox');            var timer = null;//定义定时器变量            //鼠标移入div1或div2都把定时器关闭了，不让他消失            Account.onmouseover = Downmenu.onmouseover = function ()            {				 //改变箭头方向				$("i#icount").attr("class","fa fa-angle-up");               				 //改变背景颜色				 Account.style.backgroundColor = '#fff';				 //显示下拉框                $("#dbox").show();				//关闭定时执行                clearTimeout(timer);            }			            //鼠标移出div1或div2都重新开定时器，让他延时消失            Account.onmouseout = Downmenu.onmouseout = function ()            {				$("i#icount").attr("class","fa fa-angle-down");				Account.style.backgroundColor = '#F5F5F5';				 //开定时器，每隔200微妙下拉框消失                timer = setTimeout(function () {                     $("#dbox").hide(); }, 200);            }      	//头部topbar会员收藏显示与隐藏userfavor;favormenu;time;            var userfavor= document.getElementById('userfavor');            var favormenu= document.getElementById('favormenu');            var time = null;//定义定时器变量            //鼠标移入div1或div2都把定时器关闭了，不让他消失            userfavor.onmouseover = favormenu.onmouseover = function ()            {				 //改变箭头方向			              				 //改变背景颜色				 userfavor.style.backgroundColor = '#fff';				 //显示下拉框                $("#favormenu").show();				//关闭定时执行                clearTimeout(time);            }			            //鼠标移出div1或div2都重新开定时器，让他延时消失            userfavor.onmouseout = favormenu.onmouseout = function ()            {					userfavor.style.backgroundColor = '#F5F5F5';				 //开定时器，每隔200微妙下拉框消失                time = setTimeout(function () {                     $("#favormenu").hide(); }, 10);            } 	 //卖家中心显隐usersell;sellmenu;clock;            var usersell= document.getElementById('sell');            var sellmenu= document.getElementById('sellmenu');            var clock = null;//定义定时器变量            //鼠标移入div1或div2都把定时器关闭了，不让他消失            usersell.onmouseover = sellmenu.onmouseover = function ()            {				 //改变箭头方向			              				 //改变背景颜色				 usersell.style.backgroundColor = '#fff';				 //显示下拉框                $("#sellmenu").show();				//关闭定时执行                clearTimeout(clock);            }			            //鼠标移出div1或div2都重新开定时器，让他延时消失            usersell.onmouseout = sellmenu.onmouseout = function ()            {					usersell.style.backgroundColor = '#F5F5F5';				 //开定时器，每隔200微妙下拉框消失                clock = setTimeout(function () {                     $("#sellmenu").hide(); }, 10);            } 				</script>		<!-- 顶部工具条 结束 --><!-- 首页广告位1 --> <?php if(!empty($adData)): ?><div class='banner'> <?php if(is_array($adData)): $i = 0; $__LIST__ = $adData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ko): $mod = ($i % 2 );++$i; if($ko["place"] == 1): ?><a href="<?php echo (get_nav_url($ko["url"])); ?>" target="_blank" title="<?php echo ($ko["title"]); ?>">     <img src="<?php echo (get_cover($ko["icon"],'path')); ?>" ></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>  </div><?php endif; ?><!-- 首页广告位1 -->
	<!-- /工具条 -->
	<!-- 头部 -->
	<div class="yershop_wrapper">
	 <!-- logo -->


<div class="header">
<a href="" class="logo" title="<?php echo C('WEB_SITE_TITLE');?>"><img src="/yershop2/Public/Home/images/logo.png" alt="<?php echo C('WEB_SITE_TITLE');?>"></a>

<div class="header_center"  >
<div class="search">
<form action="<?php echo U("Search/index");?>" name="Searchform"  method="post" >

<p>
<input type="text" name="words" placeholder="输入您想要的商品" class="search"><a rel="nofollow" href="javascript:vod(0)" class="search_btn"></a></p>
<input type="hidden" name="type" id="type" value="1"></form>
</div>
<div class="tag">热门搜索：
<?php if(is_array($hotsearch)): foreach($hotsearch as $key=>$vo): ?><a href="<?php echo U('Search/index?words='.$vo);?>"><?php echo ($vo); ?></a><?php endforeach; endif; ?>
</div>
</div>

<div class="top_right">
<a rel="nofollow" href="<?php echo U('shopcart/index');?>" class="shopping_cart" id="shopping_cart" style="display:">购物车<span id="docerCartBtn" class="yellow"></span></a>
<?php if(is_login()): if(empty($usercart)): ?><div class="sc_goods"  id="goods" style="display:none;"><ul class="sc_goods_ul">
<p class="sc_goods_none" >您的购物车还是空的，赶紧行动吧！</p></ul>
<div class="sc_goods_foot" style="display: none;">
<a rel="nofollow" href="<?php echo U('shopcart/index');?>" class="my_shopping_cart_btn">查看我的购物车</a>
</div>
</div>
<?php else: ?>
<div class="sc_goods" id="goods" style="display:none;">
<ul class="sc_goods_ul">
<?php if(is_array($usercart)): $i = 0; $__LIST__ = $usercart;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li> <dl>
<dt class="mini-img"><a  href="<?php echo U('Article/detail?id='.$vo['goodid']);?>"><img src="<?php echo (get_cover(get_cover_id($vo["goodid"]),'path')); ?>" width='40' height='40'/> </a></dt>
<dd><span class="mini_title"><a href="<?php echo U('Article/detail?id='.$vo['goodid']);?>"><?php echo (get_good_name($vo["goodid"])); ?></a> </span><span class="mini-cart-count red">¥<?php echo ($vo["price"]); ?><em class="<?php echo ($vo["sort"]); ?>">*<?php echo ($vo["num"]); ?></em></span></dd>
<dd><span class="mini-cart-info"><?php echo ($vo["parameters"]); ?></span><span class="mini-cart-del"><a name="<?php echo ($vo["sort"]); ?>" rel="del" href="javascript:vod(0);"  onclick="delcommon(event)">删除</a></span></dd>
</dl>
</li><?php endforeach; endif; else: echo "" ;endif; ?></ul>
<div class="sc_goods_foot" style="display:block;">
<a rel="nofollow" href="<?php echo U('shopcart/index');?>" class="my_shopping_cart_btn">查看我的购物车</a>
</div>
</div><?php endif; ?>


 <?php else: ?>


 

<?php if(empty($usercart)): ?><div id="goods" class="sc_goods" style="display:none;">
<ul class="sc_goods_ul">
<p class="sc_goods_none" >您的购物车还是空的，赶紧行动吧！</p>

</ul>
<div class="sc_goods_foot" style="display:none;">
<a rel="nofollow" href="<?php echo U('shopcart/index');?>" class="my_shopping_cart_btn">查看我的购物车</a>
</div></div>
<?php else: ?>
<div id="goods" class="sc_goods" style="display:none;">
<ul class="sc_goods_ul">
 <?php if(is_array($usercart)): foreach($usercart as $key=>$vo): ?><li> <dl>
<dt class="mini-img"><a  href="<?php echo U('Article/detail?id='.$vo['id']);?>"><img src="<?php echo (get_cover(get_cover_id($vo["id"]),'path')); ?>" width='40' height='40'/> </a></dt>
<dd><span class="mini_title"><a href="<?php echo U('Article/detail?id='.$vo['id']);?>"><?php echo (get_good_name($vo["id"])); ?></a> </span><span class="mini-cart-count red">¥<?php echo ($vo["price"]); ?><em class="<?php echo ($vo["sort"]); ?>">*<?php echo ($vo["num"]); ?></em></span></dd>
<dd><span class="mini-cart-info"><?php echo ($vo["parameters"]); ?></span><span class="mini-cart-del"><a name="<?php echo ($vo["sort"]); ?>" rel="del" href="javascript:vod(0);"   onclick="delcommon(event)">删除</a></span></dd>
</dl>
</li><?php endforeach; endif; ?>
</ul>
<div class="sc_goods_foot" style="display:block;">
<a rel="nofollow" href="<?php echo U('shopcart/index');?>"  class="my_shopping_cart_btn">查看我的购物车</a>
</div></div><?php endif; endif; ?>
</div></div>
	
	<!-- /头部 -->

	<!-- 菜单 -->
	<!-- 导航条-->

 <div class="menu-wrapper" >
    <div class="nav-all">
       <div class="all_class" id="all-class">
        <h2><span class="grid"><img src="/yershop2/Public/Home/images/grid.png"></span><span>商品分类</span><b></b></h2>
      </div>
      <div class="all-goods" style="display: none;" id="all-goods">
<?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><div class="item">
          <div class="product"><h4><a href="<?php echo U('home/article/index/pid/'.$cate['id']);?>"><?php echo ($cate["title"]); ?></a> </h4> </div>
            <?php if($cate['child'] != false): ?><div class="product-wrap pos"> 
          
            <div class="cf">
              <div class="fl wd252 pr20">
              
                <?php if(is_array($cate['child'])): $i = 0; $__LIST__ = $cate['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate_sub): $mod = ($i % 2 );++$i;?><ul class="cf"> <li><span><a href="<?php echo U('home/article/lists/pid/'.$cate_sub['id']);?>"><?php echo ($cate_sub["title"]); ?></a></span>
                   <?php if($cate_sub['child']): if(is_array($cate_sub['child'])): $i = 0; $__LIST__ = $cate_sub['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate_sub_two): $mod = ($i % 2 );++$i;?><a href="<?php echo U('home/article/lists/pid/'.$cate_sub_two['id']);?>"><?php echo ($cate_sub_two["title"]); ?> </a><?php endforeach; endif; else: echo "" ;endif; endif; ?> 
              
                </li> </ul><?php endforeach; endif; else: echo "" ;endif; ?>
               
</div>
            </div> </div><?php endif; ?>
       
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
        
      </div></div>
    
    
    <ul class="menu">
      <?php $__NAV__ = M('Channel')->field(true)->where("status=1")->order("sort")->select(); if(is_array($__NAV__)): $i = 0; $__LIST__ = $__NAV__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i; if(($nav["pid"]) == "0"): ?><li>
                            <a href="<?php echo (get_nav_url($nav["url"])); ?>" target="<?php if(($nav["target"]) == "1"): ?>_blank<?php else: ?>_self<?php endif; ?>"><?php echo ($nav["title"]); ?></a>
                      </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    
  </div>
	<!-- /菜单 -->


	<!-- 主体 -->
	<div  class="commom_wrapper">

 
     
        <!-- Contents  -->
      
	  <div class="ml_content">
<div class="goodlist-main">
	  <div class="lists-position">
	  <div class="category-title">
	  <h4><span><?php echo ($ctg["title"]); ?>(<?php echo ($num); ?>)</span></h4>
	  <div class="category-child">
	  <?php if(empty($childlist)): else: ?>
	  <?php if(is_array($childlist)): $i = 0; $__LIST__ = $childlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span> <a href="<?php echo U('Article/lists/?pid='.$vo['id']);?>"><?php echo ($vo["title"]); ?></a></span><?php endforeach; endif; else: echo "" ;endif; endif; ?>
</div>
</div>

<div>
  
  </div>
  <div class="salesrank">
  <h5><span></span></h5>
 <ul><?php if(is_array($recent)): $i = 0; $__LIST__ = $recent;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a class="picture" href="<?php echo U('Article/detail?id='.$vo['page']);?>"><img src="<?php echo (get_cover(get_cover_id($vo["page"]),'path')); ?>"  ></a>
  <a class="title" href="<?php echo U('Article/detail?id='.$vo['page']);?>"> <?php echo (get_good_name($vo["page"])); ?></a>
  <span>￥<?php echo (get_good_price($vo["page"])); ?> </span>
  </li><?php endforeach; endif; else: echo "" ;endif; ?></ul>
 </div>
	  </div>
	   <div class="lists-area">
	  <?php if(!empty($bdata)): ?><ul class="brand-list">
	     <li>品牌:</li>
		  <li id='brand-all' <?php if(($brandid) == ""): ?>class="active"<?php else: endif; ?>><a href="<?php echo U('Article/index',array(pid=>$ctg['id'],order=>1,'sort'=>$see,'start_price'=>$start_price,'end_price'=>$end_price));?>">全部</a></li>
		 <?php if(is_array($bdata)): $k = 0; $__LIST__ = $bdata;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li id='brand-item' <?php if(($brandid) == $vo['id']): ?>class="active"<?php else: endif; ?>><a href="<?php echo U('Article/index',array(pid=>$ctg['id'],'brandid'=>$vo['id'],order=>1,'sort'=>$see,'start_price'=>$start_price,'end_price'=>$end_price));?>" class="<?php echo ($value); ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?> </ul><?php endif; ?>
 <ul class="brand-list">
	     <li>价格:</li>
  <li <?php if(($start_price) == ""): ?>class="active"<?php else: endif; ?>><a href="<?php echo U('Article/index',array(pid=>$ctg['id'],'brandid'=>$brandid,order=>$order,'sort'=>$see));?>" class="<?php echo ($value); ?>">全部</a></li>

		  <li <?php if(($start_price) == "0"): ?>class="active"<?php else: endif; ?>><a href="<?php echo U('Article/index',array(pid=>$ctg['id'],'brandid'=>$brandid,order=>$order,'sort'=>$see,start_price=>0,'end_price'=>100));?>" class="<?php echo ($value); ?>">0-100</a></li>
<li <?php if(($start_price) == "100"): ?>class="active"<?php else: endif; ?>><a href="<?php echo U('Article/index',array(pid=>$ctg['id'],'brandid'=>$brandid,order=>$order,'sort'=>$see,start_price=>100,'end_price'=>200));?>"">100-200</a></li>
<li <?php if(($start_price) == "200"): ?>class="active"<?php else: endif; ?>><a href="<?php echo U('Article/index',array(pid=>$ctg['id'],'brandid'=>$brandid,order=>$order,'sort'=>$see,start_price=>200,'end_price'=>300));?>"">200-300</a></li>
<li <?php if(($start_price) == "300"): ?>class="active"<?php else: endif; ?>><a href="<?php echo U('Article/index',array(pid=>$ctg['id'],'brandid'=>$brandid,order=>$order,'sort'=>$see,start_price=>300,'end_price'=>400));?>" class="<?php echo ($value); ?>">300-400</a></li>
<li <?php if(($start_price) == "400"): ?>class="active"<?php else: endif; ?>><a href="<?php echo U('Article/index',array(pid=>$ctg['id'],'brandid'=>$brandid,order=>1,'sort'=>$see,start_price=>400,'end_price'=>500));?>"class="<?php echo ($value); ?>">400-500</a></li>
<li <?php if(($start_price) == "500"): ?>class="active"<?php else: endif; ?>><a href="<?php echo U('Article/index',array(pid=>$ctg['id'],'brandid'=>$brandid,order=>$order,'sort'=>$see,start_price=>500));?>"class="<?php echo ($value); ?>">500以上</a></li>
		 </ul> 

       <ul class="ml_content_top"><li <?php if(($order) == "1"): ?>class="active"<?php else: endif; ?>><a rel="nofollow" href="<?php echo U('Article/index',array(pid=>$ctg['id'],'brandid'=>$brandid,order=>1,'sort'=>$see,'start_price'=>$start_price,'end_price'=>$end_price));?>
	   " class="<?php echo ($value); ?>">热度<i></i></a></li><li <?php if(($order) == "2"): ?>class="active"<?php else: endif; ?>><a href="<?php echo U('Article/index',array(pid=>$ctg['id'],'brandid'=>$brandid,order=>2,'sort'=>$see,'start_price'=>$start_price,'end_price'=>$end_price));?>
	   " class="<?php echo ($value); ?>">最新<i></i></a></li><li <?php if(($order) == "3"): ?>class="active"<?php else: endif; ?>><a href="<?php echo U('Article/index',array(pid=>$ctg['id'],'brandid'=>$brandid,order=>3,'sort'=>$see,'start_price'=>$start_price,'end_price'=>$end_price));?>
	   " class="<?php echo ($value); ?>">价格<i></i></a></li><li <?php if(($order) == "4"): ?>class="active"<?php else: endif; ?>><a href="<?php echo U('Article/index',array(pid=>$ctg['id'],'brandid'=>$brandid,order=>4,'sort'=>$see,'start_price'=>$start_price,'end_price'=>$end_price));?>
	   " class="<?php echo ($value); ?>">销量<i></i></a></li></ul> 
	  
	  <ul class="goodlist">
      
         <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><li class="face" onmouseover="this.className='facehover'" onmouseout="this.className='face'">
                    <a href="<?php echo U('Article/detail?id='.$list['id']);?>" class="list-img"> <img src="<?php echo (get_cover($list["cover_id"],'path')); ?>"/></a>
             <p> <a href="<?php echo U('Article/detail?id='.$list['id']);?>" class="t2"> <?php echo ($list["title"]); ?></a></p>     
                       <p><span class="red" title="预览：<?php echo (get_good_price($list["id"])); ?>">价格：￥<?php echo ($list["price"]); ?></span></p> 

              </li><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
			</ul>
		  	<!-- 分页 -->
        <div class="page">
<?php echo ($page); ?>
        </div>	
			
			</div>
	  </div>
	  
	 </div>

         
        </section>
 	

 </div>
	<!-- 主体 -->

  <!-- 购物车js -->
   	<script>
	//购物车显示与隐藏
	 var Shopcart= document.getElementById('shopping_cart');
     var Goodsmenu= document.getElementById('goods');
            var timerr = null;//定义定时器变量
            //鼠标移入div1或div2都把定时器关闭了，不让他消失
            Shopcart.onmouseover =Goodsmenu.onmouseover = function ()
            {
                Goodsmenu.style.display = 'block';
                clearTimeout(timerr);
            }
            //鼠标移出div1或div2都重新开定时器，让他延时消失
            Shopcart.onmouseout =Goodsmenu.onmouseout = function ()
            {
                //开定时器
                timerr= setTimeout(function () { 
                    Goodsmenu.style.display = 'none'; }, 10);
            }
			
//购物车动态删除
	function delcommon(event)
		{ //获取事件源
event = event ? event : window.event; 
var obj = event.srcElement ? event.srcElement : event.target; 
//这时obj就是触发事件的对象，可以使用它的各个属性 
//还可以将obj转换成jquery对象，方便选用其他元素 
str = obj.innerHTML.replace(/<\/?[^>]*>/g,''); //去除HTML tag

	var $obj = $(obj);
	var str=$obj.parent().prev().html();
	if(obj.rel=="del")
{ var str=obj.name;
var uexist="<?php echo get_username();?>";
	//全选的实现 定义删的发送路径
	if(uexist){
		var del='<?php echo U("Shopcart/delItemByuid");?>';	
	}
else{
var del='<?php echo U("Shopcart/delItem");?>';
	
	}

$.ajax({
type:'post', //传送的方式,get/post
url:del, //发送数据的地址
data:{sort:str},
 dataType: "json",
success:function(data)
{var $obj = $(obj);
	$obj.parents("li").remove();
	if(data.sum=="0"){  //判断购物车数量是否为0，为0则隐藏底部查看工具
						$("div.sc_goods_foot").hide();
					   	var html='<p class="sc_goods_none" >您的购物车还是空的，赶紧行动吧！</p>';
					   $("ul.sc_goods_ul").html(html);
				
	
	}
	else{$("div.sc_goods_foot").show();}

},
error:function (event, XMLHttpRequest, ajaxOptions, thrownError) {
alert(XMLHttpRequest+thrownError); }
		})
}
	
	} 
//购物车删除结束


	
</script>
   <!-- /购物车js -->

	<!-- 底部 -->
	﻿
    <!-- 底部-->
   <script type="text/javascript"  charset="utf-8" src="/yershop2/Public/static/js/menudown.js"></script> 

</div></div>
<div class="footer">
<div class="footer_pic_new">
		<div class="footer_pic_new_inner">
		    <a name="foot_1" href="http://help.dangdang.com/details/page13" target="_blank" class="footer_pic01"><span>正规渠道正品保障</span></a>
		    <a name="foot_2" class="footer_pic02" href="http://help.dangdang.com/details/page21" target="_blank"><span>放心购物货到付款</span></a>
		    <a name="foot_3" class="footer_pic03" href="http://help.dangdang.com/details/page16" target="_blank"><span>150城市次日送达</span></a>
		    <a name="foot_4" class="footer_pic04" href="http://help.dangdang.com/details/page29" target="_blank"><span>上门退货当场退款</span></a>
		</div>
	</div>
    <div class="foot_center">  
	
  <?php if(is_array($footer)): $i = 0; $__LIST__ = $footer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl><dt><?php echo ($vo["title"]); ?></dt>
 <?php if(is_array($vo['id'])): $i = 0; $__LIST__ = $vo['id'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$son): $mod = ($i % 2 );++$i;?><dd><a rel="nofollow"  href="<?php echo U('help/lists?pid='.$son['id']);?>"><?php echo ($son["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
</dl><?php endforeach; endif; else: echo "" ;endif; ?> 
     

<dl>
    <dt>在线客服</dt>
    <dd>周一至周五</dd>
    <dd>09:00-18:00</dd>
	
</dl>

  

     
    </div>
 
<div class="theme-footer"> 
    

  
      
       <p><span style=" text-align: center;"> Copyright@ 2014-2015 <strong><a href="#" target="_blank" class="red"></a></strong> <?php echo C('WEB_SITE_ICP');?></p>
    
	</div> </div>

</div>
	<!-- /底部 -->
</body>
</html>
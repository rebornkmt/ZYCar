<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo ($meta_title); ?>_<?php echo C('WEB_SITE_TITLE');?></title>
<link href="/yershop2/Public/Home/css/font-face.css" rel="stylesheet">
<link href="/yershop2/Public/Home/css/common.css" rel="stylesheet">
<link href="/yershop2/Public/Home/css/top.css" rel="stylesheet">
<link href="/yershop2/Public/Home/css/footer.css" rel="stylesheet">

<script type="text/javascript" src="/yershop2/Public/static/js/jquery.min.js"></script>
<script type="text/javascript" src="/yershop2/Public/Home/js/public.js"></script>


</head>
<body>
<!-- 工具条 -->
	<!-- 顶部工具条 --><div class="top"><div class="topbar">                                 <span class="welcome" style="float:left">欢迎光临<?php echo C('WEB_SITE_TITLE');?>		<?php if(is_login()): ?><a href="" class="red"><?php echo get_username();?></a>,<a rel="nofollow" href="index.php?s=/Home/User/logout.html">退出</a><?php else: ?> ,请<a href="<?php echo U('User/login');?>" class="red"> 登录</a>&nbsp;<a href="<?php echo U('User/register');?>" style="padding-left:0;padding-right:10px"> 免费注册 </a><?php endif; ?>		</span> 	  		  	  <span class="operate_nav">			<span  id="account"><a rel="nofollow" >我的账号&nbsp;</a><i id="icount" class="fa fa-angle-down"></i> </span>			<ul id="dbox" class="top_lg_info_down" style="display:none;"> <li><a rel="nofollow" href="index.php?s=/Home/center/index.html">个人中心</a></li> <li><a rel="nofollow" href="index.php?s=/Home/center/collect.html">我的收藏</a></li> <li><a rel="nofollow" href="index.php?s=/Home/center/coupon.html">优惠券</a></li><li><a rel="nofollow" href="index.php?s=/Home/center/comment.html">我的评论</a></li> <?php if(is_login()): ?><li><a rel="nofollow" href="index.php?s=/Home/User/profile.html">修改密码</a></li><?php else: endif; ?></ul>		    	|</span>		  	<span class="operate_nav" >	  <a rel="nofollow" href=''>我的订单</a>| </span>		 <span class="operate_nav" >	 <a href="javascript:AddToShoppingCart(0);" name="购物车" dd_name="购物车"><i class="icon_card"></i>购物车<b id="cart_items_count"></b></a> </span> </div> </div><script type="text/javascript">//头部topbar会员中心显示与隐藏var Account= document.getElementById('account');            var Downmenu= document.getElementById('dbox');            var timer = null;//定义定时器变量            //鼠标移入div1或div2都把定时器关闭了，不让他消失            Account.onmouseover = Downmenu.onmouseover = function ()            {				 //改变箭头方向				$("i#icount").attr("class","fa fa-angle-up");               				 //改变背景颜色				 Account.style.backgroundColor = '#fff';				 //显示下拉框                $("#dbox").show();				//关闭定时执行                clearTimeout(timer);            }			            //鼠标移出div1或div2都重新开定时器，让他延时消失            Account.onmouseout = Downmenu.onmouseout = function ()            {				$("i#icount").attr("class","fa fa-angle-down");				Account.style.backgroundColor = '#F5F5F5';				 //开定时器，每隔200微妙下拉框消失                timer = setTimeout(function () {                     $("#dbox").hide(); }, 200);            }       				</script>		<!-- 顶部工具条 结束 -->
	<!-- /工具条 -->
	<!-- 头部 -->
	<div class="wrapper-cart">
	         <!-- 导航条 -->



<div class="header-wrap"><a href="<?php echo C('DOMAIN');?>" class="logo" title="<?php echo C('WEB_SITE_TITLE');?>"><img src="/yershop2/Public/Home/images/logo.png" alt=""></a>

<div class="shopping_cart_procedure"><span>1、我的购物车</span><span>   2、填写订单</span><span style="width:175px; padding:0;">3、完成订单</span>  </div>
</div>
	<!-- /头部 -->
	
	<!-- 主体 -->
	<div  class="wrapper-order">

 
<div class="cartname">全部商品&nbsp;&nbsp;<span id="sum" class="red"><?php echo ($sum); ?></span></div>
<?php if(is_login()): if(empty($sqlcart)): ?><div class="shopcart_main_none"><div class="shopcart_main_none_img"></div><div class="shopcart_main_none_main"><p>你的购物车还是空的哦赶紧行动吧 !</p><a rel="nofollow" href="<?php echo U("Index/index");?>">马上购物</a></div></div><?php endif; ?>

<?php if(!empty($sqlcart)): ?><form action='<?php echo U("order/add");?>'method="post" name="myform" id="form">
<table  id="table" class="gridtable" >
        <thead>
            <tr><th class="row-selected">
					 <input class="checkbox check-all" checked="checked"type="checkbox">全选
					</th>
                <th >商品名</th>
                <th >价格</th>
                <th >数量</th>
                <th >操作</th>
            </tr>
        </thead>
        
        <tbody>
    
          <?php if(is_array($sqlcart)): $i = 0; $__LIST__ = $sqlcart;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="cart_bottom"><td><input class="ids row-selected" checked="checked" type="checkbox" name="id[]" value="<?php echo ($vo["goodid"]); ?>"></td>
                <td> <span class="c5"><A href="<?php echo U('Article/detail?id='.$vo['goodid']);?>" class="dl"> <img src="<?php echo (get_cover(get_cover_id($vo["goodid"]),'path')); ?>"  width="70" height="70"/></a>
		  <span class="dd"><a href="<?php echo U('Article/detail?id='.$vo['goodid']);?>"  class="dd"> <?php echo (get_good_name($vo["goodid"])); ?></a></span>
		 <span class="dd"><?php echo ($vo["parameters"]); ?></span>
		  </span></td>
               
                <td align="center">¥<?php echo ($vo["price"]); ?></td>
                 <td  align="center"><div class="quantity-form"><a rel="jia"  class="jia" onclick="myfunction(event)">+</a><input type="text"  class="goodnum"  id="<?php echo ($vo["sort"]); ?>" name="num[]"value="<?php echo ($vo["num"]); ?>"/><a rel="jian" onclick="myfunction(event)"  class="jian" id="oneA">-</a>
				  <input type="hidden" value="<?php echo ($vo["price"]); ?>" name="price[]"/>
				  <input type="hidden" value="<?php echo ($vo["sort"]); ?>" name="sort[]"/>
				 <input type="hidden" value="<?php echo ($vo["parameters"]); ?>" name="parameters[]"/>
				 </div></td>
                
               <td><a  name="<?php echo ($vo["sort"]); ?>" rel="del" onclick="myfunction(event)">删除</a>&nbsp;<a href="javascript:vod(0);" onclick="favor(<?php echo ($vo["goodid"]); ?>)">移到收藏</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table> <table class="cart_info"> 
   <td colspan="4">  <input class="checkbox check-all"checked="checked" type="checkbox">全选  <a  name="<?php echo ($vo["id"]); ?>" rel="del" href='<?php echo U("index/index");?>'>继续购物</a>    </td><td align="right"></td> </tr>
			  <tr><td colspan="5" align="right">种类：<span id="count"><?php echo ($count); ?></span>种</td>
			  <tr><td colspan="5" align="right">总计（不含运费）：¥<em class="price" id="total"> <?php echo ($price); ?></em></td>
			</tr>
        </tbody>
      <tr><td colspan="5" align="right">
 
 <a class="btn_submit_pay"   href="javascript:void(0)" onclick="checklogin();return false" >去结算</a>
 </td> </tr>
    </table> 
      
 
  </form><?php endif; ?>
	<?php else: ?>
<?php if(empty($usercart)): ?><div class="shopcart_main_none"><div class="shopcart_main_none_img"></div><div class="shopcart_main_none_main"><p>你的购物车还是空的哦赶紧行动吧 !</p><a rel="nofollow" href="<?php echo U("Index/index");?>">马上购物</a></div><div class="cb"></div></div><?php endif; ?>

<?php if(!empty($usercart)): ?><form action='<?php echo U("Shopcart/order");?>'method="post" name="myform" id="form"><table  id="table" class="gridtable" width="100%">
        <thead>
            <tr><th class="row-selected">
					 <input class="checkbox check-all" type="checkbox" checked="">全选
					</th>
                <th >商品名</th>
                <th >价格</th>
                <th >数量</th>
                <th >操作</th>
            </tr>
        </thead>
      
        <tbody>
    
          <?php if(is_array($usercart)): foreach($usercart as $key=>$vo): ?><tr><td align="center"><input class="ids row-selected"  checked="" type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>"></td>
          <td> <span class="c5"><A href="<?php echo U('Article/detail?id='.$vo['id']);?>" class="dl"> <img src="<?php echo (get_cover(get_cover_id($vo["id"]),'path')); ?>"  width="70" height="70"/></a>
		  <span class="dd"><a href="<?php echo U('Article/detail?id='.$vo['id']);?>"  class="dd"> <?php echo (get_good_name($vo["id"])); ?></a></span>
		 <span class="dd"><?php echo ($vo["parameters"]); ?></span>
		  </span></td>
               
                <td align="center"><?php echo ($vo["price"]); ?>元</td>
                <td  align="center"><div class="quantity-form">
				<a rel="jia"  class="jia" onclick="myfunction(event)">+</a>
				<input type="text"  class="goodnum"  id="<?php echo ($vo["sort"]); ?>" name="num[]" value="<?php echo ($vo["num"]); ?>"/>
				<a rel="jian" onclick="myfunction(event)"  class="jian" id="oneA">-</a>
				 <input type="hidden" value="<?php echo ($vo["price"]); ?>" name="price[]"/>
				  <input type="hidden" value="<?php echo ($vo["sort"]); ?>" name="sort[]"/>
				 <input type="hidden" value="<?php echo ($vo["parameters"]); ?>" name="parameters[]"/>
				 </div></td>
                
                <td><a  name="<?php echo ($vo["sort"]); ?>" rel="del" onclick="myfunction(event)">删除</a>&nbsp;<a href="javascript:vod(0);" onclick="favor(<?php echo ($vo["id"]); ?>)">移到收藏</a></td>
            </tr><?php endforeach; endif; ?>
			<tr>
			  <td colspan="4">  <input class="checkbox check-all"  checked="" type="checkbox">全选 <a  name="<?php echo ($vo["id"]); ?>" rel="del" href="<?php echo U("index/index");?>">继续购物</a>    </td><td align="right"></td></tr>
			  <tr><td colspan="5" align="right">种类：<span id="count"><?php echo ($count); ?></span>种</td>
			  <tr><td colspan="5" align="right">金额小计：<span id="total"><?php echo ($price); ?></span>元</td>
			</tr>
         
        
        </tbody>
      
    </table> 
  <div class="text" style="float:right">
 
总计（不含运费）：<em class="price" id="total"> <?php echo ($price); ?></em>元 <a class="btn_submit_pay"   href="javascript:void(0)" onclick="checklogin();return false" >去结算</a>
  </div> <input type="hidden" value="<?php echo ($uid); ?>" id="uid"/> 

 </form><?php endif; endif; ?>     
   <!-- jQuery 遮罩层 begin -->
<div id="fullbg"></div>
<!-- end jQuery 遮罩层 -->
<!-- 对话框 -->
<div id="dialog">
   <!-- Modal 对话框内容 -->
<div id="myModal" class="modal">
     
  <div class="modal-header">
<A class="close" onclick="closeBg();"><img src="/yershop2/Public/Home/images/close.png"></A>
<h3 id="myModalLabel">用户登录</h3>
</div><div class="m_img">
        <a class="" href="/index.php?s=/Home/Addons/execute/_addons/SyncLogin/_controller/Base/_action/login/type/qq.html"><img src="/yershop2/Public/Home/images/qq.png">&nbsp;用QQ账号登录</a></br></br>
        <a class="" href="/index.php?s=/Home/Addons/execute/_addons/SyncLogin/_controller/Base/_action/login/type/sina.html"><img src="/yershop2/Public/Home/images/weibo.png">&nbsp;用微博账号登录</a>
        <!--<a class="btn btn-warning btn-block" href="">用豆瓣账号登录</a>
        <a class="btn btn-primary btn-block" href="">用人人账号登录</a>-->
    </div>
    <form class="form-horizontal" id="loginform" name="user" method="post">
    
            <div class="form_login"> <input type="text"   id="inputusername" name="username" placeholder="用户名">

 </div>
    <div class="form_login">
             <input  class="v_yerhop"type="text"  id="inputpassword" name="password"  placeholder="密码">
			  	
            </div>
		 
            <span class="tips"></span>
			  	
           	
		
						<div class="form_login">
 <a  id="login_btn" value="">登录</a> </div>
    <div class="control-group">
    
   
   <p><span class="pull-right"><span>还没有账号? <a href="<?php echo U("User/register");?>" class="now">立即注册</a></span> </p>
 
    </div>
    </form>
</div> <!-- Modal 对话框内容 -->
</div><!-- 对话框 结束-->
<!-- jQuery 遮罩层上方的对话框 -->
    <script type="text/javascript">
//显示灰色 jQuery 遮罩层
function showBg() {
    var bh = $("body").height();
    var bw = $("body").width();
    $("#fullbg").css({
        height:bh,
        width:bw,
        display:"block"
    });
    $("#dialog").show();
}
//关闭灰色 jQuery 遮罩
function closeBg() {
    $("#fullbg,#dialog").hide();
}
</script><!--[if lte IE 6]>
<script type="text/javascript">
// 浮动对话框
$(document).ready(function() {
    var domThis = $('#dialog')[0];
    var wh = $(window).height() / 2;
    $("body").css({
        "background-image": "url(about:blank)",
        "background-attachment": "fixed"
    });
    domThis.style.setExpression('top', 'eval((document.documentElement).scrollTop + ' + wh + ') + "px"');
});
</script>
<![endif]-->
   
  
       <script type="text/javascript">
//登录后刷新页面，载入数据
$("#login_btn").click(function(){
	   
   var yourname=$('#inputusername').val();
	var yourword=$('#inputpassword').val();
		
	$.ajax({
type:'post', //传送的方式,get/post
url:'<?php echo U("User/loginfromdialog");?>', //发送数据的地址
data:{username:yourname,password:yourword},
 dataType: "json",
success:function(data)
{ if(data.status=="1")
{
$(".tips").html(data.info);
window.location.reload();
$("#uid").val(data.uid);
}
else{$(".tips").html(data.info);

}

},
error:function (event, XMLHttpRequest, ajaxOptions, thrownError) {
alert(XMLHttpRequest+thrownError); }
});});
	   //全选的实现
	$(".check-all").click(function(){
		$(".ids").prop("checked", this.checked);
	});
	$(".ids").click(function(){
		var option = $(".ids");
		option.each(function(i){
			if(!this.checked){
				$(".check-all").prop("checked", false);
				return false;
			}else{
				$(".check-all").prop("checked", true);
			}
		});
	});
	var uexist="<?php echo get_username();?>";
	//全选的实现 定义加、减、删的发送路径
	if(uexist){
		var inc='<?php echo U("Shopcart/incNumByuid");?>';
		var dec='<?php echo U("Shopcart/decNumByuid");?>';
		var del='<?php echo U("Shopcart/delItemByuid");?>';
	
	}
else{
	    var inc='<?php echo U("Shopcart/incNum");?>';
		var dec='<?php echo U("Shopcart/decNum");?>';
		var del='<?php echo U("Shopcart/delItem");?>';
		
	
	}

	function checklogin() {
	var uexist="<?php echo get_username();?>";

		if(uexist){document.myform.submit();}
		else{
			showBg();
	
			}
		
		 }
function favor(id) { 
var uexist="<?php echo get_username();?>";
if(uexist){
var favorid=id;
	$.ajax({
type:'post', //传送的方式,get/post
url:'<?php echo U("User/favor");?>', //发送数据的地址
data:{id:favorid},
 dataType: "json",
success:function(data){
	if(data.status=="1"){alert(data.msg);}
	}
	,
error:function (event, XMLHttpRequest, ajaxOptions, thrownError) {
alert(XMLHttpRequest+thrownError); }
})	
}

else{
showBg();
}
	
	}
	   
	function myfunction(event) { 
event = event ? event : window.event; 
var obj = event.srcElement ? event.srcElement : event.target; 
//这时obj就是触发事件的对象，可以使用它的各个属性 
//还可以将obj转换成jquery对象，方便选用其他元素 
str = obj.innerHTML.replace(/<\/?[^>]*>/g,''); //去除HTML tag

	var $obj = $(obj);


	if(obj.rel=="jia"){
	var num=$obj.next().val(); 

var gid=$obj.next().attr("id");
	
 a=parseInt(num)+1;
 $obj.next().val(a); 
//增加数据
		$.ajax({
type:'post', //传送的方式,get/post
url:inc, //发送数据的地址
data:{sort:gid},
 dataType: "json",
success:function(data)
{$("span#count").text(data.count);
$("span#total").text(data.price);
$("span#sum").text(data.sum);
	$("em.price").text(data.price);

},
error:function (event, XMLHttpRequest, ajaxOptions, thrownError) {
alert(XMLHttpRequest+thrownError); }
		})}

if(obj.rel=="jian")
{ var num=$obj.prev().val(); 

var str=$obj.prev().attr("id")	
    
     
    //如果文本框的值大于0才执行减去方法  
     if(num >0){  
      //并且当文本框的值为1的时候，减去后文本框直接清空值，不显示0  
      if(num==1)  
      { alert("最少为1");
   return true;
      }  
      //否则就执行减减方法  
      else  
      { 
      a=parseInt(num)-1;
	  
 $obj.prev().val(a);   
    
      } 
	  
    
     } 
	   
 

//减少数据
$.ajax({
type:'post', //传送的方式,get/post
url:dec, //发送数据的地址
data:{sort:str},
 dataType: "json",
success:function(data)
{$("span#count").text(data.count);
$("span#total").text(data.price);
$("span#sum").text(data.sum);
	$("em.price").text(data.price).fadeIn();

},
error:function (event, XMLHttpRequest, ajaxOptions, thrownError) {
alert(XMLHttpRequest+thrownError); }
		})
}
var html="<div class='shopcart_main_none'><div class='shopcart_main_none_img'></div><div class='shopcart_main_none_main'><p>你的购物车还是空的哦赶紧行动吧!</p><a  href='<?php echo U('Index/index');?>'>马上购物</a></div>";
if(obj.rel=="del")
{ var string=obj.name;
//删除数据
$.ajax({
type:'post', //传送的方式,get/post
url:del, //发送数据的地址
data:{sort:string},
 dataType: "json",
success:function(data)
{var $obj = $(obj);
	$obj.parents("tr").empty();
	$("span#count").text(data.count);
$("span#total").text(data.price);
$("span#sum").text(data.sum);
	$("em.price").text(data.price);
	var a=data.sum;
if(a=="0"){$(".text").remove();$("#form").html(html);}
},
error:function (event, XMLHttpRequest, ajaxOptions, thrownError) {
alert(XMLHttpRequest+thrownError); }
		})
}


	}
	
	
    </script>
    

 </div>
	<!-- /主体 -->

	<!-- 底部 -->
	
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
	<dd><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('QQ');?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo C('QQ');?>:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></dd>
</dl>

  

     
    </div>
 
<div class="theme-footer"> 
    

  
      
       <p><span style=" text-align: center;"> Copyright@yershop商城系统 2014-2015 <strong><a href="http://www.yershop.com/" target="_blank" class="red">Yershop.com</a></strong> <?php echo C('WEB_SITE_ICP');?></p>
    
	</div> </div>

</div>
	<!-- /底部 -->
</body>
</html>
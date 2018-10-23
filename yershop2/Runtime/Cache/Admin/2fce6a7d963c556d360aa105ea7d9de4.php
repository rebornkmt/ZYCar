<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($meta_title); ?>|yershop管理平台</title>
    <link href="/yershop2/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/yershop2/Public/Admin/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="/yershop2/Public/Admin/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="/yershop2/Public/Admin/css/module.css">
   <?php if(isset($cate_rows)): ?><link rel="stylesheet" type="text/css" href="/yershop2/Public/Admin/css/style.css" media="all"><?php else: ?> <link rel="stylesheet" type="text/css" href="/yershop2/Public/Admin/css/style-default.css" media="all"><?php endif; ?>  
	<link rel="stylesheet" type="text/css" href="/yershop2/Public/Admin/css/<?php echo (C("COLOR_STYLE")); ?>.css" media="all">
     <!--[if lt IE 9]>
    <script type="text/javascript" src="/yershop2/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/yershop2/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/yershop2/Public/Admin/js/jquery.mousewheel.js"></script>
 <script type="text/javascript" src="/yershop2/Public/Admin/js/highcharts.js"></script>
<script type="text/javascript" src="/yershop2/Public/Admin/js/exporting.js"></script>
<script type="text/javascript" src="/yershop2/Public/Admin/js/data.js"></script>
    <!--<![endif]-->
    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo"><img src="/yershop2/Public/Admin/images/logo.png"></span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (get_nav_url($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			<li><a href="<?php echo get_index_url();?>" target="_blank">前台</a></li>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo session('user_auth.username');?>"><?php echo session('user_auth.username');?></em></li>
                <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
                <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li>
                <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->
 <?php if(isset($cate_rows)): ?><div class="goods-content"><?php endif; ?> 
    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                <?php if(!empty($_extra_menu)): ?>
                    <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>
                <?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
                    <?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
                        <ul class="side-sub-menu">
                            <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                                    <a class="item" href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endif; ?>
                    <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->
 <?php if(isset($cate_rows)): ?></div><?php endif; ?> 
    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                <span>您的位置:</span>
                <?php $i = '1'; ?>
                <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                    <?php $i = $i+1; endforeach; endif; ?>
            </div><?php endif; ?>
            <!-- nav -->
            

            
	<script type="text/javascript" src="/yershop2/Public/static/uploadify/jquery.uploadify.min.js"></script>
	<div class="main-title">
		<h2><?php echo isset($info['id'])?'编辑':'新增';?>品牌推广</h2>
	</div>
	<div class="tab-wrap">
		<ul class="tab-nav nav">
			<li data-tab="tab1" class="current"><a href="javascript:void(0);">基 础</a></li>
			<li data-tab="tab2"><a href="javascript:void(0);">高 级</a></li>
		</ul>
		<div class="tab-content">
			<form action="<?php echo U();?>" method="post" class="form-horizontal">
				<!-- 基础 -->
				<div id="tab1" class="tab-pane in tab1">
				<div class="form-item">
						<label class="item-label">所属分类<span class="check-tips">（品牌所属分类<b id='pid'></b>）</span></label>
						<div class="controls">
							<select id="firstlever"> 
  <option value="-1">选择一级分类</option>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option  value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select> 
   <select id="secondlever"> <option value="-1">选择二级分类</option> </select>
 <select id="thirdlever"> <option value="-1">选择三级分类</option> </select>
	
	<script>
	$('#firstlever').change(function(){
					if(this.value==-1){
						//$('#ltwo').hide();
						//$('#lthree').hide();
						return;
					}
						$('#ypid').val(this.value);//写入数据
                      $('b').html(this.value);//写入数据
					$.post('<?php echo U("change");?>',{pid:this.value},
					function(data,textStatus){
						if(data){
						    $('#secondlever').empty();//清空原有的数据
							//$("<option value='-1'>选择三级分类</option>").appendTo("#thirdlever");
							
						
							//$("<option value='-1'>选择二级分类</option>").appendTo("#secondlever");
							
								$.each(data, function(i,n){
								$("<option value='"+n.id+"'>"+n.title+"</option>").appendTo("#secondlever");
								//$("#ltwo").append('<option value="'+n.region_id+'">'+n.region_name+'</option>');
							});
							$('#ltwo').show();
						}else{
							alert('没有子级了!');
						}
					},'json');
				});
$('#secondlever').change(function(){
					if(this.value==-1){
						//$('#ltwo').hide();
						//$('#lthree').hide();
						return;
					}
					$('#ypid').val(this.value);//写入数据
					$('b').html(this.value);//写入数据
					$.post('<?php echo U("change");?>',{pid:this.value},
					function(data,textStatus){
						if(data){
						
					  $('#thirdlever').empty();//清空原有的数据
					
							$.each(data, function(i,n){
								$("<option value='"+n.id+"'>"+n.title+"</option>").appendTo("#thirdlever");
								//$("#ltwo").append('<option value="'+n.region_id+'">'+n.region_name+'</option>');
							});
							$('#ltwo').show();
						}else{
							alert('没有子级了!');
						}
					},'json');
				});

$('#thirdlever').change(function(){
					if(this.value==-1){
						//$('#ltwo').hide();
						//$('#lthree').hide();
						return;
					}
					//alert($('#lone'.value);
						$('#ypid').val(this.value);//写入数据
                       $('b').html(this.value);//写入数据
				});

				</script>
				</div>
					</div>
					<div class="form-item">
						<label class="item-label">
							品牌名称<span class="check-tips">（多个商品用逗号隔开，如3,4,5）</span>
						</label>
						<div class="controls">
							<input type="text" name="title" class="text input-large" value="<?php echo ((isset($info["title"]) && ($info["title"] !== ""))?($info["title"]):''); ?>">
						</div>
					</div>
	<div class="form-item">
						<label class="item-label">
							品牌标识<span class="check-tips">（英文字母，不可重复）</span>
						</label>
						<div class="controls">
							<input type="text" name="name" class="text input-large" value="<?php echo ((isset($info["name"]) && ($info["name"] !== ""))?($info["name"]):''); ?>">
						</div>
					</div>
					<div class="controls">
						<label class="item-label">图片</label>
						<input type="file" id="upload_picture">
						<input type="hidden" name="icon" id="icon" value="<?php echo ((isset($info['icon']) && ($info['icon'] !== ""))?($info['icon']):''); ?>"/>
						<div class="upload-img-box">
						<?php if(!empty($info['icon'])): ?><div class="upload-pre-item"><img src="<?php echo (get_cover($info["icon"],'path')); ?>"/></div><?php endif; ?>
						</div>
					</div>
					<div class="form-item">
						<label class="item-label">状态<span class="check-tips">（1-可用，2-禁用）</span></label>
						<div class="controls">
							<label class="textarea input-large">
								<input type="text" name="status" class="text input-large" value="<?php echo ((isset($info["status"]) && ($info["status"] !== ""))?($info["status"]):'1'); ?>">
							</label>
						</div>
					</div>
					<script type="text/javascript">
					//上传图片
				    /* 初始化上传插件 */
					$("#upload_picture").uploadify({
				        "height"          : 30,
				        "swf"             : "/yershop2/Public/static/uploadify/uploadify.swf",
				        "fileObjName"     : "download",
				        "buttonText"      : "上传图片",
				        "uploader"        : "<?php echo U('File/uploadPicture',array('session_id'=>session_id()));?>",
				        "width"           : 120,
				        'removeTimeout'	  : 1,
				        'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
				        "onUploadSuccess" : uploadPicture,
				        'onFallback' : function() {
				            alert('未检测到兼容版本的Flash.');
				        }
				    });
					function uploadPicture(file, data){
				    	var data = $.parseJSON(data);
				    	var src = '';
				        if(data.status){
				        	$("#icon").val(data.id);
				        	src = data.url || '/yershop2' + data.path;
				        	$("#icon").parent().find('.upload-img-box').html(
				        		'<div class="upload-pre-item"><img src="' + src + '"/></div>'
				        	);
				        } else {
				        	updateAlert(data.info);
				        	setTimeout(function(){
				                $('#top-alert').find('button').click();
				                $(that).removeClass('disabled').prop('disabled',false);
				            },1500);
				        }
				    }
					</script>
				</div>

				<!-- 高级 -->
				<div id="tab2" class="tab-pane tab2">
					<div class="form-item">
						<label class="item-label">可见性<span class="check-tips">（是否对用户可见，针对前台）</span></label>
						<div class="controls">
							<select name="display">
								<option value="1">所有人可见</option>
								<option value="0">不可见</option>
								<option value="2">管理员可见</option>
							</select>
						</div>
					</div>
					

				</div>

				<!-- 高级 -->
				<div id="tab2" class="tab-pane tab2">
					<div class="form-item">
						<label class="item-label">网页标题</label>
						<div class="controls">
							<input type="text" name="meta_title" class="text input-large" value="<?php echo ((isset($info["meta_title"]) && ($info["meta_title"] !== ""))?($info["meta_title"]):''); ?>">
						</div>
					</div><div class="form-item">
						<label class="item-label">描述</label>
						<div class="controls">
							<label class="textarea input-large">
								<textarea name="description"><?php echo ((isset($info["description"]) && ($info["description"] !== ""))?($info["description"]):''); ?></textarea>
							</label>
						</div>
					</div>
					
					
					
					
				</div>

				<div class="form-item">
					<input type="hidden" name="id" value="<?php echo ((isset($info["id"]) && ($info["id"] !== ""))?($info["id"]):''); ?>">
					<input type="hidden" name="ypid" id="ypid" value="<?php echo ((isset($info["ypid"]) && ($info["ypid"] !== ""))?($info["ypid"]):''); ?>">
					<button type="submit" id="submit" class="btn submit-btn ajax-post" target-form="form-horizontal">确 定</button>
					<button class="btn btn-return" onclick="javascript:history.back(-1);return false;">返 回</button>
				</div>
		</form>
		</div>
	</div>

        </div>
        <?php if(!isset($cate_rows)): ?><div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用<a href="http://www.yershop.com" target="_blank">YerShop</a>商城系统</div>
                <div class="fr">V<?php echo (ONETHINK_VERSION); ?></div>
            </div>
        </div>
    </div><?php endif; ?>
    <!-- /内容区 -->
    <script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "/yershop2", //当前网站地址
            "APP"    : "/yershop2/index.php?s=", //当前项目地址
            "PUBLIC" : "/yershop2/Public", //项目公共目录地址
            "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
        }
    })();
    </script>
    <script type="text/javascript" src="/yershop2/Public/static/think.js"></script>

    <script type="text/javascript" src="/yershop2/Public/Admin/js/common.js"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
			
            $subnav.find("a[href='" + url + "']").parent().addClass("current") ;

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
	<script type="text/javascript">
		<?php if(isset($info["id"])): ?>Think.setValue("allow_publish", <?php echo ((isset($info["allow_publish"]) && ($info["allow_publish"] !== ""))?($info["allow_publish"]):1); ?>);
		Think.setValue("check", <?php echo ((isset($info["check"]) && ($info["check"] !== ""))?($info["check"]):0); ?>);
		Think.setValue("model[]", <?php echo (json_encode($info["model"])); ?> || [1]);
		Think.setValue("model_sub[]", <?php echo (json_encode($info["model_sub"])); ?> || [1]);
		Think.setValue("type[]", <?php echo (json_encode($info["type"])); ?> || [2]);
		Think.setValue("display", <?php echo ((isset($info["display"]) && ($info["display"] !== ""))?($info["display"]):1); ?>);
		Think.setValue("reply", <?php echo ((isset($info["reply"]) && ($info["reply"] !== ""))?($info["reply"]):0); ?>);
		Think.setValue("reply_model[]", <?php echo (json_encode($info["reply_model"])); ?> || [1]);<?php endif; ?>
		$(function(){
			showTab();
			$("input[name=reply]").change(function(){
				var $reply = $(".form-item.reply");
				parseInt(this.value) ? $reply.show() : $reply.hide();
			}).filter(":checked").change();
		});
		//导航高亮
		highlight_subnav('<?php echo U('Brand/index');?>');
	</script>

</body>
</html>
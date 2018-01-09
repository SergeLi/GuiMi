<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/Admin/hui/lib/html5shiv.js"></script>
<script type="text/javascript" src="/Public/Admin/hui/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/Admin/hui/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/hui/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/hui/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/hui/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/hui/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/Public/Admin/hui/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>我的桌面</title>
</head>
<body>
<div class="page-container">
	<p class="f-20 text-success"><i class="Hui-iconfont">&#xe62d;</i>欢迎回来 <span class="f-14"></span><span style="color: blue"><?php echo session('adminInfo.username');?></span></p>
	<p>登录次数：<?php echo session('adminInfo.logsum')+1;?> </p>
	<?php if(empty(session('adminInfo.logtime'))){ ?>
	<p>上次登录IP：暂无登录记录  注册时间：<?php echo session('adminInfo.addtime');?></p>
	<?php } else { ?>
	<p>上次登录IP：<?php echo session('adminInfo.logip');?>  上次登录时间：<?php echo date('Y-m-d H:i:s',session('adminInfo.logtime'));?></p>
	<?php } ?>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th colspan="7" scope="col">信息统计</th>
			</tr>
			<tr class="text-c">
				<th>统计</th>
				<th>图片库</th>
				<th>产品库</th>
				<th>用户</th>
				<th>管理员</th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<td>总数</td>
				<td>9</td>
				<td><?php echo ($GoodsCount); ?></td>
				<td><?php echo ($userCount); ?></td>
				<td><?php echo ($adminCount); ?></td>
			</tr>
		</tbody>
	</table>
	<table class="table table-border table-bordered table-bg mt-20">
		<thead>
			<tr>
				<th colspan="2" scope="col" class="Hui-iconfont Hui-iconfont-userid" style="font-size: 16px;">用户信息</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th width="30%">用户名</th>
				<td><span id="lbServerName"><?php echo session('adminInfo.username');?></span></td>
			</tr>
			<?php if(session('adminInfo.role') == '9'): ?><tr>
					<td>拥有职务</td>
					<td>Root</td>
				</tr>
				<tr>
					<td>拥有权限</td>
					<td>拥有所有权限</td>
				</tr>
			<?php else: ?>
				<tr>
					<td>拥有职务</td>
					<td><?php echo ($roleNameList); ?></td>
				</tr>
				<tr>
					<td>拥有权限</td>
					<td><?php echo ($nodeNameList); ?></td>
				</tr><?php endif; ?>
				<tr>
					<td>联系手机</td>
					<td><?php echo session('adminInfo.phone');?></td>
				</tr>
				<tr>
					<td>联系邮箱</td>
					<td><?php echo session('adminInfo.Email');?></td>
				</tr>
				<tr>
					<td>用户备注</td>
					<td><?php echo session('adminInfo.text');?></td>
				</tr>
			<!-- 服务器信息 -->
			<thead>
			<tr>
				<th colspan="2" scope="col">服务器信息</th>
			</tr>
		</thead>
			<tr>
				<td>服务器操作系统 </td>
				<td><?php echo php_uname('s');?></td>
			</tr>
			<tr>
				<td>服务器端口 </td>
				<td><?php echo getenv('SERVER_PORT');?></td>
			</tr>
			<tr>
				<td>本文件所在文件夹 </td>
				<td><?php echo __FILE__;?></td>
			</tr>
			<tr>
				<td>系统所在文件夹 </td>
				<td><?php echo getenv('DOCUMENT_ROOT');?></td>
			</tr>
			<tr>
				<td>服务器当前时间 </td>
				<td><?php echo date('Y-m-d H:i:s',time());?></td>
			</tr>
			
			<tr>
				<td>当前Session数量 </td>
				<td><?php echo $str = count($_SESSION); ?></td>
			</tr>
			<tr>
				<td>当前服务器信息 </td>
				<td><?PHP echo $_SERVER ['SERVER_SOFTWARE']; ?> </td>
			</tr>
		</tbody>
	</table>
</div>
<footer class="footer mt-20">
	<div class="container">
		<p>感谢jQuery、layer、laypage、Validform、UEditor、My97DatePicker、iconfont、Datatables、WebUploaded、icheck、highcharts、bootstrap-Switch<br>
			Copyright &copy;2015-2017 H-ui.admin v3.1 All Rights Reserved.<br>
			本后台系统由<a href="http://www.h-ui.net/" target="_blank" title="H-ui前端框架">H-ui前端框架</a>提供前端技术支持</p>
	</div>
</footer>
<script type="text/javascript" src="/Public/Admin/hui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/hui/static/h-ui/js/H-ui.min.js"></script> 

</body>
</html>
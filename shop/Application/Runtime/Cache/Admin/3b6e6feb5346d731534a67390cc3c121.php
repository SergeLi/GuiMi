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
<title>分类列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 分类管理 <span class="c-gray en">&gt;</span> 分类列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray">
	 	<span class="l"> <a href="javascript:;" onclick="type_delMany()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" href="javascript:;" onclick="type_add('添加顶级分类','/Admin/Type/add/','800')"><i class="Hui-iconfont">&#xe600;</i> 添加顶级分类</a> </span> 


	 	<div class="r">
	 		<span >共有数据：<strong><?php echo count($list);?></strong> 条</span>
	 		
	 		
	 	</div>

	</div>
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="7">分类列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" value="" name=""></th>
				<th width="40">ID</th>
				<th>分类名称</th>
				<th>属性</th>
				<th width="50">状态</th>
				<th width="300">描述</th>
				<th width="70">操作</th>
			</tr>
		</thead>
		<tbody>
				<?php if(empty($list)): ?><tr><td colspan="7"><center><h2>暂无数据~</h2></center></td></tr>
				<?php else: ?>
				<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr class="text-c" style="font-weight:bold">
						<td><input type="checkbox" value="" name=""></td>
						<td><?php echo ($v['id']); ?></td>
						<td style="text-align: left">
							<?php echo ($v['tname']); ?>

						</td>
						<td><?php echo ($v['attr']); ?>级分类</td>
						<td><a class="status" tid="<?php echo ($v['id']); ?>"><?=$v['status']=='2'?"<span style='color: red;'>禁用</span>":正常?></a></td>
						<td><?php echo ($v['des']); ?></td>
						<td class="f-14">
							<a title="添加子类" href="javascript:;" onclick="type_edit('添加子类','/Admin/Type/add/id/<?php echo ($v['id']); ?>/name/<?php echo ($v['name']); ?>','1')" style="text-decoration:none"><i class="Hui-iconfont">&#xe600;</i></a> 
							<a title="编辑" href="javascript:;" onclick="type_edit('角色编辑','/Admin/Type/edit/id/<?php echo ($v['id']); ?>', '1')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> 
							<a title="删除" href="javascript:;" onclick="type_del(this,<?php echo ($v['id']); ?>)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
					</tr><?php endforeach; endif; endif; ?>
			
		</tbody>
	</table>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Public/Admin/hui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/hui/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/hui/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Public/Admin/hui/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$('.status').click(function() {
	var tid = $(this).attr('tid');
	var self = $(this);
	$.ajax({
		url: '/Admin/Type/ajaxStatus',
		type: 'get',
		data: {id : tid},
		async: true,
		success: function(res) {
			alert(res);
			if (res == '禁用成功') {
				self.html("<span style='color: red;'>禁用</span>");
			} else if (res == '还原成功') {
				self.html("正常");
			}
		}
	});
});
/*顶级分类-添加*/
function type_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*分类-编辑*/
function type_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*单条分类-删除*/
function type_del(obj,id){
	layer.confirm('确认要删除吗？', function(index){
		$.ajax({
			type: 'post',
			url: '<?php echo U("ajaxDel");?>',
			data: {"id": id},
			success: function(data){
				if (data.status == 1) {					
					$(obj).parent().parent().remove();
					layer.msg('删除成功', {'icon':5, 'time':2000});
				} else if (data.status == 0) {
					alert(data.msg);
				}
			}
			
		});
		
		layer.closeAll('dialog');	
		
	});
	
}
/*批量分类-删除*/
function type_delMany()
{
	layer.confirm('确认批量删除吗？', function(index) {
		
		var checkId = $('tbody tr input[type="checkbox"]:checked').map(function() {
			return $(this).parent().next().html();
		}).get();
		var trs = $('tbody tr input[type="checkbox"]:checked').parent().parent();
		//发送AJAX
		$.ajax({
			"url": "/Admin/Type/ajaxDelMany",
			"type": 'post',
			"data": {"checkId": checkId},
			async: true,
			success: function(res) {
				if (res.status == 1) {
					trs.remove();
				} else if (res.status == 0) {
					alert(res.msg);
				}
			}

		});
		layer.closeAll('dialog');
	});
}

</script>
</body>
</html>
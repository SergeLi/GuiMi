<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
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
<title>商品</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 商品管理 <span class="c-gray en">&gt;</span> 商品列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<div class="page-container">
	<!-- 搜索的表单 -->
	<form action="<?php echo U('Goods/index');?>">
		<div class="text-c">
			<input type="text" class="input-text" style="width:100px" placeholder="price-from" id="" name="min" value="<?php echo I('get.min');?>">
			<input type="text" class="input-text" style="width:100px" placeholder="price-to" id="" name="max" value="<?php echo I('get.max');?>">
			<select name="status" class="input-text" style="width:100px;position: relative;top:2px;">
				<option value=""><span>--请选择分类--</span></option>
				<option <?php echo ($_GET['status']==1?'selected':''); ?> value="1">--新添加--</option>
				<option <?php echo ($_GET['status']==2?'selected':''); ?> value="2">--在售中--</option>
				<option <?php echo ($_GET['status']==3?'selected':''); ?> value="3">--下架--</option>
			</select>
			<input type="text" class="input-text" style="width:250px" placeholder="输入商品名称" id="" name="gname" value="<?php echo I('get.gname');?>">
			<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜商品</button>
		</div>
	</form>
	<!-- 定位结束 -->
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius lzz-del-all"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> 
			<a href="javascript:;" onclick="goods_add('添加商品','<?php echo U('Goods/add');?>','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加商品</a>
			<a href="javascript:;" onclick="goods_add('设置秒杀时间','<?php echo U('Goods/secondKill');?>','600','400')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 设置秒杀时间</a>
		</span> 
		<span class="r">共有数据：<strong><?php echo $count;?></strong> 条</span> 
	</div>
	<table class="table table-border table-bordered table-bg" style="font-weight:bold">
		<thead>
			<tr>
				<th scope="col" colspan="13">商品列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input class="lzz-all" type="checkbox" name="" value=""></th>
				<th width="30">ID</th>
				<th width="90">商品名称</th>
				<th width="190">图片</th>
				<th >品牌</th>
				<th width="40">分类</th>
				<th>价钱</th>
				<th>折扣</th>
				<th>点击量<a href="<?php echo U('Goods/index?ord=2&ac=1');?> ">↑</a><a href="<?php echo U('Goods/index?ord=1&ac=1');?>">↓</a></th>
				<th>购买量<a href="<?php echo U('Goods/index?ord=4&ac=1');?> ">↑</a><a href="<?php echo U('Goods/index?ord=3&ac=1');?>">↓</a></th>
				<th width="130">添加时间</th>
				<th width="60">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($goods)): foreach($goods as $key=>$v): ?><tr class="text-c">
					<td><input type="checkbox" value="1" name=""></td>
					<td><?php echo ($v['id']); ?></td>
					<td><?php echo ($v['gname']); ?></td>
					<td>
						<img  onclick="goods_add('修改图片','<?php echo U('Goods/editPic', ['id'=>$v['id'],'marke'=>1]);?>','800','500')" src="/Uploads<?php echo ($v['pic1']); ?>" style="height: 50px;width: 33px">
						<img  onclick="goods_add('修改图片','<?php echo U('Goods/editPic', ['id'=>$v['id'],'marke'=>2]);?>','800','500')"  src="/Uploads<?php echo ($v['pic2']); ?>" style="height: 50px;width: 33px">
						<img  onclick="goods_add('修改图片','<?php echo U('Goods/editPic', ['id'=>$v['id'],'marke'=>3]);?>','800','500')"  src="/Uploads<?php echo ($v['pic3']); ?>" style="height: 50px;width: 33px">
						<img  onclick="goods_add('修改图片','<?php echo U('Goods/editPic', ['id'=>$v['id'],'marke'=>4]);?>','800','500')"  src="/Uploads<?php echo ($v['pic4']); ?>" style="height: 50px;width: 33px">
						<img  onclick="goods_add('修改图片','<?php echo U('Goods/editPic', ['id'=>$v['id'],'marke'=>5]);?>','800','500')"  src="/Uploads<?php echo ($v['pic5']); ?>" style="height: 50px;width: 33px">
					</td>
					<td><?php echo ($v['bid']); ?></td>
					<td><?php echo ($v['tname']); ?></td>
					<td>￥<?php echo ($v['price']); ?></td>
					<td><?php echo ($v['discount']); ?>%</td>
					<td><?php echo ($v['clicknum']); ?></td>
					<td><?php echo ($v['buynum']); ?></td>
					<td><?php echo ($v['addtime']); ?></td>
					<td class="td-status"><span class="label label-success radius"><?php echo ($v['status']); ?></span></td>
					<td class="td-manage"><a style="text-decoration:none"  href="<?php echo U('Goods/detail', ['id'=>$v['id']]);?>" title="详情"><i class="Hui-iconfont">&#xe725;</i></a> <a title="编辑" href="javascript:;" onclick="goods_edit('商品编辑','<?php echo U('Goods/edit', ['id'=>$v['id']]);?>','1','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" val="<?php echo ($v['id']); ?>" href="javascript:;" onclick="admin_del(this,'1')" class="ml-5 lzz-del" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr><?php endforeach; endif; ?>
			
		</tbody>
	</table><br>
	<div class="pagination">
		<?php echo ($page); ?>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Public/Admin/hui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/hui/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/hui/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Public/Admin/hui/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/Public/Admin/hui/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/Public/Admin/hui/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
function goods_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-删除*/
function admin_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		var val = $('.lzz-del').attr('val');
		var tr = $(this).parent().parent();
		$.ajax({
			type: 'POST',
			url: "<?php echo U('Goods/del');?>",
			data: 'id='+val,
			async: true,
			success: function(data){
				// alert(data);
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

var  marke = 1; 
$('.lzz-all').click(function(){
	// 选中复选框为true，没选中为false
	console.log(marke);
	if (marke > 0) {
		$('.table tr td input[type="checkbox"]').prop('checked', true);
	} else {
		$('.table tr td input[type="checkbox"]').removeAttr("checked"); ;
	}
	marke = - marke;
});

/*管理员-编辑*/
function goods_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*管理员-停用*/
function admin_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
		$(obj).remove();
		layer.msg('已停用!',{icon: 5,time:1000});
	});
}

/*管理员-启用*/
function admin_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		layer.msg('已启用!', {icon: 6,time:1000});
	});
}

// 删除所有
$('.lzz-del-all').click(function() {
	// 找到所有选中的
	var checkId = $('.table tr td input[type="checkbox"]:checked').map(function() {
		// 获取ID
		// console.log(this, $(this).parent().next().html());
		// 返回ID
		return $(this).parent().next().html();

	}).get().join(',');
	// 发起AJAX请求
	$.get("<?php echo U('Goods/delAll');?>", {'id': checkId }, function(data) {
		if (data > 0) {
			$('.table tr td input[type="checkbox"]:checked').parent().parent().remove();
		}
	}, 'text');

});

// $('.lzz-del').click(function() {
// 	var val = $('.lzz-del').attr('val');
// 	var tr = $(this).parent().parent();
// 	$.ajax({
// 		type:'post',
// 		url:"<?php echo U('Goods/del');?>",
// 		data:'id='+val,
// 		async: true,
// 		success:function(res) {
// 			if (res) {
// 				tr.remove();
// 			}	
// 		},
// 		error: function(){
//             alert('出错鸟~~~');
//       	}
// 	});

// });

$('.pagination a,.pagination span').unwrap('<div></div>').wrap('<a class="btn btn-default"></a>');

</script>
</body>
</html>
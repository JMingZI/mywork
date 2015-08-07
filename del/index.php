<?php
	header("Content-type: text/html; charset=utf-8");
	mysql_connect('localhost','root','');
	mysql_select_db('myworks');
	$sql = 'SELECT * from myworks';
	$result = mysql_query($sql);

?>
<!DOCTYPE html>
<html>
<head>
	<title>works后台</title>
	<meta charset="utf-8" />
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<style>
	#main{
		width: 1200px;margin:0px auto;
		position: relative;
	}
	.main ul.list{
		list-style: none;
		width: 1084px;
		/*min-height: 600px;*/
		/*background: red;*/
		overflow: hidden;
		padding:0px;
		margin:20px auto;
	}
	.list li{
		float: left;
		background: #fff;
		border:1px #ccc solid;
		margin-right: 20px;
		margin-bottom: 20px;
	}
	.list li .d{
		margin: 0px;
		font-size: 12px;
		text-align: center;
	}
	.list li a{
		display: block;
		width:100%;
		height: 20px;
		margin:10px 0px;
		text-align: center;
		text-decoration: none;
		color:red;
	}
	</style>
</head>
<body>
	<div class="main" id="main">
	<?php while ($link = mysql_fetch_assoc($result)) { ?>
	<ul class="list">
	<li>
		<img src="../php/upload/<?php echo $link['img']?>" width="80px" height="50px"/>
		<p class="d"><?php echo $link['name'];?> / <?php echo $link['sort'];?></p>
		<a href="javascript:;" class="<?php echo $link['id']?>">删除</a>
	</li>
	</ul>
	<?php } ?>
	</div>
</body>
<script type="text/javascript" src="../js/jquery.js"></script>
<script>
	$('.main .list li a').click(function(){
		$.post("del.php",{ id:$(this).attr('class') },function(sta){
				alert(sta);
			});
	});
</script>
</html>
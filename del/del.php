<?php
	header("Content-type: text/html; charset=utf-8");
	mysql_connect('localhost','root','');
	mysql_select_db('myworks');
	$sql = 'DELETE from myworks where id = '.$_POST['id'];
	$result = mysql_query($sql);

	if($result)
		echo "ok";
?>
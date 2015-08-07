<!DOCTYPE html>
<html>
<head>
	<title>添加works</title>
	<meta charset="utf-8" />
  <script src="../js/jquery.js"></script>
  <script>
  function check(){
    setTimeout(function(){
      $('#desc').next('span').text('还剩'+(70-$('#desc').val().length)+'个字');
    } ,200);
  }
  </script>
</head>
<body>
	<form action="formhandle.php" method="post" enctype="multipart/form-data" >
    <input type="text" name="name" value="" placeholder="作品名字"/><br>
    <input type="text" name="url" value="" placeholder="作品网址"/><br>
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
    <input type="file" name="pic" value=""><br>
  	<textarea name="desc" id="desc" onkeyup="check()" cols="30" rows="10" placeholder="输入作品描述，大约70个字"></textarea><span style="color:red;"></span><br>
    <select name="sort">
      <option value="whole">整站</option>
      <option value="static">静态页面</option>
      <option value="home">主页</option>
    </select>
    <select name="level">
      <option value="0">默认显示等级0</option>
      <option value="1">显示等级1</option>
      <option value="2">显示等级2</option>
    </select>
    <input type="submit" value="提交" /><br>
</form>
</body>
</html>
<meta charset="utf-8">
<?php
    mysql_connect('localhost', 'root', '');
    mysql_select_db('myworks');
    //包含一个文件上传类中的上传类
    include "fileupload.class.php";
  
    $up = new fileupload;
    //设置属性(上传的位置， 大小， 类型， 名是是否要随机生成)
    $up -> set("path", "./upload/");
    $up -> set("maxsize", 2000000);
    $up -> set("allowtype", array("gif", "png", "jpg","jpeg"));
    $up -> set("israndname", false);
  
    //使用对象中的upload方法， 就可以上传文件， 方法需要传一个上传表单的名子 pic, 如果成功返回true, 失败返回false
    if($up -> upload("pic")) {
        echo '<pre>';
        //获取上传后文件名子
        var_dump($up->getFileName());
        $img = $up->getFileName();
        echo '</pre> 文件上传成功！接下来写入数据库！';

        $sql = "INSERT into myworks(`name`, `desc`, `img`, `time`, `sort`, `level`) values('".htmlspecialchars($_POST['name'])."', '".htmlspecialchars($_POST['desc'])."', '".$img."', '".time()."', '".$_POST['sort']."', '".$_POST['level']."')";

        // echo $sql;
        $result = mysql_query($sql);
        if($result)
            echo "<p>插入数据库成功！<a href='../'>【返回首页】</a></p>";
        else
            echo "<p>插入数据库失败！ <a href='../'>【返回首页】</a></p>";

    } else {
        echo '<pre>';
        //获取上传失败以后的错误提示
        var_dump($up->getErrorMsg());
        echo '</pre>';
    }
?>
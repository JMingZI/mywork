<?php

    mysql_connect('localhost', 'root', '');
    mysql_select_db('myworks');

    if($_POST['sort'])
        $sql = "SELECT * from myworks where sort = '".$_POST['sort']."' order by level desc,time desc";
    else
        $sql = "SELECT * from myworks order by level desc,time desc";
    $result = mysql_query($sql);

    $i = 0;
    $data = array();
    while ($link = mysql_fetch_assoc($result)) {
    	$data[$i] = array(
    			'id' => $link['id'],
    			'name' => $link['name'],
    			'desc' => $link['desc'],
                'img' => $link['img'],
    			'url' => $link['url'],
    			'sort' => $link['sort'],
    			'time' => date('Y-m-d H:i', $link['time'])
    		);
    	$i = $i + 1;
    }
    echo json_encode($data);
?>
<?php
//初始化team数据表,只能是6个队伍,因为前端没做...
$team = array(
    //"id" => 'teamname'
    "1" => '队名一',
    "2" => '队名二',
    "3" => '队名三',
    "4" => '队伍四',
    "5" => '队伍五',
    "6" => '队伍六'
    );
file_put_contents('./team.json', json_encode($team));
$keys = array_keys($team);
$data = array_fill_keys($keys, array());
file_put_contents("./data.json", json_encode($data));
 ?>
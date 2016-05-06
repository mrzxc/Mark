<?php
/**
* 显示评分和评分提交
*/
class indexController
{
    function index()
    {
        $m = new Sql();
        if(TEAMID == $m->count()+1)
        {
            $config['name'] = 'thanks.html';
            $obj = new tempOut($config);
            $obj->init();
            return;
        }
        $teamArr = json_decode(file_get_contents('./team.json'), true);
        $teamname = $teamArr[TEAMID];
        $info = array(
            'id' => TEAMID+1,
            'teamname' => $teamname
            );
        $config['name'] = 'index.html';
        $obj = new tempOut($config);
        $obj->assign($info);
        $obj->init();
    }
    public function dataIn()
    {
        $grade = (int)$_POST['grade'];
        $id = $_POST['id']-1;
        $arr = array($id, $grade);
        $m = new Sql();
        echo $m->save($arr);
    }
}

 ?>
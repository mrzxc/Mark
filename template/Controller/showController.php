<?php
/**
* 显示最终结果
*/
class showController
{
    public function index()
    {
        $config = ['name' => 'last.html'];
        $out = new tempOut($config);
        $infoArr = json_decode(file_get_contents('./team.json'), true);
        $info = array(
            'team1' => $infoArr['1'],
            'team2' => $infoArr['2'],
            'team3' => $infoArr['3'],
            'team4' => $infoArr['4'],
            'team5' => $infoArr['5'],
            'team6' => $infoArr['6']
            );
        $out->assign($info);
        $out->init();
    }
    public function final()
    {
        $m = new Sql();
        $arr = $m->ave();
        $json = json_encode($arr);
        echo $json;
    }
}



 ?>
<?php
/**
* 用于模板输出
*/
class tempOut
{

    public $config = array(
        'name' => '',
        );
    private $info = array();


    function __construct ($config = array())
    {
        foreach ($config as $key => $value) {
            if (array_key_exists($key, $this->config)) {
                $this->config[$key] = $value;
            }
        }
    }
    public function assign($arr=array())
    {
        $this->info = $arr;
    }
    public function init()
    {
        $content = file_get_contents('./View/'.$this->config['name']);
        if($content === false) die('读取文件失败');
        $pattern = array();
        $replacement = array();
        foreach ($this->info as $key => $value) {
            $pattern[] = "/\{\\$".$key."\}/";
            $replacement[] = $value;
        }
        $content = preg_replace($pattern, $replacement, $content);
        echo $content;
    }
}




 ?>
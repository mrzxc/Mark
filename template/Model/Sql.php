<?php
/**
* 评分数据转为json保存
*/
class Sql
{
    private $filename = 'data.json';
    public function save($data)
    {
        $pre_data = file_get_contents($this->filename);

        $arr = json_decode($pre_data, true);
        if (!array_key_exists($data[0], $arr)) {
            return false;
        }
        $arr[$data[0]][] = $data[1];
        $json = json_encode($arr);
        if (!file_put_contents($this->filename, $json)){
            return 0;
        }
        return 1;
    }
    public function count()
    {
        $arr = json_decode(file_get_contents($this->filename), true);
        return count($arr);
    }
    public function ave()
    {
        $pre_data = file_get_contents($this->filename);
        $arr = json_decode($pre_data, true);
        foreach ($arr as $key => $value) {
            if (count($value) == 0) {
                $re[] = 0;
                continue;
            }
            $re[] = round(array_sum($value)/count($value), 1);
        }
        return $re;
    }
}

 ?>
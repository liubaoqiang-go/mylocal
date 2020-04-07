<?php
/**
 * Created by PhpStorm.
 * User: liubaoqiang
 * Date: 2020-04-06
 * Time: 14:23
 */

function sort1($num)
{
    $first  = 1;
    $second = 1;
    if($num <=2){
        return $first + $second;
    }elseif ($num<=1){
        return $first;
    }

    $arr = [$first,$second];
    for($i=2;$i<=$num;$i++){
        $arr[$i] = $arr[$i-1] +$arr[$i-2];
    }

//    for($i=2;$i<=$num;$i++){
//        $finish = array_slice($arr,-1,1);
//        $finish2 = array_slice($arr,-2,1);
//        $res = $finish[0]+$finish2[0];
//        $arr[$i] = $res;
//        //print_r($arr);
//    }


    return $arr;
}

$res = sort1(30);
print_r($res);



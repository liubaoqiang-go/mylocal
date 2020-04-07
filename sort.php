<?php
/**
 * Created by PhpStorm.
 * User: liubaoqiang
 * Date: 2020-04-03
 * Time: 18:37
 */

// 定义一个随机的数组
//$a = array(23,15,43,25,54,2,6,82,11,5,21,32,65);
//
//// 第一层可以理解为从数组中键为0开始循环到最后一个
//for ($i = 0; $i < count($a) ; $i++) {
//    //第二层为从$i+1的地方循环到数组最后
//    for ($j = $i+1; $j < count($a); $j++) {
//        // 比较数组中两个相邻值的大小
//        if ($a[$i] > $a[$j]) {
//            $tem = $a[$i]; // 这里临时变量，存贮$i的值
//            $a[$i] = $a[$j]; // 第一次更换位置
//            $a[$j] = $tem; // 完成位置互换
//        }
//    }
//}
//
//echo '<pre>';
//    print_r($a);
//echo '</pre>';

//PHP冒泡排序代码
$arr = array(1,2,4,6,8,32,46,12,19,9);

for($i=0;$i< count($arr);$i++){
    for ($j = $i+1;$j<count($arr);$j++){
        if($arr[$i] > $arr[$j]){
            $temp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $temp;
        }
    }
}
//print_r($arr);

//php快速排序的代码


//$a = array(2,13,42,34,56,23,67,365,87665,54,68,3);

//function quick_sort($a)
//{
//    // 判断是否需要运行，因下面已拿出一个中间值，这里<=1
//    if (count($a) <= 1) {
//        return $a;
//    }
//
//    $middle = $a[0]; // 中间值
//
//    $left = array(); // 接收小于中间值
//    $right = array();// 接收大于中间值
//
//    // 循环比较
//    for ($i=1; $i < count($a); $i++) {
//
//        if ($middle < $a[$i]) {
//            // 大于中间值
//            $right[] = $a[$i];
//        } else {
//            // 小于中间值
//            $left[] = $a[$i];
//        }
//    }
//
//    // 递归排序划分好的2边
//    $left = quick_sort($left);
//    $right = quick_sort($right);
//
//    // 合并排序后的数据，别忘了合并中间值
//    return array_merge($left, array($middle), $right);
//}

//print_r(quick_sort($a));


$array = array(2,13,42,34,56,23,67,365,87665,54,68,3);

//快速排序的方法，我们是用递归

//第一步，需要在数组中选出一个比较的数，一般取数组的第一个数
//第二步，定义两个数组，分别存放比较后数的归属，一般是比目标值小的放到左边，比目标值大的放到右边
//第三步，将目标值进行比较，结合第二步的两个空数组进行存放,循环的时候必须是要从数组的下表的1开始
//第四步，使用递归的方法，分别将我们定义的两个左数组和右数组进行递归运算
//第五步，将递归的数据进行拼接，从左到右的方式，从大到小，或者从小到大都行


function sort_kuaishu($arr = array())
{
    $count = count($arr);
    if($count <= 1){
        return $arr;
    }

    $middle = $arr[0];
    $left = [];
    $right = [];

    for ($i=1;$i<$count;$i++){
        if($middle < $arr[$i]){
            $right[] = $arr[$i];
        }else{
            $left[] = $arr[$i];
        }
    }
    $left = sort_kuaishu($left);
    $right = sort_kuaishu($right);

    return array_merge($left,array($middle),$right);
}

$res = sort_kuaishu($array);
print_r($res);


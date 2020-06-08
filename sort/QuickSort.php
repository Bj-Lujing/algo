<?php
/** 
 * 快速排序(Quick Sort)
 * 时间复杂度O(nlogn) 空间复杂度O(1) 
 * 原地排序算法 非稳定算法
 * 
 * @author      Ada.Lu
 * @version     
*/ 

// 例子
// $arr = [6,11,3,9,8];
// quick_sort($arr, 0, count($arr)-1);
// var_dump($arr);

/**  
 * 快速排序（分治思想，递归实现）
 * 
 * @access public 
 * @param   array     $arr  需要排序数组数据
 * @param   int       $p    数组元素索引
 * @param   int       $r    数组元素索引
 * @return  void      无返回值
*/
function quick_sort(&$arr, $p, $r) {
    if ($p >= $r) return ;
    // 获取分区元素索引
    $q = partition($arr, $p, $r);
    // 分治递归
    quick_sort($arr, $p, $q-1);
    quick_sort($arr, $q+1, $r);
}

/**  
 * 获取分区元素索引
 * 
 * @access public 
 * @param   array     $arr  需要排序数组数据
 * @param   int       $p    数组元素索引
 * @param   int       $r    数组元素索引
 * @return  int       $i    返回分区元素索引
*/
function partition(&$arr, $p, $r) {
    $i = $p;
    $pivot = $arr[$r];
    for ($j = $p; $j <= $r-1; $j++) {
        if ($arr[$j] < $pivot) {
            sawp($arr, $i, $j);
            $i++;
        }
    }
    sawp($arr, $i, $j);
    return $i;
}

/**  
 * 交换
 * 
 * @access public 
 * @param   array     $arr  需要交换数组数据
 * @param   int       $p    数组元素索引
 * @param   int       $r    数组元素索引
 * @return  void      无返回值
*/
function sawp(&$arr, $i, $j){
    $tmp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $tmp;
}
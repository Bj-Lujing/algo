<?php
/** 
 * 归并排序(Moerge Sort)
 * 时间复杂度O(nlogn) 空间复杂度O(n) 
 * 非原地排序算法 是稳定算法
 * 
 * @author      Ada.Lu
 * @version     
*/ 

// 例子
// $arr = [11,8,3,9,7,1,2,5];
// merge_sort($arr, 0, count($arr) - 1);
// var_dump($arr);

/**  
 * 归并排序（分治思想，递归实现）
 * 
 * @access public 
 * @param   array     $arr  需要排序数组数据
 * @param   int       $p    数组元素索引
 * @param   int       $r    数组元素索引
 * @return  void      无返回值
*/
function merge_sort(&$arr, $p, $r){
    if ($p >= $r) {
        return ;
    }
    // 找到中间元素索引
    $q = floor(($p + $r) / 2);
    // 分治递归
    merge_sort($arr, $p, $q);
    merge_sort($arr, $q+1, $r);
    // 排序后合并到arr数组
    merge($arr, $p, $q, $r);
}

/**  
 * 排序后合并
 * 
 * @access public 
 * @param   array     $arr  需要排序数组数据
 * @param   int       $p    数组元素索引
 * @param   int       $r    数组元素索引
 * @return  void      无返回值
*/
function merge(&$arr, $p, $q, $r){
    $i = $p;
    $j = $q + 1;
    $k = 0;
    $tmp = [];
    while ($i <= $q && $j <= $r) {
        if ($arr[$i] <= $arr[$j]) {
            $tmp[$k++] = $arr[$i++];
        }else {
            $tmp[$k++] = $arr[$j++];
        }
    }

    // 判断哪个子数组中有剩余的数据
    $start = $i;
    $end = $q;
    if ($j <= $r){
        $start = $j;
        $end = $r;
    }

    // 将剩余的数据拷贝到临时数组tmp
    while ($start <= $end) {
        $tmp[$k++] = $arr[$start++];
    }

    // 将tmp中的数组复制到$arr
    for ($i = 0; $i <= $r - $p; $i++) {
        $arr[$p + $i] = $tmp[$i];
    }
}
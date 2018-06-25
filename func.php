<?php
/**
 * Created by PhpStorm.
 * User: stepf
 * Date: 2018/06/06
 * Time: 13:09
 */

/**
 *  isNumBetween
 *  param1  $num1(int)
 *  param2  $num2(int)
 *  param3  $num3(int)
 *
 *  return  bool
 *
 *  param1がparam2とparam3の間であればtrue,そうでなければfalseを返す。
 */
function isNumBetween($num1, $num2, $num3)
{
    if (min($num2, $num3) <= $num1 && $num1 <= max($num2, $num3)) {
        return true;
    }
    return false;
}

/**
 *  isLengthBetween
 *  param1  $num1(int)
 *  param2  $num2(int)
 *  param3  $num3(int)
 *
 *  return  bool
 *
 *  param1の桁数がparam2とparam3の間であればtrue,そうでなければfalseを返す。
 */
function isLengthBetween($num1, $num2, $num3)
{
    return isNumBetween(strlen($num1), $num2, $num3);
}

/**
 *  h
 *  param1  $str(string)
 *
 *  return  string
 *
 *  param1からhtmlの特殊文字を変換した文字列を返す。
 */

function h($str){
    return htmlspecialchars($str,ENT_QUOTES);
}
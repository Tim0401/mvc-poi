<?php
/**
 * Created by PhpStorm.
 * User: tsukasa
 * Date: 2018/06/26
 * Time: 1:51
 */

namespace Models;


class Top extends \Model
{
    function exec(){
        $name = $tel = $email = '';

        $error['name'] = '';
        $error['tel'] = '';
        $error['email'] = '';

        // 確認ボタン押下時
        if (isset($_POST['confirm'])) {
            //　POSTデータ入力
            if (isset($_POST['name'])) {
                $name = $_POST['name'];
            }
            if (isset($_POST['tel'])) {
                $tel = $_POST['tel'];
            }
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
            }

            // エラーチェック
            if (empty($name)) {
                $error['name'] = '名前を入力して下さい。';
            }
            if (empty($tel)) {
                $error['tel'] = '電話番号を入力して下さい。';
            } elseif (!is_numeric($tel)) {
                $error['tel'] = '電話番号に数値以外が入力されています。';
            } elseif (!isLengthBetween((string)$tel, 9, 12)) {
                $error['tel'] = '電話番号の形式が間違っています。';
            }
            if (empty($email)) {
                $error['email'] = 'メールアドレスを入力して下さい。';
            } elseif (strpos($email, '@') === false) {
                $error['email'] = 'メールアドレスの形式が間違っています。';
            }

            // エラーがあるかどうか判定
            $check_flag = true;
            foreach ($error as $val) {
                if (!empty($val)) {
                    $check_flag = false;
                    break;
                }
            }
            // 正しい場合確認画面へ
            if ($check_flag) {
                $_SESSION['name'] = $name;
                $_SESSION['tel'] = $tel;
                $_SESSION['email'] = $email;

                return false;
            }
        }
        return $error;
    }

    function done($user){

        // データ読み込み
        $filename = "data.csv";
        $data = array();
        if(file_exists($filename) && filesize($filename) > 0) {
            $handle = fopen("data.csv", "r");
            $raw = fread($handle, filesize($filename));
            fclose($handle);
            // 改行文字で配列を分割
            $strings = explode("\n", $raw);
            // 最終行の空改行を削除
            array_pop($strings);
            // コンマで分割
            foreach ($strings as $key => $var) {
                $data[] = explode(",", $var);
            }
        }
        // IDの最大値を取得
        $max_id = 0;
        foreach ($data as $val){
            if($val[0] > $max_id){
                $max_id = $val[0];
            }
        }
        $id = $max_id + 1;
        // データ追加
        $data[] = array($id,$user['name'],$user['tel'],$user['email']);

        // データ書き込み
        $handle = fopen($filename, "w");
        foreach ($data as $val) {
            $value = $val[0] . ',' . $val[1] . ',' . $val[2] . ',' . $val[3] . "\n";
            fwrite($handle, $value);
        }
        fclose($handle);

        return $data;
    }
}
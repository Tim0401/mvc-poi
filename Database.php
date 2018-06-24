<?php
/**
 * Created by PhpStorm.
 * User: tsukasa
 * Date: 2018/06/23
 * Time: 15:10
 */

class Database
{
    function __construct($user_config) {
        if($user_config)
        {
            $config = $user_config;
        }
        else {
            $config['hostname'] = 'localhost';
            $config['username'] = 'root';
            $config['password'] = '';
            $config['database'] = 'pos';
            $config['dbdriver'] = "mysql";
            $config['char_set'] = "utf8";
            $config['dbcollat'] = "utf8_general_ci";
        }

        $dsn = $config['dbdriver'].":host=".$config['hostname'].";dbname=".$config['database'].";charset=".$config['char_set'];

        try {
            $this->pdo = new PDO($dsn, $config['username'],$config['password']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch(PDOException $Exception) {
            die('エラー :' . $Exception->getMessage());
        }
    }

    function query($sql)
    {
        // select
        try {
            $stmh = $this->pdo->query($sql);
        } catch (PDOException $Exception) {
            print "エラー：" . $Exception->getMessage();
        }
        return $stmh->fetchAll();
    }
}
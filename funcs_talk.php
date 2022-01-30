<?php
//XSS対応（ echoする場所で使用！）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数：db_conn() 
//※関数を作成し、内容をreturnさせる。
//※ DBname等、今回の授業に合わせる。
function db_conn(){
    try {
        $db_name = "xxx";    //データベース名
        $db_id   = "xxx";      //アカウント名
        $db_pw   = "xxx";      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = "xxx"; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo; //ここを追記！！！
    } catch (PDOException $e) {
      exit('DBConnectError:'.$e->getMessage());
    }
}


//SQLエラー関数：sql_error($stmt)

function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:" . print_r($error, true));
}


//リダイレクト関数: redirect($file_name)

function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}
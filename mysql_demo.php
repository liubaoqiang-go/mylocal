<?php
/**
 * Created by PhpStorm.
 * User: liubaoqiang
 * Date: 2020-04-03
 * Time: 10:48
 */

//$connect = mysqli_connect("127.0.0.1",'root','qwe123','swoole',3306);
//$connect->set_charset('utf8');
//
//for($i=3;$i<10;$i++){
//    $id = $i;
//    $username = 'steven'.rand(10,100);
//    $sex = rand(0,1);
//    $age = rand(18,23);
//    $sql = "insert into user(id,username,sex,age)values('$id','$username','$sex','$age')";
//    $res = $connect->query($sql);
//    if($res){
//        echo '第'.$i.'条数据插入成功！'.PHP_EOL;
//    }
//}
//$connect->close();
$username = $_POST['username'];
$title  =   $_POST['title'];
$content=   $_POST['content'];
$time = time();

$id = 1;
try{
    $pdo = new PDO('mysql:dbname=swoole;host=127.0.0.1;port=3306','root','qwe123');
    $insert_sql = "insert into message(title,content,username,create_at)values (:title,:content,:username,:create_at)";
    //$sql = "select * from user where id=:id";
    //print($insert_sql);die;
    $stmt = $pdo->prepare($insert_sql);
    $data = [
        ':title'=>$title,
        ':content'=>$content,
        ':username'=>$username,
        ':create_at'=>$time,
    ];

    //这个为参数绑定
//    $stmt->bindParam(':title',$title,PDO::PARAM_STR);
//    $stmt->bindParam(':content',$content,PDO::PARAM_STR);
//    $stmt->bindParam(':username',$username,PDO::PARAM_STR);
//    $stmt->bindParam(':create_at',$time,PDO::PARAM_INT);

    $result  = $stmt->execute($data);
    //$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '<pre>';
        var_dump($result);
    echo '</pre>';
}catch (PDOException $exception){
    echo '错误代码为: '.$exception->getCode().PHP_EOL;
    echo '错误信息为：'.$exception->getMessage();
}

//"create table message(
//    id int unsigned not null primary key auto_increment,
//    title varchar(20) not null default '',
//    content varchar(255) not null default '',
//    create_at int unsigned not null default 0,
//    username varchar(32) not null default ''
//    key message_username(username) )engine=innodb default charset=utf8";


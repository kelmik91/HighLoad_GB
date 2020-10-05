<?php

require_once('vendor/autoload.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

$start_time = round(microtime(), 5);

for ($i=0; $i < 5; $i++) { 
	echo "Сервер работает " . $i . "<br>";
}

$stop_time = round(microtime(), 5);
$time = $stop_time - $start_time;
echo 'Время выполнения: ' . $time . "<hr>";

$start_time = round(microtime(), 5);

$host = 'localhost';
$user = 'root';
$password = 'A1q12345';
$db_name = 'skytech';

$link = new mysqli($host, $user, $password, $db_name);
$stmt = $link->prepare("SELECT count(*) FROM b_sale_basket");
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();
echo 'Результат запроса БД: ' . $row["count(*)"] . "<hr>";

$stop_time = round(microtime(), 5);
$time = $stop_time - $start_time;
echo 'Время выполнения БД: ' . $time . "<hr>"; //Время выполнения БД: 0.08628

$start_time = round(microtime(), 5);

$redis = new redisCacheProvider;
$redis->clear();
$redis->set("key", $row["count(*)"], 100);
echo "Результат запроса Redis: " . $redis->get("key") . "<hr>";

$stop_time = round(microtime(), 5);
$time = $stop_time - $start_time;
echo 'Время выполнения Redis: ' . $time . "<hr>"; //Время выполнения Redis: 0.00058999999999998

class redisCacheProvider {
	private $redis_server = 'localhost';
	private $redis_port = 6379;
    private $connection = null;
    private function getConnection(){
        if($this->connection===null){
            $this->connection = new Redis();
            $this->connection->connect($this->redis_server, $this->redis_port);
        }
        return $this->connection;
    }

    public function get($key){
        $result = false;
        if($c = $this->getConnection()){
            $result = unserialize($c->get($key));
        }
        return $result;
    }
    public function set($key, $value, $time=0){
        if($c=$this->getConnection()){
            $c->set($key, serialize($value), $time);
        }
    }

    public function del($key){
        if($c=$this->getConnection()){
            $c->delete($key);
        }
    }

    public function clear(){
        if($c=$this->getConnection()){
            $c->flushDB();
        }
    }
}
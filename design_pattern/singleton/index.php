<?php

include 'Singleton.php';

//ֱ��new�����e����阋�캯����˽�е�
//$singleton = new Singleton;
//$instance = $singleton->getInstance();
$instance = Singleton::getInstance();
$instance->test();
var_dump($instance);

exit;

$instance = $singleton->getInstance2();

var_dump($instance);

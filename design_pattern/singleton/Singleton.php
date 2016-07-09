<?php

class Singleton
{
	//�����o�B�����CΨһ���������x��˽�ã���ֹ�ⲿ�L����
	private static $uniqueInstance;
	
	
	//���캯��˽�У���ֹ�ⲿ������
	private function __construct(){
		echo 'this is construct'."<br>";
	}
	
	/**
	 * ���x���o�B�������ⲿ�{�á�
	 * ������o�B���ⲿֻ�܌����������{�á������캯����˽�У��ⲿ�o����������
	 */
	public static function getInstance()
	{
		if(!self::$uniqueInstance){
			self::$uniqueInstance = new Singleton;
		}
		return self::$uniqueInstance;
		
	}
	
	public function test()
	{
		echo 'this is test'."<br>";
	}
	
	
}





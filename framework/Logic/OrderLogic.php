<?php
require_once 'BaseLogic.php';
require_once BASE_PATH.'/include/Subject.php';
require_once 'SmsLogic.php';
require_once 'CouponLogic.php';
/**
 * 訂單邏輯類
 * @author ntlee
 * @version 2016-12-19
 */
class OrderLogic extends BaseLogic implements Subject
{
	private $observers = array();
	public function registerObserver(Observer $observer)
	{
		if(!in_array($observer, $this->observers)){
			$this->observers[] = $observer;
		}
	}
	
	public function deleteObserver(Observer $observer)
	{
	
	}
	
	public function notify()
	{
		foreach($this->observers as $observer){
			$observer->update();
		}
	}
	
	public function useObserver()
	{
		$smsLogic = new SmsLogic();
		$this->registerObserver($smsLogic);
		
		$couponLogic = new CouponLogic();
		$this->registerObserver($couponLogic);
		
		$this->notify();
	}
}



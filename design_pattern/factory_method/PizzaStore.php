<?php

abstract class PizzaStore
{
	
	public function orderPizza($type)
	{
		/* include_once 'SimplePizzaFactory.php';
		
		$factory = new SimplePizzaFactory;
		$pizza = $factory->createPizza($type); */
		
		//��ǰ�{�ú��ι��S�턓�����󣬬F���{����턓��
		$pizza = $this->createPizza($type);
		
		$pizza->prepare();
		$pizza->bake();
		
		return $pizza;
	}
	
	abstract public function createPizza($type);
	
}
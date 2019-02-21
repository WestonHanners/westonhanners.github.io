<?php

namespace Phile\Plugin\Kronusdark\PageCount;

class Plugin extends \Phile\Plugin\AbstractPlugin implements \Phile\Gateway\EventObserverInterface 
{ 

	public function __construct() 
	{
		\Phile\Event::registerEvent('template_engine_registered', $this);
	}

	public function pageViews() {
		$storage = \Phile\ServiceLocator::getService('Phile_Data_Persistence');
		$pageViews = 0;

		if ($storage->has($_SERVER['REQUEST_URI'])) {
			$pageViews = $storage->get($_SERVER['REQUEST_URI']);
		}

		$storage->set($_SERVER['REQUEST_URI'], $pageViews);

		return "{$pageViews}";
	}

	public function incrementPageViews() {
		$storage = \Phile\ServiceLocator::getService('Phile_Data_Persistence');
		$pageViews = 0;

		if ($storage->has($_SERVER['REQUEST_URI'])) {
			$pageViews = $storage->get($_SERVER['REQUEST_URI']);
		}

		$pageViews += 1;

		$storage->set($_SERVER['REQUEST_URI'], $pageViews);
	}
    	
	public function on($eventKey, $data = null): void
	{
		if ($eventKey == 'template_engine_registered') 
		{
			$pageViews = new \Twig_SimpleFunction('pageViews', array($this, 'pageViews'));
			$incrementPageViews = new \Twig_SimpleFunction('incrementPageViews', array($this, 'incrementPageViews'));

			$data['engine']->addFunction($pageViews);
			$data['engine']->addFunction($incrementPageViews);
		}
	}

}
?>
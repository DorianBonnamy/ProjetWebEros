<?php

namespace DUT\Controllers;
use DUT\Services\SessionStorage;
use Symfony\Component\HttpFoundation\Response;

class ItemController{
	private $tab;
	private $storage;
	public function __construct(){
		$this->tab=['Bonjour', 'comment', 'vas', 'tu', '?'];
		$this->storage=new SessionStorage();
	}

	public function indexAction(){
		foreach($this->tab as $element){
		$this->storage->addElement($element);
		}
		$html='<ul>';
		foreach($this->storage->getElements() as $tableau){
			$html .='<li>'.$tableau.'</li>';
		}	
		$html .= '</ul>';
		return new Response($html);
	}
}
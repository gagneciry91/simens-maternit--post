<?php
namespace Maternite\Model;

class RangCpon {
	public $un;
	public $deux;
	public $trois;
	public $id_cons;
	
	
	public function exchangeArray($data) {
		$this->id_cons = (! empty ( $data ['ID_CONS'] )) ? $data ['ID_CONS'] : null;
		
		$this->un = (! empty ( $data ['UN'] )) ? $data ['UN'] : null;
		$this->deux = (! empty ( $data ['DEUX'] )) ? $data ['DEUX'] : null;
		$this->trois = (! empty ( $data ['TROIS'] )) ? $data ['TROIS'] : null;
		
	}
}

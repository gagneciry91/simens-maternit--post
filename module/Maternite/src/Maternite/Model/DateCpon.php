<?php
namespace Maternite\Model;

class DateCpon {
	public $id_cons;
	public $j1_j3;
	public $j4_j8;
	public $j9_j16;
	public $j16_j41;
	public $j42;
	
	public function exchangeArray($data) {
		$this->id_cons = (! empty ( $data ['ID_CONS'] )) ? $data ['ID_CONS'] : null;
		
		$this->j1_j3 = (! empty ( $data ['J1_J3'] )) ? $data ['J1_J3'] : null;
		$this->j4_j8 = (! empty ( $data ['J4_J8'] )) ? $data ['J4_J8'] : null;
		$this->j9_j15 = (! empty ( $data ['J9_J15'] )) ? $data ['J8_J15'] : null;
		$this->j16_j41 = (! empty ( $data ['J16_J41'] )) ? $data ['J16_J41'] : null;
		$this->j42 = (! empty ( $data ['J42'] )) ? $data ['J42'] : null;
		
	}
}

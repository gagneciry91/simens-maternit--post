<?php

namespace Maternite\Model;

class Postnatale {
	public $numero_d_ordre;
	 public $id_admission;
	public $id_cons;
	public $id_accouchement;
	public $id_patient; 
	public $date_accouchement;
	public $deroulement_accouchement;
	public $lieu_accouchement;
<<<<<<< HEAD
	public $observation;
	
	public $parite;
	public $adresse_exacte;
	public $etat_mere; 
	
	public function exchangeArray($data) {
	    $this->numero_d_ordre = (! empty ( $data ['numero_d_ordre'] )) ? $data ['numero_d_ordre'] : null;
	    $this->deroulement_accouchement= (! empty ( $data ['deroulement_accouchement'] )) ? $data ['deroulement_accouchement'] : null;
		$this->lieu_accouchement = (! empty ( $data ['lieu_accouchement'] )) ? $data ['lieu_accouchement'] : null;
		$this->id_accouchement = (! empty ( $data ['id_accouchement'] )) ? $data ['id_accouchement'] : null;
		$this->inumero_d_ordre = (! empty ( $data ['numero_d_ordre'] )) ? $data ['numero_d_ordre'] : null;
		
		$this->id_cons = (! empty ( $data ['ID_CONS'] )) ? $data ['ID_CONS'] : null;
		$this->parite = (! empty ( $data ['parite'] )) ? $data ['parite'] : null;
=======
	/* public $id_preventions;
	public $ptme;
	public $allaitement;
	public $contraception; */
	public $observation;
	
	public $partie;
	public $adresse_exacte;
	public $etat_mere; 
	
	public function exchangeArray($data) {
	$this->numero_d_ordre = (! empty ( $data ['numero_d_ordre'] )) ? $data ['numero_d_ordre'] : null;
	    $this->date_accouchement= (! empty ( $data ['date_accouchement'] )) ? $data ['date_accouchement'] : null;
	    $this->deroulement_accouchement= (! empty ( $data ['deroulement_accouchement'] )) ? $data ['deroulement_accouchement'] : null;
		$this->lieu_accouchement = (! empty ( $data ['lieu_accouchement'] )) ? $data ['lieu_accouchement'] : null;
>>>>>>> refs/remotes/origin/master
		
		$this->observation = (! empty ( $data ['observation'] )) ? $data ['observation'] : null;		
		
		
		
		
		
		
		
		
		
		
		
		
		
	}
}
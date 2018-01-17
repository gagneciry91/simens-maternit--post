<?php
namespace Maternite\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Sql;
use Maternite\View\Helpers\DateHelper;

class PostnataleTable {
    
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	
	}

	public function getDAteAcc(){
		$adapter = $this->tableGateway->getAdapter ();
		$sql = new Sql ( $adapter );
		$select = $sql->select ();
		$select->columns ( array (
				'date_accouchement'
		) );
		$select->from ( array (
				'pos' => 'postnatale'
		) );
		$select->order ( 'pos.id_accouchement ASC' );
		$stat = $sql->prepareStatementForSqlObject ( $select );
		$result = $stat->execute();
		$variable =array();$i=1;
		foreach ($result as $r){
			$variable[$i] = $r['date_accouchement'];$i++;
			}
			return $variable;
			}
				
	
	public function getLesPostnatale($monthToday,$yearToday) {
			
		$today = new \DateTime ();
		$dateToday = $today->format ( 'Y-m-d' );
		//list($yearToday,$monthToday, $dayToday) = explode('-', $dateToday);
		$dates=array();
		$date=$this->getDAteAcc();
		$month=array();
		for($i=1;$i<=count($date);$i++){
			list($year[$i],$month[$i], $day[$i]) = explode('-', $date[$i]);
			if(($month[$i]==$monthToday)&&($year[$i]==$yearToday)){
				$dates[$i]=$date[$i];
			}
		}
		return $dates;
	}
	public function getPostnatale($id_cons) {
		//var_dump('test');exit();
		$adapter = $this->tableGateway->getAdapter ();
		$sql = new Sql ( $adapter );
		$select = $sql->select ();
		$select->columns ( array (
				'*'
		) );
		$select->from ( array (
				'pos' => 'postnatale'
		) );
	
		$select->where ( array (
				'pos.id_cons' => $id_cons
		) );
		$select->order ( 'pos.id_accouchement ASC' );
	
		$stat = $sql->prepareStatementForSqlObject ( $select );
		$result = $stat->execute()->current();
	
		return $result;
	}
	

	public function updatePostnatale($donnees,$id_accouchement) {
	
		$Control = new DateHelper();
		 
		$this->tableGateway->delete ( array (
				'id_cons' => $donnees ['id_cons'],
	
		) );
		$date_accouchement = $donnees['date_accouchement'];
		if($date_accouchement){ $date_accouchement = $Control->convertDateInAnglais($date_accouchement); }else{ $date_accouchement = null;}
			
		if( $donnees['type_accouchement']!=0){
			$dataac = array (
					'id_cons' => $donnees ['id_cons'],
					'id_admission'=>$donnees['id_admission'],
					'id_accouchement'=>$id_accouchement,
					'id_type' => $donnees['type_accouchement'],
					//'motif_type' => $donnees['motif_type'],
					'date_accouchement' => $date_accouchement,
					'lieu_accouchement' => $donnees['lieu_accouchement'],
					'partie' => $donnees['partie'],
					'rang_cpon' => $donnees['rang_cpon'],
					'etat_de_la_mere' => $donnees['etat_de_la_mere'],
					
					'transfusion' => $donnees['transfusion'],
					'note_delivrance' => $donnees['note_delivrance'],
					'note_hemorragie' => $donnees['note_hemorragie'],
					'observation' => $donnees['observation'],
					
			);//var_dump($dataac);exit();
	
			return $this->tableGateway->getLastInsertValue($this->tableGateway->insert ( $dataac ));
		}
	}
	
}
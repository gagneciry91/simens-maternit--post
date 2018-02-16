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
		$select->order ( 'pos.id_postnatale ASC' );
	
		$stat = $sql->prepareStatementForSqlObject ( $select );
		$result = $stat->execute()->current();
	
		return $result;
	}
	



	public function updatePostnatale($values) {
	
		//var_dump('test');exit();
	
		$Control = new DateHelper();
			
		$donnees = array (
				'ID_CONS' => $values['ID_CONS'],
				'etat_de_la_mere' => $values['etat_de_la_mere'],
				'parite' => $values['parite'],
				
				'type_accouchement' => $values['type_accouchement'],
				'lieu_accouchement' => $values['lieu_accouchement'],
				'numero_d_ordre' => $values['numero_d_ordre'],
		); // var_dump($donnees);exit();
		$this->tableGateway->insert ( $donnees );
	
		//var_dump('test');exit();
	}
	
}
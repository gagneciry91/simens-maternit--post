<?php

namespace Maternite\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;

use Zend\XmlRpc\Value\String;
use Doctrine\Tests\Common\Annotations\Null;
use Maternite\View\Helpers\DateHelper;

class RangCponTable {
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	
	
	public function updateAllaitement($values) {
	
		//var_dump('test');exit();
	
			
		$donnees = array (
				'ID_CONS' => $values['ID_CONS'],
	
				'AME' => $values['AME'],
				'AUTRES' => $values['AUTRES'],
		); //var_dump($donnees);exit();
		$this->tableGateway->insert ( $donnees );
	
		var_dump('test');exit();
	}
	
	public function getDateCpon($id) {
		var_dump('test');exit();
		$rowset = $this->tableGateway->select ( array (
				'ID_CONS' => $id 
		) );		var_dump('test');exit();
				
		$row = $rowset->current ();		
		
		if (! $row) {
			// throw new \Exception ( "Could not find row $id" );
			return $row;
		}
		return $row;
	}


	public function updateRangCpon($values) {
		
	    //var_dump('test');exit();
		
			
		$donnees = array (
				'ID_CONS' => $values['ID_CONS'],
				'UN' => $values['UN'],
				'DEUX' => $values['DEUX'],
				'TROIS' => $values['TROIS'],
						); //var_dump($donnees);exit();
		 $this->tableGateway->insert ( $donnees );
		
				//var_dump('test');exit();
		}		
	}
	


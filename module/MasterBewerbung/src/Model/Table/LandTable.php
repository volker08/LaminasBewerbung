<?php

declare(strict_types=1);

namespace MasterBewerbung\Model\Table;

use Laminas\Db\Adapter\Adapter;
use Laminas\Db\TableGateway\AbstractTableGateway;


class LandTable extends AbstractTableGateway
{
   protected $adapter;
   protected $table = 'Land';

   public function __construct(Adapter $adapter)
   {
   	$this->adapter = $adapter;
   	$this->initialize();
   }
   
   public function getAllLaender()
   {
        $sqlQuery = $this->sql->select();
        $sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);
        $handler = $sqlStmt->execute();
   	
   	$row = [];
   	
   
        foreach($handler as $tuple){
   	   	$row[$tuple['idLand']] = $tuple['Land'];
   	    
   	 }
   	 return $row;
   }
   
   
   
}

<?php 

declare(strict_types=1);

namespace MasterBewerbung\Model\Table;

use Laminas\Db\Adapter\Adapter;
use Laminas\Db\TableGateway\AbstractTableGateway;


class BewerberTable extends AbstractTableGateway
{
    protected $adapter;
    protected $table = 'Bewerber';
    
     public function __construct(Adapter $adapter)
   {
   	$this->adapter = $adapter;
   	$this->initialize();
   }
   

   
    public function generateIdBewerbungscode(){
    
    	$code = '';
	$chars = 'QWERTZUIOPASDFGHJKLYXCVBNMqwertzuiopasdfghjklyxcvbnm1234567890';
	
	for($i = 0; $i < 20; $i++) {
	
		$random = rand(0,strlen($chars) - 1);
		$code .= substr($chars, $random, 1);
	}
	
	return $code;
    }
    
     /**
     * Return a set of all Bewerber
     *
     * @return Bewerber[]
     */
    public function findAllBewerber(){
    
    	$sqlQuery = $this->sql->select();
    	$sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);
    	
    	return $sqlStmt->execute()->current();
    }
    
     /**
     * Return a single Bewerber.
     *
     * @param  int $idBewerbungscode Identifier of the post to return.
     * @return Bewerber bewerber with the corresponding ID or null if not found in database
     */
    public function findBewerber($idBewerbungscode){
    	$sqlQuery = $this->sql->select()->where(['idBewerbungsCode' => $idBewerbungsCode]);
    	$sqlStmt = $this ->sql->prepareStatementForSqlObject($sqlQuery);
    	
    	return $sqlStmt->execute()->current();
    }
    
    public function createBewerber(array $data){
    
    	$values = [
    	   'idBewerbungsCode' => $data['idBewerbungsCode'],
    	   'idSemester' => $data['idSemester'],
    	   'KuerzelStudiengang' => $data['Kuerzelstudiengang'],
    	   'Geschlecht' => $data['Geschlecht'],
    	   'Vorname' => $data['Vorname'],
    	   'Nachname' => $data['Nachname'],
    	   'Straße' => $data['Straße'],
    	   'Hausnummer' => $data['Hausnummer'],
    	   'PLZ' => $data['PLZ'],
    	   'Ort' => $data['Ort'],
    	   'Land' => $data['Land'],
    	   'Geburtsdatum' => $data['Geburtsdatum'],
    	   'Email' => $data['Email'],
    	   'LetzteHochschule' => $data['LetzteHochschule'],
    	   'LetzteHochschulart' => $data['LetzteHochschulart'],
    	   'Studiengang' => $data['Studiengang'],
    	   'Abschluss' => $data['Abschluss'],
    	   'AbschlussNote' => $data['AbschlussNote'],
    	   'Hinweise' => $data['Hinweise'],
    	   'Praktika' => $data['Praktika'],
    	   'Berufserfahrung' => $data['Berufserfahrung']
        ];
        
        $sqlQuery = $this->sql->insert()->values($values);
        $sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);
        
        return $sqlStmt->execute();
    
    }
    
     public function updateBewerber($bewerber)
     {
     
     }
     
     public function getBewerbungsfrist()
     {
     	return date("31.01.2022");
     }
    
}

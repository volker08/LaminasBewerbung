<?php
namespace MasterBewerbung\Model;

use DomainException;
use Laminas\Filter\StringTrim;
use Laminas\Filter\StripTags;
use Laminas\Filter\ToInt;
use Laminas\InputFilter\InputFilter;
use Laminas\InputFilter\InputFilterAwareInterface;
use Laminas\InputFilter\InputFilterInterface;
use Laminas\Validator\StringLength;

class Land
{	
	/**
	* @var string
	*/
	private $idLand;
	
	/**
	* @var string
	*/
	private $land;

	public function __construct($idLand, $land)
	{
		$this->idLand = $idLand;
		$this->land = $land;
	}
	
	public function getIdLand()
	{
		return $this->idLand;
	}
	
	public function getLand()
	{
		return $this->land;
	}
	
}

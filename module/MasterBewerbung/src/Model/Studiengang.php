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

class Studiengang
{	
	/**
	* @var string
	*/
	private $studiengang_de;
	
	/**
	* @var string
	*/
	private $kuerzel;
	
	/**
	* @var string
	*/
	private $studiengang_en;


	public function __construct($studiengang_de, $studiengang_en, $kuerzel)
	{
		$this->studiengang_de = $studiengang_de;
		$this->studiengang_en = $studiengang_en;
		$this->kuerzel = $kuerzel;
	}
	
	public function getStudiengang_DE()
	{
		return $this->studiengang_de;
	}
	
	public function getStudiengang_EN()
	{
		return $this->studiengang_en;
	}
	
	public function getKuerzel()
	{
		return $this->kuerzel;
	}
	
}

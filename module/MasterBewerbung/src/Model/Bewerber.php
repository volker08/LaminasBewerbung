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
use Laminas\Validator;
use Laminas\Validator\NotEmpty;
use Laminas\I18n\Filter\NumberFormat;

class Bewerber implements InputFilterAwareInterface
{
	/**
	* @var int
	*/
	private $idBewerbungscode;
	/**
	* @var string
	*/
	private $kuerzelStudiengang;
	/**
	* @var string
	*/
	private $idSemester;
	/**
	* @var string
	*/
	private $schwerpunktId;
	/**
	* @var string
	*/
	public $geschlecht;
	/**
	* @var string
	*/
	private $vorname;
	/**
	* @var string
	*/
	private $nachname;
	/**
	* @var string
	*/
	private $strasse;
	/**
	* @var int
	*/
	private $hausnummer;
	/**
	* @var int
	*/
	private $plz;
	/**
	* @var string
	*/
	private $ort;
	/**
	* @var string
	*/
	private $idLand;
	/**
	* @var date
	*/
	private $geburtsdatum;
	/**
	* @var string
	*/
	private $email;
	/**
	* @var string
	*/
	private $letzteHochschule;
	/**
	* @var string
	*/
	private $letzteHochschulart;
	/**
	* @var string
	*/
	private $studiengang;
	/**
	* @var string
	*/
	private $abschluss;
	/**
	* @var float
	*/
	private $abschlussnote;
	/**
	* @var int
	*/
	private $erreichteCredits;
	/**
	* @var string
	*/
	private $internationalStudent;
	/**
	* @var float
	*/
	private $abschlussnoteBerechnet;
	/**
	* @var float
	*/
	private $maxNote;
	/**
	* @var float
	*/
	private $minNote;
	/**
	* @var string
	*/
	private $praktika;
	/**
	* @var string
	*/
	private $berufserfahrung;
	/**
	* @var string
	*/
	private $hinweise;
	/**
	* @var date
	*/
	private $erstellung;
	/**
	* @var date
	*/
	private $modifikation;
	/**
	* @var boolean
	*/
	private $abgeschickt;
	/**
	* @var boolean
	*/
	private $versandfreigabe;
	/**
	* @var boolean
	*/
	private $status;
	/**
	* @var boolean
	*/
	private $unterlagenEingang;
		
	
    	private $inputFilter;


	public function __construct()
	{
		
	}
	
	public function exchangeArray(array $data)
	{	
		$this->idBewerbungscode = !empty($data['idBewerbungscode']) ? $data['idBewerbungscode'] : null;
		$this->kuerzelStudiengang = !empty($data['kuerzelStudiengang']) ? $data['kuerzelStudiengang'] : null;
		$this->idSemester = !empty($data['idSemester']) ? $data['idSemester'] : null;
		$this->schwerpunktId = !empty($data['schwerpunktId']) ? $data['schwerpunktId'] : null;
		$this->geschlecht = !empty($data['geschlecht']) ? $data['geschlecht'] : null;
		$this->vorname = !empty($data['vorname']) ? $data['vorname'] : null;
		$this->nachname = !empty($data['nachname']) ? $data['nachname'] : null;
		$this->strasse = !empty($data['strasse']) ? $data['strasse'] : null;
		$this->hausnummer = !empty($data['hausnummer']) ? $data['hausnummer'] : null;
		$this->plz = !empty($data['plz']) ? $data['plz'] : null;
		$this->ort = !empty($data['ort']) ? $data['ort'] : null;
		$this->idLand = !empty($data['idLand']) ? $data['idLand'] : null;
		$this->geburtsdatum = !empty($data['geburtsdatum']) ? $data['geburtsdatum'] : null;
		$this->email = !empty($data['email']) ? $data['email'] : null;
		$this->letzteHochschule = !empty($data['letzteHochschule']) ? $data['letzteHochschule'] : null;
		$this->letzteHochschulart = !empty($data['letzteHochschulart']) ? $data['letzteHochschulart'] : null;
		$this->studiengang = !empty($data['studiengang']) ? $data['studiengang'] : null;
		$this->abschluss = !empty($data['abschluss']) ? $data['abschluss'] : null;
		$this->abschlussnote = !empty($data['abschlussnote']) ? $data['abschlussnote'] : null;
		$this->erreichteCredits = !empty($data['erreichteCredits']) ? $data['erreichteCredits'] : null;
		$this->internationalStudent = !empty($data['internationalStudent']) ? $data['internationalStudent'] : null;
		$this->abschlussnoteBerechnet = !empty($data['abschlussnoteBerechnet']) ? $data['abschlussnoteBerechnet'] : null;
		$this->maxNote = !empty($data['maxNote']) ? $data['maxNote'] : null;
		$this->minNote = !empty($data['minNote']) ? $data['minNote'] : null;
		$this->praktika = !empty($data['praktika']) ? $data['praktika'] : null;
		$this->berufserfahrung = !empty($data['berufserfahrung']) ? $data['berufserfahrung'] : null;
		$this->hinweise = !empty($data['hinweise']) ? $data['hinweise'] : null;
		$this->erstellung = !empty($data['erstellung']) ? $data['erstellung'] : null;
		$this->modifikation = !empty($data['modifikation']) ? $data['modifikation'] : null;
		$this->abgeschickt = !empty($data['abgeschickt']) ? $data['abgeschickt'] : null;
		$this->versandfreigabe = !empty($data['versandfreigabe']) ? $data['versandfreigabe'] : null;
		$this->status = !empty($data['status']) ? $data['status'] : null;
		$this->unterlagenEingang = !empty($data['unterlagenEingang']) ? $data['unterlagenEingang'] : null;		
	}

	public function setInputFilter(InputFilterInterface $inputFilter)
	{
	throw new DomainException(sprintf(
	    '%s does not allow injection of an alternate input filter',
	    __CLASS__
	));
	}
	
	public function getInputFilter()
	{	
		
		if ($this->inputFilter) {
		   return $this->inputFilter;
		}

		$inputFilter = new InputFilter();

		$inputFilter->add([
		    'name' => 'idBewerbungscode',
		    'required' => true,
		    'filters' => [
			['name' => ToInt::class],
		    ],
		]);
		
		$inputFilter->add([
		    'name' => 'kuerzelStudiengang',
		    'required' => true,
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		    'validators' => [
			['name' => StringLength::class,
			    'options' => [
				'encoding' => 'UTF-8',
				'min' => 1,
				'max' => 100,
			    ],
			],
		    ],
		]);

		$inputFilter->add([
		    'name' => 'idSemester',
		    'required' => true,
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		    'validators' => [
			['name' => StringLength::class,
			    'options' => [
				'encoding' => 'UTF-8',
				'min' => 1,
				'max' => 100,
			    ],
			],
		    ],
		]);
		
		$inputFilter->add([
		    'name' => 'schwerpunktId',
		    'required' => true,
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		    'validators' => [
		    	['name' => Validator\NotEmpty::class],
			['name' => StringLength::class,
			    'options' => [
				'encoding' => 'UTF-8',
				'min' => 1,
				'max' => 100,
			    ],
			],
		    ],
		]);

		$inputFilter->add([
		    'name' => 'geschlecht',
		    'required' => true,
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		    'validators' => [
			['name' => StringLength::class,
			    'options' => [
				'encoding' => 'UTF-8',
				'min' => 1,
				'max' => 100,
			    ],
			],
		    ],
		]);


		$inputFilter->add([
		    'name' => 'vorname',
		    'required' => true,
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		    'validators' => [ 
		    	['name' => Validator\NotEmpty::class],
			['name' => StringLength::class,
			    'options' => [
				'encoding' => 'UTF-8',
				'min' => 1,
				'max' => 100,
			    ],
			],
		    ],
		]);

		$inputFilter->add([
		    'name' => 'nachname',
		    'required' => true,
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		    'validators' => [
		    	['name' => Validator\NotEmpty::class],
			['name' => StringLength::class,
			    'options' => [
				'encoding' => 'UTF-8',
				'min' => 1,
				'max' => 100,
			    ],
			],
		    ],
		  ]);
		  
		  $inputFilter->add([
		    'name' => 'strasse',
		    'required' => true,
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		    'validators' => [
		    	['name' => Validator\NotEmpty::class],
			['name' => StringLength::class,
			    'options' => [
				'encoding' => 'UTF-8',
				'min' => 1,
				'max' => 100,
			    ],
			],
		    ],
		  ]);
		  
		  $inputFilter->add([
		    'name' => 'hausnummer',
		    'required' => true,
		    'filters' => [
			['name' => ToInt::class],
		    ],
		     'validators' => [
			['name' => Validator\NotEmpty::class],
			],
		  ]);
		  
		   $inputFilter->add([
		    'name' => 'plz',
		    'required' => true,
		    'filters' => [
			['name' => ToInt::class],
		    ],
		    'validators' => [
			['name' => Validator\NotEmpty::class],
			],
		  ]);
		  
		   $inputFilter->add([
		    'name' => 'ort',
		    'required' => true,
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		    'validators' => [
		    	['name' => Validator\NotEmpty::class],
			['name' => StringLength::class,
			    'options' => [
				'encoding' => 'UTF-8',
				'min' => 1,
				'max' => 128,
			    ],
			],
		    ],
		  ]);
		  
		   $inputFilter->add([
		    'name' => 'idLand',
		    'required' => true,
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		    'validators' => [
			['name' => StringLength::class,
			    'options' => [
				'encoding' => 'UTF-8',
				'min' => 1,
				'max' => 100,
			    ],
			],
		    ],
		  ]);
		  
		   $inputFilter->add([ 
		    'name' => 'geburtsdatum',
		    'required' => true,
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		    'validators' => [
			['name' => Validator\NotEmpty::class],						
			/*['name' => Validator\Date::class,
				'options' => [
				'format' => 'DD.MM.YYYY',
				],
			],TODO*/
			],
		  ]);
		  
		   $inputFilter->add([
		    'name' => 'email',
		    'required' => true,
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		    'validators' => [
			['name' => Validator\NotEmpty::class],
			['name' => Validator\StringLength::class,
				'options' => [
					'min' => 6,  
					'max' => 128,
					'messages' => [
							Validator\StringLength::TOO_SHORT => 'Email address must have at least 6 characters!',
							Validator\StringLength::TOO_LONG => 'Email address must have at most 128 characters!',
							],
					],
			],
			['name' => Validator\EmailAddress::class],
			],
		  ]);
		  
		   $inputFilter->add([
		    'name' => 'letzteHochschule',
		    'required' => true,
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		    'validators' => [
		   	 ['name' => Validator\NotEmpty::class],
			 ['name' => StringLength::class,
			    'options' => [
				'encoding' => 'UTF-8',
				'min' => 1,
				'max' => 100,
			    ],
			],
		    ],
		  ]);
		  
		   $inputFilter->add([
		    'name' => 'letzteHochschulart',
		    'required' => true,
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		    'validators' => [
			['name' => StringLength::class,
			    'options' => [
				'encoding' => 'UTF-8',
				'min' => 1,
				'max' => 100,
			    ],
			],
		    ],
		  ]);
		  
		   $inputFilter->add([
		    'name' => 'studiengang',
		    'required' => true,
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		    'validators' => [
		    	['name' => Validator\NotEmpty::class],
			['name' => StringLength::class,
			    'options' => [
				'encoding' => 'UTF-8',
				'min' => 1,
				'max' => 100,
			    ],
			],
		    ],
		  ]);
		  
		   $inputFilter->add([
		    'name' => 'abschluss',
		    'required' => true,
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		    'validators' => [
		    	['name' => Validator\NotEmpty::class],
			['name' => StringLength::class,
			    'options' => [
				'encoding' => 'UTF-8',
				'min' => 1,
				'max' => 100,
			    ],
			],
		    ],
		  ]);
		  
		   $inputFilter->add([
		    'name' => 'abschlussnote', 
		    'required' => true,
		    'filters' => [
			['name' => StripTags::class],
		
		    ],
		    'validators' => [
			['name' => StringLength::class,
			    'options' => [
				'encoding' => 'UTF-8',
				'min' => 1,
				'max' => 10000,
			    ],
			],
		    ],
		  ]);
		  
		   $inputFilter->add([
		    'name' => 'erreichteCredits',
		    'required' => true,
		    'filters' => [
			['name' => ToInt::class],
		    ],
		    'validators' => [
		    	['name' => Validator\NotEmpty::class],
		    ],
		  ]);
		  
		   $inputFilter->add([
		    'name' => 'internationalStudent',
		    'required' => true,
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		    'validators' => [
		    	['name' => Validator\NotEmpty::class],
			['name' => StringLength::class,
			    'options' => [
				'encoding' => 'UTF-8',
				'min' => 1,
				'max' => 100,
			    ],
			],
		    ],
		  ]);
		  
		   $inputFilter->add([
		    'name' => 'abschlussnoteBerechnet',
		    'required' => true,
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		    'validators' => [
		    	['name' => Validator\NotEmpty::class],
			['name' => StringLength::class,
			    'options' => [
				'encoding' => 'UTF-8',
				'min' => 1,
				'max' => 100,
			    ],
			],
		    ],
		  ]);
		  
		   $inputFilter->add([  //TODO
		    'name' => 'maxNote',
		    'required' => true,
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		    'validators' => [
		    	['name' => Validator\NotEmpty::class],
			['name' => StringLength::class,
			    'options' => [
				'encoding' => 'UTF-8',
				'min' => 1,
				'max' => 100,
			    ],
			],
		    ],
		  ]);
		  
		   $inputFilter->add([ 
		    'name' => 'minNote',
		    'required' => true,
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		    'validators' => [
		    	['name' => Validator\NotEmpty::class],
			['name' => StringLength::class,
			    'options' => [
				'encoding' => 'UTF-8',
				'min' => 1,
				'max' => 100,
			    ],
			],
		    ],
		  ]);
		  
		   $inputFilter->add([
		    'name' => 'praktika',
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		  ]);
		  
		   $inputFilter->add([
		    'name' => 'berufserfahrung',
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		  ]);
		  
		  $inputFilter->add([
		    'name' => 'hinweise',
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		  ]);
		  
		  $inputFilter->add([ 
		    'name' => 'erstellung',
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		  ]);
		  
		  $inputFilter->add([
		    'name' => 'modifikation',
		    'filters' => [
			['name' => StripTags::class],
			['name' => StringTrim::class],
		    ],
		  ]);

		$this->inputFilter = $inputFilter;
		return $this->inputFilter;
	}
	
	public function getArrayCopy()
	{
		return [
		    'idBewerbungscode'     => $this->idBewerbungscode,
		    'kuerzelStudiengang' => $this->kuerzelStudiengang,
		    'idSemester'  => $this->idSemester,
		    'schwerpunktId'  => $this->schwerpunktId,
		    'geschlecht'  => $this->geschlecht,
		    'vorname'  => $this->vorname,
		    'nachname'  => $this->nachname,
		    'strasse'  => $this->strasse,
		    'hausnummer'  => $this->hausnummer,
		    'plz'  => $this->plz,
		    'ort'  => $this->ort,
		    'idLand'  => $this->idLand,
		    'geburtsdatum'  => $this->geburtsdatum,
		    'email'  => $this->email,
		    'letzteHochschule'  => $this->letzteHochschule,
		    'letzteHochschulart'  => $this->letzteHochschulart,
		    'studiengang'  => $this->studiengang,
		    'abschluss'  => $this->abschluss,
		    'abschlussnote'  => $this->abschlussnote,
		    'erreichteCredits'  => $this->erreichteCredits,
		    'internationalStudent'  => $this->internationalStudent,
		    'abschlussnoteBerechnet'  => $this->abschlussnoteBerechnet,
		    'maxNote'  => $this->maxNote,
		    'minNote'  => $this->minNote,
		    'praktika'  => $this->praktika,
		    'berufserfahrung'  => $this->berufserfahrung,
		    'hinweise'  => $this->hinweise,
		    'erstellung'  => $this->erstellung,
		    'modifikation'  => $this->modifikation,
		    'abgeschickt'  => $this->abgeschickt,
		    'versandfreigabe'  => $this->versandfreigabe,
		    'status'  => $this->status,
		    'unterlagenEingang'  => $this->unterlagenEingang,
		];
	}
    
	public function getIdBewerbungscode()
	{
		return $this->idBewerbungscode;
	}
	
	public function getKuerzelStudiengang()
	{
		return $this->kuerzelStudiengang;
	}
	
	public function getIdSemester()
	{
		return $this->idSemester;
	}
	
	public function getSchwerpunktId()
	{
		return $this->schwerpunktId;
	}
	
	public function getGeschlecht()
	{
		return $this->geschlecht;
	}
	
	public function getVorname()
	{
		return $this->vorname;
	}
	
	public function getNachname()
	{
		return $this->nachname;
	}
	
	public function getStrasse()
	{
		return $this->strasse;
	}
	
	public function getHausnummer()
	{
		return $this->hausnummer;
	}
	
	public function getPlz()
	{
		return $this->plz;
	}
	
	public function getOrt()
	{
		return $this->ort;
	}
	
	public function getIdLand()
	{
		return $this->idLand;
	}
	
	public function getGeburtsdatum()
	{
		return $this->geburtsdatum;
	}
	public function getEmail()
	{
		return $this->email;
	}
	
	public function getLetzteHochschule()
	{
		return $this->letzteHochschule;
	}
	
	public function getLetzteHochschulart()
	{
		return $this->letzteHochschulart;
	}
	
	public function getStudiengang()
	{
		return $this->studiengang;
	}
	
	public function getAbschluss()
	{
		return $this->abschluss;
	}
	
	public function getAbschlussnote()
	{
		return $this->abschlussnote;
	}
	
	public function getErreichteCredits()
	{
		return $this->erreichteCredits;
	}
	
	public function getInternationalStudent()
	{
		return $this->internationalStudent;
	}
	
	public function getAbschlussnoteBerechnet()
	{
		return $this->abschlussnoteBerechnet;
	}
	
	public function getMaxNote()
	{
		return $this->maxNote;
	}
	
	public function getMinNote()
	{
		return $this->minNote;
	}
	
	public function getPraktika()
	{
		return $this->praktika;
	}
	
	public function getBerufserfahrung()
	{
		return $this->berufserfahrung;
	}
	
	public function getHinweise()
	{
		return $this->hinweise;
	}
	
	public function getErstellung()
	{
		return $this->erstellung;
	}
	
	public function getModifikation()
	{
		return $this->modifikation;
	}
	
	public function getAbgeschickt()
	{
		return $this->abgeschickt;
	}
	
	public function setAbgeschickt($newVal)
	{
		$this->abgeschickt = $newVal;
	}
	
	public function getVersandfreigabe()
	{
		return $this->versandfreigabe;
	}
	
	public function setVersandfreigabe($newVal)
	{
		$this->versandfreigabe = $newVal;
	}
	
	public function getStatus()
	{
		return $this->status;
	}
	
	public function setStatus($newVal)
	{
		$this->status = $newVal;
	}
	
	public function getUnterlagenEingang()
	{
		return $this->unterlagenEingang;
	}
	
	public function setUnterlagenEingang($newVal)
	{
		$this->unterlagenEingang = $newVal;
	}
}

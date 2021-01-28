<?php
namespace MasterBewerbung\Form;

use Laminas\Form\Element;
use Laminas\Form\Form;
use MasterBewerbung\Model\Table\LandTable;

class BewerbungForm extends Form
{	
	
    public function __construct(LandTable $landTable)
    {
        parent::__construct('bewerbung');
	$this->setAttribute('method', 'POST');
    	
    	$this->add([
            'name' => 'kuerzelStudiengang',
            'type' => Element\Select::class,
            'options' => [
                'label' => 'Studiengang*',
                'value_options' => [
                '0' => 'BWL',
                '1' => 'W-Info',
                ],
            ],
            'attributes' =>[
            	'required' => 'true',
            	'class' => 'form-control',
            ],  
        ]);
        
        $this->add([
            'name' => 'idSemester',
            'type' => Element\Select::class,
            'options' => [
                'label' => 'Studienbeginn*',
                'value_options' => [
                '0' => 'Wintersemester 2020/21',
                '1' => 'Sommersemester 2021',
            	],
            ],
            'attributes' =>[
            	'required' => 'true',
            	'class' => 'form-control',
            ],  
        ]);
        
        $this->add([
            'name' => 'schwerpunktId',
            'type' => Element\Select::class,
            'options' => [
                'label' => 'Schwerpunkt*',
                'value_options' => [
                '0' => 'Wirtschaftsinformatik',
                '1' => 'Immobilienwirtschaft',
                '2' => 'Wertschöpfungsmanagement',
                '3' => 'Finanzmanagement und -berichterstatt',
           	 ],
           ],
            'attributes' =>[
            	'required' => 'true',
            	'class' => 'form-control',
            	],  
        ]);
        
        $this->add([
            'name' => 'geschlecht',
            'type' => Element\Select::class,
            'options' => [
                'label' => 'Geschlecht*',
                'value_options' => [
                'w' => 'Weiblich',
                'm' => 'Männlich',
                ]
            ],
            'attributes' =>[
            	'required' => 'true',
            	'class' => 'form-control',
            ],            	
        ]);
        
        $this->add([
            'name' => 'vorname',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Vorname*',
            ],
            'attributes' =>[
            	'required' => 'true',
		'maxlength' => 128,
		'pattern' => '^[A-ZÄÖÜ][a-zäöü]+',
		'autocomplete' => false,
		'data-toggle' => 'tooltip',
		'class' => 'form-control',
		'title' => 'Bitte Vornamen angeben',
            ],
        ]);
        
        $this->add([
            'name' => 'nachname',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Nachname*',
            ],
             'attributes' =>[
            	'required' => 'true',
		'maxlength' => 128,
		'pattern' => '^[A-ZÄÖÜ][a-zäöü]+',
		'autocomplete' => false,
		'data-toggle' => 'tooltip',
		'class' => 'form-control',
		'title' => 'Bitte Nachnamen angeben',
            ],
        ]);
        
        $this->add([
            'name' => 'strasse',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Straße*',
            ],
            'attributes' =>[
            	'required' => 'true',
		'maxlength' => 128,
		'pattern' => '^[A-ZÄÖÜ][a-zäöü]+',
		'autocomplete' => false,
		'data-toggle' => 'tooltip',
		'class' => 'form-control',
		'title' => 'Bitte Straße angeben',
            ],
        ]);
        
        $this->add([
            'name' => 'hausnummer',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Hausnummer*',
            ],
            'attributes' =>[
            	'required' => 'true',
		'pattern' => '[0-9]+',
		'autocomplete' => false,
		'data-toggle' => 'tooltip',
		'class' => 'form-control',
		'title' => 'Bitte Hausnummer angeben',
            ],
            
        ]);
        
        $this->add([
            'name' => 'plz',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'PLZ*',
            ],
            'attributes' =>[
            	'required' => 'true',
		'pattern' => '^([0]{1}[1-9]{1}|[1-9]{1}[0-9]{1})[0-9]{3}$',
		'autocomplete' => false,
		'data-toggle' => 'tooltip',
		'class' => 'form-control',
		'title' => 'Bitte PLZ angeben',
            ],
        ]);
        
        $this->add([
            'name' => 'ort',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Ort*',
            ],
            'attributes' =>[
            	'required' => 'true',
		'maxlength' => 128,
		'pattern' => '^[A-ZÄÖÜ][a-zäöü]+',
		'autocomplete' => false,
		'data-toggle' => 'tooltip',
		'class' => 'form-control',
		'title' => 'Bitte Ort angeben',
            ],
        ]);       
        
        $this->add([
            'name' => 'idLand',
            'type' => Element\Select::class,
            'options' => [
                'label' => 'Land*',
                'value_options' => $landTable->getAllLaender(),
            ],
            'attributes' =>[
            	'required' => 'true',
            	'class' => 'form-control',
            ]  
        ]); 
        
        $this->add([
            'name' => 'geburtsdatum',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Geburtsdatum*',
            ],
            'attributes' =>[
            	'required' => 'true',
            	'class' => 'form-control',
            	'maxlength' => 10,
            	//Allows dates following these rules: - days may have leading zeros. 1-31. max 2 digits - months may have leading zeros. 1-12. max 2 digits - years 1900-2099. 4 digits 
            	'pattern' => '\s*(3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.((?:19|20)\d{2})\s*$', 
            ],  
        ]); 
        
        $this->add([
            'name' => 'email',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Email*',
            ],
            'attributes' => [
				'required' => true,
				'class' => 'form-control',
				'size' => 40,
				'maxlength' => 128,
				'pattern' => '^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$',
		],
        ]); 
        
        $this->add([
            'name' => 'letzteHochschule',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Letzte Hochschule*',
            ],
            'attributes' =>[
            	'required' => 'true',
		'maxlength' => 128,
		'pattern' => '^[A-ZÄÖÜ][a-zäöü]+',
		'autocomplete' => false,
		'data-toggle' => 'tooltip',
		'class' => 'form-control',
		'title' => 'Bitte letzte Hochschule angeben',
            ],
        ]); 
        
        $this->add([
            'name' => 'letzteHochschulart',
            'type' => Element\Select::class, 
            'options' => [
                'label' => 'Letzte Hochschulart*',
                'value_options' => [
                '0' => 'Universität',
                '1' => 'Technische Universität',
                '2' => 'Universität-Gesamthochschule',
                '3' => 'Fachhochschule',
                '4' => 'Hochschule für angewandte Wissenschaften',
                '5' => 'Technische Hochschule',
                '6' => 'Kunst- und Musikhochschule',
                '7' => 'Kirchliche und Theologische Hochschule',
                '8' => 'Pädagogische Hochschule',
                '9' => 'Fachspezifische Hochschule',
                '10' => 'Private Hochschulen',
                '11' => 'Verwaltungsfachhochschule',
                '12' => 'Berufsakademie/Duale Hochschule',
                '13' => 'Fernuniversität',
           	],
            ],
            'attributes' =>[
            	'required' => 'true',
            	'class' => 'form-control',
            ], 
        ]); 
        
        $this->add([
            'name' => 'studiengang',
           'type' => Element\Text::class,
            'options' => [
                'label' => 'Studiengang*',                
           ],
           'attributes' =>[
            	'required' => 'true',
		'maxlength' => 128,
		'pattern' => '^[A-ZÄÖÜ][a-zäöü]+',
		'autocomplete' => false,
		'data-toggle' => 'tooltip',
		'class' => 'form-control',
		'title' => 'Bitte Studiengang angeben',
            ],
        ]); 
       
        $this->add([
            'name' => 'abschluss',
            'type' => Element\Select::class, 
            'options' => [
                'label' => 'Abschluss*',
                'value_options' => [
                '0' => 'Bachelor',
                '1' => 'Master',
                '2' => 'Diplom',
                '3' => 'Staatsexamen',
                '4' => 'Magister',
                '5' => 'Sonstiges',
           	],
            ],
            'attributes' =>[
            	'required' => 'true',
            	'class' => 'form-control',
            ], 
        ]); 
                  
        $this->add([
            'name' => 'abschlussnote',
            'type' => Element\Select::class, 
            'options' => [
                'label' => 'Abschlussnote*',
                'value_options' => $this->generateAbschlussnoten(),
            ],
            'attributes' =>[
            	'required' => 'true',
            	'class' => 'form-control',
            ] 
        ]); 
        
        $this->add([
            'name' => 'erreichteCredits',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Gesamtcredits*',
            ],
            'attributes' =>[
            	'required' => 'true',
		'pattern' => '[0-9]+',
		'autocomplete' => false,
		'data-toggle' => 'tooltip',
		'class' => 'form-control',
		'title' => 'Bitte Gesamtcredits angeben',
            ], 
        ]); 
        
        $this->add([
            'name' => 'internationalStudent',
            'type' => Element\Checkbox::class,
            'options' => [
                'label' => 'Internationaler Student',
                'use_hidden_element' => true,
        	'checked_value' => 'yes',
        	'unchecked_value' => 'no',
            ],
            'attributes' =>[
            	'class' => 'form-control',
            ],
            
        ]); 
        
        $this->add([
            'name' => 'abschlussnoteBerechnet',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Berechnete Abschlussnote',
            ],
            'attributes' =>[
            	'required' => 'true',
            	'class' => 'form-control',
            ] 
        ]); 
        
        $this->add([
            'name' => 'maxNote',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'maxNote',
            ],
            'attributes' =>[
            	'required' => 'true',
            	'class' => 'form-control',
            ], 
        ]); 
        
        $this->add([
            'name' => 'minNote',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'minNote',
            ],
           'attributes' =>[
            	'required' => 'true',
            	'class' => 'form-control',
            ], 
        ]);
        
        $this->add([
            'name' => 'praktika',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Praktika',
            ],
            'attributes' =>[
            	'class' => 'form-control',
            ],
        ]);
        
        $this->add([
            'name' => 'berufserfahrung',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Berufserfahrung',
            ],
            'attributes' =>[
            	'class' => 'form-control',
            ],
        ]);        
        
        $this->add([
            'name' => 'hinweise',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Hinweise',
            ],
            'attributes' =>[
            	'class' => 'form-control',
            ],
        ]);  
        
        $this->add([
            'name' => 'erstellung',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Erstellung',
            ],
            'attributes' =>[
            	'class' => 'form-control',
            ],
        ]);  
        
        $this->add([
            'name' => 'modifikation',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Modifikation',
            ],
            'attributes' =>[
            	'class' => 'form-control',
            ],
        ]);  
        
        $this->add([
            'name' => 'submit',
            'type' => Element\Submit::class,
            'attributes' => [
                'value' => 'Go',
                'id'    => 'submitbutton',
                'class' => 'btn btn-primary',
            ],
        ]);
        
   }
    
    private function generateAbschlussnoten()
    {    
        //output range from 1.00 until 4.00 or A,B,C,D,E as value for ablschlussnote
	$abschlussnoten = [];
	$abschlussnoten[''] = '';
	
	for($i = 1.00; $i <= 4.00; $i += 0.01) {
		$i = number_format($i, 2);
		$abschlussnoten[$i.''] = $i.'';
	}

	$abschlussnoten['A'] = 'A';
	$abschlussnoten['B'] = 'B';
	$abschlussnoten['C'] = 'C';
	$abschlussnoten['D'] = 'D';
	$abschlussnoten['E'] = 'E';
	
	return $abschlussnoten;
    }
}

<?php
namespace MasterBewerbung\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\Viewmodel;
use MasterBewerbung\Model\Bewerber;
use MasterBewerbung\Form\BewerbungForm;
use MasterBewerbung\Model\Table\BewerberTable;
use Laminas\Form\Element;
use Laminas\Form\Form;

class BewerbenController extends AbstractActionController
{
	
	private $bewerberTable;
	private $bewerbungForm;

	public function __construct(
		BewerberTable $bewerberTable, 
		BewerbungForm $bewerbungForm)
	{
		$this->bewerberTable = $bewerberTable;
		$this->bewerbungForm = $bewerbungForm;
	}	
	
	public function isBewerbungsFristAbgelaufen(){
		$bewerbungsFrist = $this->bewerberTable->getBewerbungsfrist();
		$currentDate = date("d.m.y");
		return $bewerbungsFrist < $currentDate;
	}
	
	public function indexAction()
	{
		$bewerbungsFrist = $this->bewerberTable->getBewerbungsfrist();
		$bewerbungsFristAbgelaufen = $this->isBewerbungsFristAbgelaufen();
		return ['bewerbungsFrist' => $bewerbungsFrist,
			'bewerbungsFristAbgelaufen' => $bewerbungsFristAbgelaufen];
	}
	
	public function bewerbungsfristabgelaufenAction(){
		$bewerbungsFrist = $this->bewerberTable->getBewerbungsfrist();
		return ['bewerbungsFrist' => $bewerbungsFrist];
	}
	
	public function bewerbenAction()
	{		
		if($this->isBewerbungsFristAbgelaufen()){
			return $this->redirect()->toRoute('masterbewerbung', ['action' => 'bewerbungsfristabgelaufen']);
		}
		$bewerbungsFrist = $this->bewerberTable->getBewerbungsfrist();
		
		$notFound = -1;
		$idBewerbungscode = $this->getRequest()->getQuery('idBewerbungscode', $notFound);	
		
        	if ($notFound == $idBewerbungscode) {
            		$idBewerbungscode = $this->bewerberTable->generateIdBewerbungscode();
			$bewerber = new Bewerber();
       	 }else{
       	 	//Load from DB
       	 	$bewerber = $this->bewerberTable->findBewerber($idBewerbungscode);
       	 }
       	
       	if(0 == $bewerber){
       		return $this->redirect()->toRoute('masterbewerbung', ['action' => 'nichtgefunden', 'idBewerbungscode' => $idBewerbungscode]);
       	}
       	
		$form = $this->bewerbungForm;
        	$form->get('submit')->setValue('Bewerben');
		$form->bind($bewerber);
		$form->setAttribute('action', $this->url()->fromRoute('masterbewerbung',['action' => 'bewerben']));

		$request = $this->getRequest();

		if (! $request->isPost()) {
			return ['form' => $form,
				'idBewerbungscode' => $idBewerbungscode,
				'abgeschickt' => $bewerber->getAbgeschickt(),
				'bewerbungsFrist' => $bewerbungsFrist];
		}

		$form->setInputFilter($bewerber->getInputFilter());
		$form->setData($request->getPost());

		if (! $form->isValid()) {
			return ['form' => $form,
				'idBewerbungscode' => $idBewerbungscode,
				'abgeschickt' => $bewerber->getAbgeschickt(),
				'bewerbungsFrist' => $bewerbungsFrist];
		}
		
		var_dump('isValid');

		$bewerber->exchangeArray($form->getData());
		//save to database
		$this->bewerberTable->createBewerber($bewerber);
		
		return $this->redirect()->toRoute('masterbewerbung', ['action' => 'zusammenfassung', 'idBewerbungscode' => $idBewerbungscode]);
	}
	
	public function indexEnAction()
	{
			
	}
	
	public function nichtgefundenAction()
	{
		$notFound = 'not found';
		$idBewerbungscode = $this->getRequest()->getQuery('idBewerbungscode', $notFound);
		
		return ['idBewerbungscode' => $idBewerbungscode];	
	}
	
	public function zusammenfassungAction()
	{			
		$notFound = -1;
		$idBewerbungscode = $this->getRequest()->getQuery('idBewerbungscode', $notFound);
		
        	if ($notFound == $idBewerbungscode) {
        		//No idBewerbungscode transmitted
            		return $this->redirect()->toRoute('masterbewerbung', ['action' => 'nichtgefunden']);
       	 }else{
       	 	//Found idBewerbungscode ->load from DB
       	 	$currentBewerber = $this->bewerberTable->findBewerber($idBewerbungscode);
       	 }
       	
       	if(0 == $currentBewerber){   	
       		//Bewerber not found in DB	
            		return $this->redirect()->toRoute('masterbewerbung', ['action' => 'nichtgefunden', 'idBewerbungscode' => $idBewerbungscode]);
       	}			
       	
       	
		$bewerbungsFrist = $this->bewerberTable->getBewerbungsfrist();
       	
		return [			
			'currentBewerber' => $currentBewerber,
			'bewerbungsFrist' => $bewerbungsFrist,
		];
	}
	
	public function abschickenAction()
	{	
		if($this->isBewerbungsFristAbgelaufen()){
			return $this->redirect()->toRoute('masterbewerbung', ['action' => 'bewerbungsfristabgelaufen']);
		}
		
		$notFound = -1;
		$idBewerbungscode = $this->getRequest()->getQuery('idBewerbungscode', $notFound);
		
        	if ($notFound == $idBewerbungscode) {
        		//No idBewerbungscode transmitted
            		return $this->redirect()->toRoute('masterbewerbung', ['action' => 'nichtgefunden']);
       	 }else{
       	 	//Load from DB
       	 	$currentBewerber = $this->bewerberTable->findBewerber($idBewerbungscode);
       	 }
       	
       	if(0 == $currentBewerber){
       		//Bewerber not found in DB	
            		return $this->redirect()->toRoute('masterbewerbung', ['action' => 'nichtgefunden', 'idBewerbungscode' => $idBewerbungscode]);
       	}			
		
		$currentBewerber->setAbgeschickt(true);
		$this->bewerberTable->updateBewerber($currentBewerber);
		return $this->redirect()->toRoute('masterbewerbung', ['action' => 'zusammenfassung', 'idBewerbungscode' => $idBewerbungscode]);
	}
}

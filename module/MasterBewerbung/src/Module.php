<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace MasterBewerbung;

use MasterBewerbung\Form\BewerbungForm;
use MasterBewerbung\Model\Table\BewerberTable;
use MasterBewerbung\Model\Table\LandTable;
use Laminas\Db\Adapter\Adapter;
use Laminas\ModuleManager\Feature\FormElementProviderInterface;

class Module implements FormElementProviderInterface
{
    public function getConfig() : array
    {
        return include __DIR__ . '/../config/module.config.php';
    }
    
    public function getServiceConfig(): array
    {
    	return [
    	     'factories' => [
    	     
    	     	BewerberTable::class => function($sm){
    	            $dbAdapter = $sm->get(Adapter::class);
    	            return new BewerberTable($dbAdapter);
    	         },
    	         LandTable::class => function($sm){
    	            $dbAdapter = $sm->get(Adapter::class);
    	            return new LandTable($dbAdapter);
    	         },       
    	     ]
    	];
    }
    
    public function getFormElementConfig()
    {
    	return [
    		'factories' => [
    			BewerbungForm::class => function($sm){
    			    $landTable = $sm -> get(LandTable::class);
    			    return new BewerbungForm($landTable);
    			}
    			
    			
    		]
    	];
    }
}

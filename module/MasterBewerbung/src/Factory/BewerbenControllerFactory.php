<?php

declare(strict_types=1);

namespace MasterBewerbung\Factory;

use MasterBewerbung\Form\BewerbungForm;
use MasterBewerbung\Model\Table\BewerberTable;
use MasterBewerbung\Controller\BewerbenController;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class BewerbenControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return BewerbenController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
    	$formManager = $container->get('FormElementManager');
        return new BewerbenController(
        	$container->get(BewerberTable::class),
        	$formManager->get(BewerbungForm::class)
        	);
    }
}

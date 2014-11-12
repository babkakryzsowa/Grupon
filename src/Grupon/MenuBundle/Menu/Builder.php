<?php
// src/Grupon/MenuBundle/Menu/Builder.php
namespace Grupon\MenuBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Grupon\MenuBundle\GruponMenuBundle;
use Grupon\MenuBundle\Entity\Menu;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Home', array('route' => 'grupon_index'));
        $menu->addChild('Test', array('route' => 'grupon_test'));
        $menu->addChild('About Me', array(
        		'route' => 'page_show',
        		'routeParameters' => array('id' => 42)
        ));
        // ... add more children

        return $menu;
        
        
    }
    
    
}

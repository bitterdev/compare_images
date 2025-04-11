<?php

namespace Bitter\CompareImages\Provider;

use Concrete\Core\Application\Application;
use Concrete\Core\Asset\AssetList;
use Concrete\Core\Foundation\Service\Provider;
use Concrete\Core\Routing\RouterInterface;
use Bitter\CompareImages\Routing\RouteList;

class ServiceProvider extends Provider
{
    protected RouterInterface $router;

    public function __construct(
        Application     $app,
        RouterInterface $router
    )
    {
        parent::__construct($app);

        $this->router = $router;
    }

    public function register()
    {
        $this->registerRoutes();
        $this->registerAssets();
    }

    private function registerAssets()
    {
        $al = AssetList::getInstance();

        $al->register('javascript', 'juxtapose', 'js/juxtapose.min.js', [], 'compare_images');
        $al->register('css', 'juxtapose', 'css/juxtapose.css', [], 'compare_images');
        $al->registerGroup('juxtapose', [
            ['javascript', 'juxtapose'],
            ['css', 'juxtapose']
        ]);
    }

    private function registerRoutes()
    {
        $this->router->loadRouteList(new RouteList());
    }
}
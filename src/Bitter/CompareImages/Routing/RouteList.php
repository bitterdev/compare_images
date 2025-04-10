<?php

namespace Bitter\CompareImages\Routing;

use Bitter\CompareImages\API\V1\Middleware\FractalNegotiatorMiddleware;
use Bitter\CompareImages\API\V1\Configurator;
use Concrete\Core\Routing\RouteListInterface;
use Concrete\Core\Routing\Router;

class RouteList implements RouteListInterface
{
    public function loadRoutes(Router $router)
    {
        $router
            ->buildGroup()
            ->setNamespace('Concrete\Package\CompareImages\Controller\Dialog\Support')
            ->setPrefix('/ccm/system/dialogs/compare_images')
            ->routes('dialogs/support.php', 'compare_images');
    }
}
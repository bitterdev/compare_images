<?php

namespace Concrete\Package\CompareImages;

use Bitter\CompareImages\Provider\ServiceProvider;
use Concrete\Core\Entity\Package as PackageEntity;
use Concrete\Core\Package\Package;

class Controller extends Package
{
    protected string $pkgHandle = 'compare_images';
    protected string $pkgVersion = '1.0.4';
    protected $appVersionRequired = '9.0.0';
    protected $pkgAutoloaderRegistries = [
        'src/Bitter/CompareImages' => 'Bitter\CompareImages',
    ];

    public function getPackageDescription(): string
    {
        return t('Display two images side by side with a draggable slider to compare them interactively.');
    }

    public function getPackageName(): string
    {
        return t('Compare Images ');
    }

    public function on_start()
    {
        /** @var ServiceProvider $serviceProvider */
        /** @noinspection PhpUnhandledExceptionInspection */
        $serviceProvider = $this->app->make(ServiceProvider::class);
        $serviceProvider->register();
    }

    public function install(): PackageEntity
    {
        $pkg = parent::install();
        $this->installContentFile("data.xml");
        return $pkg;
    }

    public function upgrade()
    {
        parent::upgrade();
        $this->installContentFile("data.xml");
    }
}
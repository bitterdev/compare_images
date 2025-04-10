<?php

namespace Concrete\Package\CompareImages\Block\CompareImages;

use Concrete\Core\Block\BlockController;

class Controller extends BlockController
{
    protected $btTable = 'btCompareImages';
    protected $btInterfaceWidth = 400;
    protected $btInterfaceHeight = 500;
    protected $btCacheBlockOutputLifetime = 300;
    protected $btExportFileColumns = ["firstImageFID", "secondImageFID"];

    public function getBlockTypeDescription(): string
    {
        return t("Add an compare image tool to your site.");
    }

    public function getBlockTypeName(): string
    {
        return t("Compare Image");
    }

    public function registerViewAssets($outputContent = '')
    {
        $this->requireAsset("juxtapose");
        parent::registerViewAssets($outputContent);
    }

    public function add()
    {
        $this->set("firstImageFID", null);
        $this->set("secondImageFID", null);
    }
}
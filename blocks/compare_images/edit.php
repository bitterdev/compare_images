<?php

defined("C5_EXECUTE") or die("Access Denied.");

use Concrete\Core\Form\Service\Form;
use Concrete\Core\Application\Service\FileManager;
use Concrete\Core\Support\Facade\Application;
use Concrete\Core\View\View;

/** @var int $firstImageFID */
/** @var int $secondImageFID */

$app = Application::getFacadeApplication();
/** @var Form $form */
/** @noinspection PhpUnhandledExceptionInspection */
$form = $app->make(Form::class);
/** @var FileManager $fileManager */
/** @noinspection PhpUnhandledExceptionInspection */
$fileManager = $app->make(FileManager::class);

/** @noinspection PhpUnhandledExceptionInspection */
View::element("dashboard/help_blocktypes", [], "team_member");
?>

<div class="form-group">
    <?php echo $form->label("firstImageFID", t("First Image")); ?>
    <?php echo $fileManager->image("firstImageFID", "firstImageFID", t("Please select image"), $firstImageFID); ?>
</div>

<div class="form-group">
    <?php echo $form->label("secondImageFID", t("Second Image")); ?>
    <?php echo $fileManager->image("secondImageFID", "secondImageFID", t("Please select image"), $secondImageFID); ?>
</div>

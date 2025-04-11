<?php /** @noinspection DuplicatedCode */

defined("C5_EXECUTE") or die("Access Denied.");

use Concrete\Core\Entity\File\Version;
use Concrete\Core\File\File;
use Concrete\Core\Page\Page;
use Concrete\Core\Support\Facade\Application;
use Concrete\Core\Entity\File\File as FileEntity;

/** @var int $firstImageFID */
/** @var int $secondImageFID */

$app = Application::getFacadeApplication();
$c = Page::getCurrentPage();
?>
<?php if ($c->isEditMode()) { ?>
    <div class="ccm-edit-mode-disabled-item">
        <?php echo t('Compare images disabled in edit mode.') ?>
    </div>
<?php } else { ?>
    <div class="juxtapose">
        <?php foreach ([$firstImageFID, $secondImageFID] as $fID) { ?>
            <?php $f = File::getByID($fID); ?>

            <?php if ($f instanceof FileEntity) { ?>
                <?php $fv = $f->getApprovedVersion(); ?>

                <?php if ($fv instanceof Version) { ?>
                    <img src="<?php echo h($fv->getURL()); ?>" alt="<?php echo h($fv->getTitle()); ?>"/>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </div>
<?php } ?>
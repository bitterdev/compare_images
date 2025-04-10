<?php /** @noinspection DuplicatedCode */

use Concrete\Core\File\File;
use Concrete\Core\Page\Page;
use Concrete\Core\Support\Facade\Application;
use Concrete\Core\Entity\File\File as FileEntity;

defined("C5_EXECUTE") or die("Access Denied.");

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
        <?php foreach ([$firstImageFID, $secondImageFID] as $fID) {
            $f = File::getByID($fID);

            if ($f instanceof FileEntity) {
                /** @noinspection PhpUnhandledExceptionInspection */
                $image = $app->make('html/image', ['f' => $f]);
                $tag = $image->getTag();
                echo (string)$tag;
            }
        } ?>
    </div>
<?php } ?>
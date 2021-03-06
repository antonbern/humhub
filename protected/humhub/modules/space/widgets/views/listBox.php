<?php

use humhub\widgets\AjaxLinkPager;
use yii\helpers\Html;
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">
                <?= Html::encode($title); ?>
            </h4>
            <br>
        </div>

        <?php if (count($spaces) === 0) : ?>
            <div class="modal-body">
                <p><?= Yii::t('SpaceModule.base', 'No spaces found.'); ?></p>
            </div>
        <?php endif; ?>

        <div id="spacelist-content">

            <ul class="media-list">
                <!-- BEGIN: Results -->
                <?php foreach ($spaces as $space) : ?>
                    <li>
                        <a href="<?php echo $space->getUrl(); ?>" data-modal-close="1">

                            <div class="media">
                                <img class="media-object img-rounded pull-left"
                                     src="<?= $space->getProfileImage()->getUrl(); ?>" width="50"
                                     height="50" alt="50x50" data-src="holder.js/50x50"
                                     style="width: 50px; height: 50px;">

                                <div class="media-body">
                                    <h4 class="media-heading"><?= Html::encode($space->name); ?>
                                    <h5><?= Html::encode($space->description); ?></h5>
                                </div>
                            </div>
                        </a>
                    </li>

                <?php endforeach; ?>
                <!-- END: Results -->

            </ul>

            <div class="pagination-container">
                <?= AjaxLinkPager::widget(['pagination' => $pagination]); ?>
            </div>

        </div>

    </div>

</div>

<script>

    // scroll to top of list
    $(".modal-body").animate({scrollTop: 0}, 200);

</script>

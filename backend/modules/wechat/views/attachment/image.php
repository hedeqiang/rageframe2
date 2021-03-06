<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\Html;

$this->title = $allMediaType[$mediaType];
$this->params['breadcrumbs'][] = ['label' =>  $this->title];
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <?= $this->render('_nav', [
        'allMediaType' => $allMediaType,
        'mediaType' => $mediaType,
        'count' => $pages->totalCount
    ]); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="inlineBlockContainer col3 vAlignTop">
                <?php foreach ($models as $model){ ?>
                    <div class="normalPaddingRight" style="width:20%;margin-top: 10px;">
                        <div class="borderColorGray separateChildrenWithLine whiteBG" style="margin-bottom: 20px;">
                            <div class="normalPadding">
                                <div style="background-image: url(<?= Url::to(['analysis/image','attach' => $model['media_url']]) ?>); height: 160px" class="backgroundCover relativePosition mainPostCover">
                                    <div class="bottomBar"><?= $model['file_name'] ?></div>
                                </div>
                            </div>
                            <div class="flex-row hAlignCenter normalPadding postToolbar">
                                <div class="flex-col"><a href="<?= Url::to(['send','attach_id'=> $model['id'], 'mediaType' => $mediaType])?>"  title="群发" data-toggle='modal' data-target='#ajaxModal'><i class="fa fa-send"></i></a></div>
                                <div class="flex-col"><a href="<?= Url::to(['preview','attach_id' => $model['id'], 'mediaType' => $mediaType])?>" title="手机预览" data-toggle='modal' data-target='#ajaxModal'><i class="fa fa-search"></i></a></div>
                                <div class="flex-col"><a href="<?= Url::to(['delete','attach_id' => $model['id'], 'mediaType' => $mediaType])?>" onclick="rfDelete(this, '删除后会删除素材对应的自动回复和等待群发');return false;" title="删除"><i class="fa fa-trash"></i></a></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= LinkPager::widget([
                'pagination'        => $pages,
                'maxButtonCount'    => 5,
                'firstPageLabel'    => "首页",
                'lastPageLabel'     => "尾页",
                'nextPageLabel'     => "下一页",
                'prevPageLabel'     => "上一页",
            ]);?>
        </div>
    </div>
</div>
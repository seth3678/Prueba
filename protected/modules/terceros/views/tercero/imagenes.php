<?php
if(is_null($model->gallery_id)){
	$model->save();
}
// render widget in view
$this->widget('GalleryManager', array(
    'gallery' => $model->galleryBehavior->getGallery(),
    'controllerRoute' => '/gallery', //route to gallery controller
));
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'imagenes-form',	
)); ?>
<div class="rows buttons">
	<?php echo CHtml ::submitButton(Yii::t('app','next'),array('name'=>'next'));?>
	
</div>
<?php $this->endWidget(); ?>
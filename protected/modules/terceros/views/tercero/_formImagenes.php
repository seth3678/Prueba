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
<?php  $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'imagenes-form',	
	
)); ?>
		
<?php $this->endWidget(); ?>
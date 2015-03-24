<?php
/* @var $this InmuebleController */
/* @var $model Inmueble */
/* @var $multimedia array(Multimedia) */
?>
<h1><?php echo Yii::t('app','Multimedia') ?></h1>
<div id="form<?php echo ucfirst($subview); ?>"> 
<?php $this->renderPartial('_form'.ucfirst($subview),array('model'=>$model,'multimedia'=>$multimedia)); ?>

</div>
<?php /*<!-- '_form'.ucfirst ($subview) anteponer para concatenar-->*/ ?>


<?php
/* @var $this TerceroController */
/* @var $model Tercero */

$this->breadcrumbs=array(
	Yii::t('app','Tercero',0)=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	Yii::t('app','update'),
);

$this->menu=array(
	array('label'=>Yii::t('app','list',1)." ". Yii::t('app','tercero',0), 'url'=>array('index')),
	array('label'=>Yii::t('app','create')." ". Yii::t('app','tercero',1), 'url'=>array('create')),
	array('label'=>Yii::t('app','view')." ". Yii::t('app','tercero',1), 'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','manage')." ". Yii::t('app','tercero',0), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','update')." ".Yii::t('app','Tercero',1).' # '. $model->id; ?></h1>

<?php echo $this->renderPartial('_form'.ucfirst($view),array('model'=>$model,'multimedia'=>$multimedia,'subview'=>$subview,)); ?>
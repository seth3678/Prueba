<?php
/* @var $this TerceroController */
/* @var $model Tercero */

$this->breadcrumbs=array(
	Yii::t('app','tercero',0)=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','list',1)." ". Yii::t('app','tercero',0), 'url'=>array('index')),
	array('label'=>Yii::t('app','create')." ". Yii::t('app','tercero',1), 'url'=>array('create')),
	array('label'=>Yii::t('app','update')." ". Yii::t('app','tercero',1), 'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('app','delete')." ". Yii::t('app','tercero',1), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('app','sureDelete'))),
	array('label'=>Yii::t('app','manage')." ". Yii::t('app','tercero',0), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','view')." ".Yii::t('app','tercero',1).' # '. $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombres',
		'apellidos',
		'fecha_cumple_annos',
		'gallery_id',
		'telefono',
	),
)); ?>

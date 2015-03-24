<?php
/* @var $this TerceroController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('app','Tercero',0)
);

$this->menu=array(
	array('label'=>Yii::t('app','create')." ". Yii::t('app','tercero',1), 'url'=>array('create')),
	array('label'=>Yii::t('app','manage')." ". Yii::t('app','tercero',0), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','Tercero',0); ?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

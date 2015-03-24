<?php
$this->breadcrumbs=array(
	Yii::t('app','Tercero',0)=>array('index'),
	Yii::t('app','create'),
);

$this->menu=array(
	array('label'=>Yii::t('app','list',1)." ". Yii::t('app','tercero',0), 'url'=>array('index')),
	array('label'=>Yii::t('app','manage',1)." ". Yii::t('app','tercero',0), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','Crear')." ".Yii::t('app','Tercero',1); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'multimedia'=>$multimedia,)); ?>
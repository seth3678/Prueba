<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=strtolower($this->modelClass);
echo "\$this->breadcrumbs=array(
	Yii::t('app','$label',0)=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
	array('label'=>Yii::t('app','list',1)." ". Yii::t('app','<?php echo strtolower($this->modelClass); ?>',0), 'url'=>array('index')),
	array('label'=>Yii::t('app','create')." ". Yii::t('app','<?php echo strtolower($this->modelClass); ?>',1), 'url'=>array('create')),
	array('label'=>Yii::t('app','update')." ". Yii::t('app','<?php echo strtolower($this->modelClass); ?>',1), 'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('app','delete')." ". Yii::t('app','<?php echo strtolower($this->modelClass); ?>',1), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('app','sureDelete'))),
	array('label'=>Yii::t('app','manage')." ". Yii::t('app','<?php echo strtolower($this->modelClass); ?>',0), 'url'=>array('admin')),
);
?>

<h1><?php echo '<?php'; ?> echo Yii::t('app','view')." ".Yii::t('app','<?php echo $label; ?>',1).' # '. <?php echo "\$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
<?php
foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
?>
	),
)); ?>

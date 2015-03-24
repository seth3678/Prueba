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
$label=($this->modelClass);
echo "\$this->breadcrumbs=array(
	Yii::t('app','$label',0)=>array('index'),
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	Yii::t('app','update'),
);\n";
?>

$this->menu=array(
	array('label'=>Yii::t('app','list',1)." ". Yii::t('app','<?php echo strtolower($this->modelClass); ?>',0), 'url'=>array('index')),
	array('label'=>Yii::t('app','create')." ". Yii::t('app','<?php echo strtolower($this->modelClass); ?>',1), 'url'=>array('create')),
	array('label'=>Yii::t('app','view')." ". Yii::t('app','<?php echo strtolower($this->modelClass); ?>',1), 'url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('app','manage')." ". Yii::t('app','<?php echo strtolower($this->modelClass); ?>',0), 'url'=>array('admin')),
);
?>

<h1><?php echo '<?php'; ?> echo Yii::t('app','update')." ".Yii::t('app','<?php echo $label; ?>',1).' # '. <?php echo "\$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form',array('model'=>\$model)); ?>"; ?>
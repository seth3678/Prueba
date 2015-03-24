<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $dataProvider CActiveDataProvider */

<?php
$label=($this->modelClass);
echo "\$this->breadcrumbs=array(
	Yii::t('app','$label',0)
);\n";
?>

$this->menu=array(
	array('label'=>Yii::t('app','create')." ". Yii::t('app','<?php echo strtolower($this->modelClass); ?>',1), 'url'=>array('create')),
	array('label'=>Yii::t('app','manage')." ". Yii::t('app','<?php echo strtolower($this->modelClass); ?>',0), 'url'=>array('admin')),
);
?>

<h1><?php echo '<?php'; ?> echo Yii::t('app','<?php echo $label; ?>',0); <?php echo '?>'; ?></h1>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

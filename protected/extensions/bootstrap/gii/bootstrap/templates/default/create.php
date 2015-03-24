<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label=($this->modelClass);
echo "\$this->breadcrumbs=array(
	Yii::t('app','$label',0)=>array('index'),
	Yii::t('app','create'),
);\n";
?>

$this->menu=array(
	array('label'=>Yii::t('app','list',1)." ". Yii::t('app','<?php echo strtolower($this->modelClass); ?>',0), 'url'=>array('index')),
	array('label'=>Yii::t('app','manage',1)." ". Yii::t('app','<?php echo strtolower($this->modelClass); ?>',0), 'url'=>array('admin')),
);
?>

<h1><?php echo '<?php'; ?> echo Yii::t('app','Crear')." ".Yii::t('app','<?php echo $label; ?>',1); <?php echo '?>'; ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>

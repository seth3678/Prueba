<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

	<?php echo $form->textFieldControlGroup($model,'nombres',array('span'=>5,'maxlength'=>150)); ?>

	<?php echo $form->textFieldControlGroup($model,'apellidos',array('span'=>5,'maxlength'=>150)); ?>

	<?php echo $form->textFieldControlGroup($model,'fecha_cumple_annos',array('span'=>5)); ?>

	<?php echo $form->textFieldControlGroup($model,'gallery_id',array('span'=>5)); ?>

	<?php echo $form->textFieldControlGroup($model,'telefono',array('span'=>5)); ?>

	<div class="form-actions">
		<?php echo TbHtml::submitButton(Yii::t('app','buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

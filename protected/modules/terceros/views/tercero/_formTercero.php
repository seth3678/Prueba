<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'tercero-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldControlGroup($model,'nombres'); ?>

	<?php echo $form->textFieldControlGroup($model,'apellidos'); ?>


<?php echo $form->labelEx($model,'fecha_cumple_annos'); 

		 $this->widget('zii.widgets.jui.CJuiDatePicker',array(
		    'model'=>$model,
		    'attribute'=>'fecha_cumple_annos',
		    // additional javascript options for the date picker plugin
		    'options'=>array(
		        'showAnim'=>'fold',
		        'dateFormat' => 'yy-mm-dd'
		    ),
		    'htmlOptions'=>array(
		        'style'=>'height:20px;'
		    ),
		));?>

	<?php echo $form->textFieldControlGroup($model,'correo_electronico'); ?>

	<?php echo $form->hiddenField($model,'gallery_id'); ?>

	<?php echo $form->textFieldControlGroup($model,'telefono'); ?>
	


	
	<div class="row-fluid">	
			<?php echo TbHtml::submitButton(Yii::t('app','Siguiente'),
					array('color'=>TbHtml::BUTTON_COLOR_PRIMARY,'value'=>'multimedia','name'=>'next')); ?>
	</div>

<?php $this->endWidget(); ?>

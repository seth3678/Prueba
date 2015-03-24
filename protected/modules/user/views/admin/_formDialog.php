<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
));
?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary(array($model,$profile)); ?>
	
  		 
		<?php echo $form->hiddenfield($model,'tercero_id',array('size'=>30,'maxlength'=>30)); ?>	
	
		<?php echo $form->dropDownListRow($model,'sucursal_id',Sucursal::getSucursales(true)); ?>
		
		<?php echo $form->textFieldRow($model,'username',array('size'=>30,'maxlength'=>30)); ?>

		<?php echo $form->passwordFieldRow($model,'password',array('size'=>60,'maxlength'=>128)); ?>

		<?php echo $form->textFieldRow($model,'email',array('size'=>60,'maxlength'=>128)); ?>

		<?php echo $form->dropDownListRow($model,'superuser',User::itemAlias('AdminStatus')); ?>

		<?php echo $form->dropDownListRow($model,'status',User::itemAlias('UserStatus')); ?>

		<?php echo $form->checkBoxRow($model,'asistente_administrativo'); ?>

		<?php echo $form->checkBoxRow($model,'asistente_operativo'); ?>

		<?php echo $form->checkBoxRow($model,'administrador'); ?>
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="row">
		<?php echo $form->labelExRow($profile,$field->varname); ?>
		<?php 
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textFieldRow($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		 ?>
		<?php echo $form->error($profile,$field->varname); ?>
	</div>
			<?php
			}
		}
?>
	
	<?php echo CHtml::ajaxSubmitButton(Yii::t('app','Crear'),CHtml::normalizeUrl(array('/user/admin/createAjax','render'=>false)),
			array('success'=>'js: function(data) {
				  $.fn.yiiGridView.update("user-grid");  
            	  $("#userDialog").dialog("close");
	        }'),array('id'=>'closeuserDialog'.time())); ?></div>
                    

<?php $this->endWidget(); ?>

</div><!-- form -->
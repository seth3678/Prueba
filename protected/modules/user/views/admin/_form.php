<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
));
?>
	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary(array($model,$profile)); ?>	
	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($tercero,'nombre1',array('size'=>30,'maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($tercero,'nombre2',array('size'=>30,'maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($tercero,'apellido1',array('size'=>30,'maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($tercero,'apellido2',array('size'=>30,'maxlength'=>30)); ?>

		<?php echo $form->dropDownlistRow($tercero,'tipo_identificacion',TipoDocumento::getTipoDocumentos(true)); ?>

		<?php echo $form->textFieldRow($tercero,'num_identificacion',array('size'=>25,'maxlength'=>25)); ?>
		
		<?php echo $form->dropDownListRow($model,'sucursal_id',Sucursal::getSucursales(true)); ?>

		<?php echo $form->textFieldRow($tercero,'telefono',array('size'=>15,'maxlength'=>15)); ?>

		<?php echo $form->textFieldRow($tercero,'celular',array('size'=>15,'maxlength'=>15)); ?>
		
			
		<?php $this->renderPartial('application.modules.geo.views.direccion._batch',array('form'=>$form,'model'=>$dir,)); ?>
	


	  <div class="row-fluid">
			<div class="span3"><?php echo $form->checkBoxRow($tercero,'es_propietario'); ?></div>
			<div class="span3"><?php echo $form->checkBoxRow($tercero,'es_arrendatario'); ?></div>
		</div>
		<div class="row-fluid">
			<div class="span3"><?php echo $form->checkBoxRow($tercero,'es_inquilino'); ?></div>
			<div class="span3"><?php echo $form->checkBoxRow($tercero,'es_empleado'); ?></div>
		</div>
		<div class="row-fluid">
			<div class="span3"><?php echo $form->checkBoxRow($tercero,'es_empleado_mantenimiento'); ?></div>
			<div class="span3"><?php echo $form->checkBoxRow($tercero,'es_administrador'); ?></div>
		</div>
		<div class="row-fluid">
			<div class="span3"><?php echo $form->checkBoxRow($tercero,'es_asamblea'); ?></div>
		</div>
		<div class="row-fluid">
			<div class="span3"><?php echo $form->checkBoxRow($tercero,'es_miembro_consejo'); ?></div>
		</div>
		

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
		<?php echo $form->labelEx($profile,$field->varname); ?>
		<?php 
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownListRow($profile,$field->varname,Profile::range($field->range));
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
	<div class="row-fluid">
		<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save')); ?>
	</div>

<?php $this->endWidget(); ?>
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <div class="row">
        <?php echo $form->label($model,'id'); ?>
        <?php echo $form->textField($model,'id'); ?>
    </div>

	<div class="row">
		<?php echo $form->label($tercero,'nombre1'); ?>
		<?php echo $form->textField($tercero,'nombre1',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($tercero,'nombre2'); ?>
		<?php echo $form->textField($tercero,'nombre2',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($tercero,'apellido1'); ?>
		<?php echo $form->textField($tercero,'apellido1',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($tercero,'apellido2'); ?>
		<?php echo $form->textField($tercero,'apellido2',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($tercero,'tipo_identificacion'); ?>
		<?php echo $form->textField($tercero,'tipo_identificacion',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($tercero,'num_identificacion'); ?>
		<?php echo $form->textField($tercero,'num_identificacion',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($tercero,'telefono'); ?>
		<?php echo $form->textField($tercero,'telefono',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($tercero,'celular'); ?>
		<?php echo $form->textField($tercero,'celular',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($tercero,'es_propietario'); ?>
		<?php echo $form->textField($tercero,'es_propietario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($tercero,'es_arrendatario'); ?>
		<?php echo $form->textField($tercero,'es_arrendatario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($tercero,'es_inquilino'); ?>
		<?php echo $form->textField($tercero,'es_inquilino'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($tercero,'es_empleado'); ?>
		<?php echo $form->textField($tercero,'es_empleado'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($tercero,'es_empleado'); ?>
		<?php echo $form->textField($tercero,'es_empleado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($tercero,'es_miembro_consejo'); ?>
		<?php echo $form->textField($tercero,'es_miembro_consejo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($tercero,'es_administrador'); ?>
		<?php echo $form->textField($tercero,'es_administrador'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($tercero,'es_asamblea'); ?>
		<?php echo $form->textField($tercero,'es_asamblea'); ?>
	</div>
	
	
    <div class="row">
        <?php echo $form->label($model,'tercero_id'); ?>
        <?php echo $form->textField($model,'tercero_id',array('size'=>20,'maxlength'=>20)); ?>
    </div>
    
    <div class="row">
        <?php echo $form->label($model,'username'); ?>
        <?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'activkey'); ?>
        <?php echo $form->textField($model,'activkey',array('size'=>60,'maxlength'=>128)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'create_at'); ?>
        <?php echo $form->textField($model,'create_at'); ?>
    </div>


    <div class="row">
        <?php echo $form->label($model,'status'); ?>
        <?php echo $form->dropDownList($model,'status',$model->itemAlias('UserStatus')); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton(UserModule::t('Search')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
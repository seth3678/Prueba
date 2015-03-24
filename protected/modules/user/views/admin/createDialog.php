<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                'id'=>'userDialog',
                'options'=>array(
                    'title'=>Yii::t('app','Nuevo Usuario tercero'),
                    'autoOpen'=>true,
                    'modal'=>'true',
                    'width'=>'auto',
                    'height'=>'auto',
                ),
                ));
echo $this->renderPartial('_formDialog', array('model'=>$model,'profile'=>$profile)); ?>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>
<?php

/**
 * This is the model class for table "{{multimedia}}".
 *
 * The followings are the available columns in table '{{multimedia}}':
 * @property integer $id
 * @property integer $inmueble_id
 * @property string $origen_ruta
 * @property string $fecha_hora
 * The followings are the available model relations:
 * @property Inmueble $inmueble
 */
class Multimedia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Multimedia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{multimedia}}';
	}
	
	/**
	 * Returns a list of behaviors that this model should behave as.
	 * The return value should be an array of behavior configurations indexed by
	 * behavior names. Each behavior configuration can be either a string specifying
	 * the behavior class or an array of the following structure:
	 * <pre>
	 * 'behaviorName'=>array(
	 *     'class'=>'path.to.BehaviorClass',
	 *     'property1'=>'value1',
	 *     'property2'=>'value2',
	 * )
	 * </pre>
	 *
	 * Note, the behavior classes must implement {@link IBehavior} or extend from
	 * {@link CBehavior}. Behaviors declared in this method will be attached
	 * to the model when it is instantiated.
	 *
	 * For more details about behaviors, see {@link CComponent}.
	 * @return array the behavior configurations (behavior name=>behavior configuration)
	 */

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('inmueble_id, origen_ruta', 'required'),
			array('inmueble_id', 'numerical', 'integerOnly'=>true),
			array('origen_ruta', 'length', 'max'=>250),
			array('origen_ruta', 'validarRuta'),
			array('fecha_hora', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, inmueble_id, origen_ruta, fecha_hora', 'safe', 'on'=>'search'),
			
		);
	}
	
	public function validarRuta($attribute,$params){
		if(!(strpos($this->origen_ruta,'youtu')===false)){
			$this->origen_ruta=str_replace('www.youtu.be/', 'www.youtube.com/embed/', $this->origen_ruta);
			$this->origen_ruta=str_replace('youtu.be/', 'www.youtube.com/embed/', $this->origen_ruta);
			$this->origen_ruta=str_replace('watch?v=', 'embed/', $this->origen_ruta);
			$this->origen_ruta=str_replace('https:', '', $this->origen_ruta);
			$this->origen_ruta=str_replace('http:', '', $this->origen_ruta);
		}
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'inmueble' => array(self::BELONGS_TO, 'Inmueble', 'inmueble_id'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','id',1),
			'inmueble_id' => Yii::t('app','inmueble',1),
			'origen_ruta' => Yii::t('app','origen ruta',1),
			'fecha_hora' => Yii::t('app','fecha hora',1),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('inmueble_id',$this->inmueble_id);
		$criteria->compare('origen_ruta',$this->origen_ruta,true);
		$criteria->compare('fecha_hora',$this->fecha_hora,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
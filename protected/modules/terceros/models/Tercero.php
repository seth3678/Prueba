<?php

/**
 * This is the model class for table "{{tercero}}".
 *
 * The followings are the available columns in table '{{tercero}}':
 * @property integer $id
 * @property string $nombres
 * @property string $apellidos
 * @property string $fecha_cumple_annos
 * @property integer $gallery_id
 * @property integer $telefono
 * @property string $correo_electronico
 */
class Tercero extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{tercero}}';
	}
	
	public function behaviors()
	{
	    return array(
	        // Classname => path to Class
	        'galleryBehavior' => array(
	            'class' => 'GalleryBehavior',
	            'idAttribute' => 'gallery_id',
	            'versions' => array(
	                'small' => array(
	                    'centeredpreview' => array(98, 98),
	                ),
	                'medium' => array(
	                    'resize' => array(800, null),
	                )
	            ),
	            'name' => true,
	            'description' => true,
	        )
	    );
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombres, apellidos, fecha_cumple_annos, telefono, correo_electronico', 'required'),
			//array('email', 'email'),
			array('gallery_id, telefono', 'numerical', 'integerOnly'=>true),
			array('nombres, apellidos, correo_electronico', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombres, apellidos, fecha_cumple_annos, gallery_id, telefono, correo_electronico', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'fecha_cumple_annos' => 'Fecha Cumple Años',
			'gallery_id' => 'Gallery',
			'telefono' => 'Telefono',
			'correo_electronico' => 'Correo Electronico',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('fecha_cumple_annos',$this->fecha_cumple_annos,true);
		$criteria->compare('gallery_id',$this->gallery_id);
		$criteria->compare('telefono',$this->telefono);
		$criteria->compare('correo_electronico',$this->correo_electronico,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tercero the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	
	public function beforeSave(){
				
		$mail = new YiiMailer();
		//Definir que vamos a usar SMTP
		/*
		$mail->IsSMTP();
		//Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
		// 0 = off (producción)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug  = 0;
		//Ahora definimos gmail como servidor que aloja nuestro SMTP
		$mail->Host       = 'smtp.gmail.com';
		//El puerto será el 587 ya que usamos encriptación TLS
		$mail->Port       = 587;
		//Definmos la seguridad como TLS
		$mail->SMTPSecure = 'tls';
		//Tenemos que usar gmail autenticados, así que esto a TRUE
		$mail->SMTPAuth   = true;
		//Definimos la cuenta que vamos a usar. Dirección completa de la misma
		$mail->Username   = "david.gomez@iseeci.com";
		//Introducimos nuestra contraseña de gmail
		$mail->Password   = "masterk3y";
		// Conectamos a la base de datos
		*/
		//Definimos el remitente (dirección y, opcionalmente, nombre)
		$mail->SetFrom('david.gomez@iseeci.com', 'David');
		
			
		$mail->AddAddress($this->correo_electronico, 'El Destinatario');
	  
	   	$mail->Subject = 'se ha creado una tercero con los siguientes datos ';
	   	$mail->Body='nombre completo '.$this->nombres.'- '.$this->apellidos.'- '.'con el numero de telefono'.$this->telefono ;
		$mail->send();
	  
		return parent::beforeSave();
	}
}

<?php

/**
 * This is the model class for table "lugar_emblematico".
 *
 * The followings are the available columns in table 'lugar_emblematico':
 * @property integer $idLugar_Emblematico
 * @property string $nombre
 * @property string $description
 * @property string $image
 * @property integer $Direccion_idDireccion
 *
 * The followings are the available model relations:
 * @property Direccion $direccionIdDireccion
 * @property UsuarioBuscaLugar[] $usuarioBuscaLugars
 */
class LugarEmblematico extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'lugar_emblematico';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Direccion_idDireccion', 'required'),
			array('Direccion_idDireccion', 'numerical', 'integerOnly'=>true),
			array('nombre, description', 'length', 'max'=>45),
			array('image', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idLugar_Emblematico, nombre, description, image, Direccion_idDireccion', 'safe', 'on'=>'search'),
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
			'direccionIdDireccion' => array(self::BELONGS_TO, 'Direccion', 'Direccion_idDireccion'),
			'usuarioBuscaLugars' => array(self::HAS_MANY, 'UsuarioBuscaLugar', 'Lugar_Emblematico_idLugar_Emblematico'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idLugar_Emblematico' => 'Id Lugar Emblematico',
			'nombre' => 'Nombre',
			'description' => 'Description',
			'image' => 'Image',
			'Direccion_idDireccion' => 'Direccion Id Direccion',
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

		$criteria->compare('idLugar_Emblematico',$this->idLugar_Emblematico);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('Direccion_idDireccion',$this->Direccion_idDireccion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LugarEmblematico the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

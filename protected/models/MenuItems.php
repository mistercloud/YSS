<?php

/**
 * This is the model class for table "menu_items".
 *
 * The followings are the available columns in table 'menu_items':
 * @property string $id
 * @property string $menu_id
 * @property string $url
 * @property integer $weight
 * @property string $title
 *
 * The followings are the available model relations:
 * @property Menus $menu
 */
class MenuItems extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MenuItems the static model class
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
		return 'menu_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('menu_id, url, title', 'required'),
			array('weight', 'numerical', 'integerOnly'=>true),
			array('menu_id', 'length', 'max'=>10),
			array('url, title', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, menu_id, url, weight, title', 'safe', 'on'=>'search'),
		);
	}

    public function scopeMenuId( $iMenuId ){

        $iMenuId = (int)$iMenuId;
        if( $iMenuId < 0 ){
            throw new Exception('iMenuId required');
        }

        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'menu_id = '.$iMenuId,
            'order'		=> 'weight ASC',
        ));
        return $this;

    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'menu' => array(self::BELONGS_TO, 'Menus', 'menu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'menu_id' => 'Menu',
			'url' => 'Url',
			'weight' => 'Weight',
			'title' => 'Title',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('menu_id',$this->menu_id,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('title',$this->title,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
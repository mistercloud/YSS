<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property string $id
 * @property string $title
 * @property string $pre_content
 * @property string $content
 * @property string $meta_id
 * @property string $category_id
 * @property integer $is_active
 *
 * The followings are the available model relations:
 * @property NewsCategories $category
 * @property Meta $meta
 */
class News extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
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
		return 'news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content', 'required'),
			array('is_active', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('pre_content', 'length', 'max'=>500),
			array('meta_id, category_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, pre_content, content, meta_id, category_id, is_active', 'safe', 'on'=>'search'),
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
			'category' => array(self::BELONGS_TO, 'NewsCategories', 'category_id'),
			'meta' => array(self::BELONGS_TO, 'Meta', 'meta_id'),
		);
	}

    public function scopeLast( $iNum = 10 ){

        $this->getDbCriteria()->mergeWith(array(
            'limit' => $iNum,
            'order'		=> 't.id DESC',
        ));
        return $this;

    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'pre_content' => 'Pre Content',
			'content' => 'Content',
			'meta_id' => 'Meta',
			'category_id' => 'Category',
			'is_active' => 'Is Active',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('pre_content',$this->pre_content,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('meta_id',$this->meta_id,true);
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('is_active',$this->is_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
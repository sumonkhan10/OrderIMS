<?php

/**
 * This is the model class for table "tbl_issue".
 *
 * The followings are the available columns in table 'tbl_issue':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $project_name
 * @property integer $type_id
 * @property integer $status_id
 * @property integer $owner_id
 * @property integer $requester_id
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 */
class Issue extends OderIMSCActiveRecord
{   
    
    const STATUS_NOT_YET_STARTED=0;
	const STATUS_STARTED=1;
	const STATUS_FINISHED=2;
	
	const TYPE_BUG=0;
	const TYPE_FEATURE=1;
	const TYPE_TASK=2;
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Issue the static model class
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
		return 'tbl_issue';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, project_name', 'required'),
			array('type_id, status_id, owner_id, requester_id', 'numerical', 'integerOnly'=>true),
			array('name, project_name', 'length', 'max'=>256),
			array('description', 'length', 'max'=>2000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, project_name, type_id, status_id, owner_id, requester_id, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
            'owner' => array(self::BELONGS_TO, 'User', 'owner_id'),
            'requester' => array(self::BELONGS_TO, 'User', 'requester_id'),
            'comments' => array(self::HAS_MANY, 'Comment', 'issue_id'),
            'commentCount' => array(self::STAT, 'Comment', 'issue_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'project_name' => 'Project Name',
			'type_id' => 'Type',
			'status_id' => 'Status',
			'owner_id' => 'Owner',
			'requester_id' => 'Requester',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('project_name',$this->project_name,true);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('owner_id',$this->owner_id);
		$criteria->compare('requester_id',$this->requester_id);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    /**
	 * @return array issue type names indexed by type IDs
	 */
    public function getTypeOptions()
    {
        return array(
        self::TYPE_BUG => 'Bug',
        self::TYPE_FEATURE => 'Feature',
        self::TYPE_TASK => 'Task'  
        );
    }
    
    /**
	 * @return array issue Status names indexed by Status IDs
	 */
    public function getStatusOptions()
    {
        return array(
        self::STATUS_NOT_YET_STARTED => 'Not yest started',
        self::STATUS_STARTED => 'Started',
        self::STATUS_FINISHED => 'Finished'
        );
    }
    
    /**
	 * @return string the type text display for the current issue
	 */
    public function getTypeText()
    {
        $typeOptions = $this->typeOptions;
        return isset($typeOptions[$this->type_id]) ? $typeOptions[$this->type_id] : "Unknown type ({$this->type_id})";
    }
    
    /**
	 * @return string the type text display for the current issue
	 */
    public function getStatusText()
    {
        $statusOptions = $this->statusOptions;
        return isset($statusOptions[$this->status_id]) ? $statusOptions[$this->status_id] : "Unknown type ({$this->status_id})";
    }
    
    /**
	 * @return array of valid users for this project, indexed by user IDs
	 */
	public function getUserOptions()
	{
        $users = User::model()->findAll();
		$usersArray = CHtml::listData($users, 'id', 'username');
		return $usersArray;
		
	}
    
    /**
     * Adds a comment to this issue
     */
    public function commentAdd($comment)
    {
        $comment->issue_id = $this->id;
        return $comment->save();
    }
    
}
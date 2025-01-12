<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Category', 'doctrine');

/**
 * BaseCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $type
 * @property integer $parent_id
 * @property string $parent_name
 * @property string $name
 * @property string $route
 * @property string $position
 * @property integer $sort
 * @property string $backcolor
 * @property string $forecolor
 * @property boolean $is_active
 * @property timestamp $updated_at
 * 
 * @method integer   getId()          Returns the current record's "id" value
 * @method string    getType()        Returns the current record's "type" value
 * @method integer   getParentId()    Returns the current record's "parent_id" value
 * @method string    getParentName()  Returns the current record's "parent_name" value
 * @method string    getName()        Returns the current record's "name" value
 * @method string    getRoute()       Returns the current record's "route" value
 * @method string    getPosition()    Returns the current record's "position" value
 * @method integer   getSort()        Returns the current record's "sort" value
 * @method string    getBackcolor()   Returns the current record's "backcolor" value
 * @method string    getForecolor()   Returns the current record's "forecolor" value
 * @method boolean   getIsActive()    Returns the current record's "is_active" value
 * @method timestamp getUpdatedAt()   Returns the current record's "updated_at" value
 * @method Category  setId()          Sets the current record's "id" value
 * @method Category  setType()        Sets the current record's "type" value
 * @method Category  setParentId()    Sets the current record's "parent_id" value
 * @method Category  setParentName()  Sets the current record's "parent_name" value
 * @method Category  setName()        Sets the current record's "name" value
 * @method Category  setRoute()       Sets the current record's "route" value
 * @method Category  setPosition()    Sets the current record's "position" value
 * @method Category  setSort()        Sets the current record's "sort" value
 * @method Category  setBackcolor()   Sets the current record's "backcolor" value
 * @method Category  setForecolor()   Sets the current record's "forecolor" value
 * @method Category  setIsActive()    Sets the current record's "is_active" value
 * @method Category  setUpdatedAt()   Sets the current record's "updated_at" value
 * 
 * @package    vogue
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('category');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('type', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('parent_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('parent_name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('route', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('position', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('sort', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('backcolor', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('forecolor', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}
<?php
namespace Cms\Model;
use Zend\Db\TableGateway\TableGateway;
// require_once 'Zend/Db/Table/Abstract.php';
// require_once APPLICATION_PATH . '/models/Page.php';
class Page {
/**
* The default table name
*/
protected $tableGateway;
public function __construct(TableGateway $tableGateway)
{
	$this->tableGateway = $tableGateway;
}
protected $_name = 'pages';

protected $_dependentTables
protected $_referenceMap
'Page' => array(
	'columns' => array('parent_id'),
	'refTableClass' => 'Model_Page',
	'refColumns' => array('id'),
	'onDelete' => self::CASCADE,
	'onUpdate' => self::RESTRICT
	)
);


public function createPage($name, $namespace, $parentId = 0)
{
//create the new page
	$row = $this->createRow();
	$row->name = $name;
	$row->namespace = $namespace;
	$row->parent_id = $parentId;
	$row->date_created = time();
	$row->save();
// now fetch the id of the row you just created and return it
	$id = $this->_db->lastInsertId();
	return $id;
}

public function deletePage($id)
{
// find the row that matches the id
	$row = $this->find($id)->current();
	if($row) {
		$row->delete();
		return true;
	} else {
		throw new Zend_Exception("Delete function failed; could not find page!");
	}
}


?>

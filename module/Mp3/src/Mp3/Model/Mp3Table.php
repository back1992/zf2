<?php
namespace Mp3\Model;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

class Mp3Table
{
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	public function fetchAll($paginated=false)
	{
		if($paginated) {
// create a new Select object for the table mp3
			$select = new Select('mp3');
// create a new result set based on the Mp3 entity
			$resultSetPrototype = new ResultSet();
			$resultSetPrototype->setArrayObjectPrototype(new Mp3());
// create a new pagination adapter object
			$paginatorAdapter = new DbSelect(
// our configured select object
				$select,
// the adapter to run it against
				$this->tableGateway->getAdapter(),
// the result set to hydrate
				$resultSetPrototype
				);
			$paginator = new Paginator($paginatorAdapter);
			return $paginator;
		}
		$resultSet = $this->tableGateway->select();
		return $resultSet;

	}
	public function getMp3($id)
	{
		$id = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}
	public function saveMp3(Mp3 $mp3)
	{
		$data = array(
			'area' => $mp3->area,
			'title' => $mp3->title,
			'mp3file' => $mp3->mp3file,
			);
		$id = (int)$mp3->id;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getMp3($id)) {
				$this->tableGateway->update($data, array('id' => $id));
			} else {
				throw new \Exception('Form id does not exist');
			}
		}
	}
	public function deleteMp3($id)
	{
		$this->tableGateway->delete(array('id' => $id));
	}
}

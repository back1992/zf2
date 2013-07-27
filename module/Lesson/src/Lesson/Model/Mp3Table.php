<?php
namespace Lesson\Model;
use Zend\Db\TableGateway\TableGateway;
class Mp3Table
{
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	public function fetchAll()
	{
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

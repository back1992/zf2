<?php
namespace Cms\Model;
use Zend\Db\TableGateway\TableGateway;
class BugTable
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
	public function getBug($id)
	{
		$id = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}
	public function saveBug(Bug $bug)
	{
		$data = array(
			'author' => $bug->author,
			'email' => $bug->email,
			'date' => $bug->date,
			'url' => $bug->url,
			'description' => $bug->description,
			'priority' => $bug->priority,
			'status' => $bug->status,
			);
		$id = (int)$bug->id;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getBug($id)) {
				$this->tableGateway->update($data, array('id' => $id));
			} else {
				throw new \Exception('Form id does not exist');
			}
		}
	}
	public function deleteBug($id)
	{
		$this->tableGateway->delete(array('id' => $id));
	}

	public function createBug(Bug $bug)
	{
// create a new row in the bugs table
		$data = array(
			'author' => $bug->author,
			'email' => $bug->email,
			'date' => $bug->date,
			'url' => $bug->url,
			'description' => $bug->description,
			'priority' => $bug->priority,
			'status' => $bug->status,
			);


		$id = (int)$bug->id;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getBug($id)) {
				$this->tableGateway->update($data, array('id' => $id));
			} else {
				throw new \Exception('Form id does not exist');
			}
		}
	}

	public function fetchBugs()
	{
		// $select = $this->select();
		// return $this->fetchAll($select);
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}

	public function updateBug($id, $name, $email, $date, $url,
		$description, $priority, $status)
	{
// find the row that matches the id
		$row = $this->find($id)->current();
		if($row) {
// set the row data
			$row->author = $name;
			$row->email = $email;
			$d = new Zend_Date($date);
			$row->date = $d->get(Zend_Date::TIMESTAMP);
			$row->url = $url;
			$row->description = $description;
			$row->priority = $priority;
			$row->status = $status;
// save the updated row
			$row->save();
			return true;
		} else {
			throw new Zend_Exception("Update function failed; could not find row!");
		}
	}


}

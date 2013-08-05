<?php
namespace Quiz\Model;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

class QuizTable
{
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	public function fetchAll($paginated=false)
	{
		if($paginated) {
// create a new Select object for the table quiz
			$select = new Select('quiz');
// create a new result set based on the Quiz entity
			$resultSetPrototype = new ResultSet();
			$resultSetPrototype->setArrayObjectPrototype(new Quiz());
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


	public function getQuiz($id)
	{
		$id = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}

	public function saveQuiz(Quiz $quiz)
	{
		$data = array(
			'area' => $quiz->area,
			'title' => $quiz->title,
			'audiofile' => $quiz->audiofile,
			);
		$id = (int)$quiz->id;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			// if ($this->getQuiz($id)) {
			// 	$this->tableGateway->update($data, array('id' => $id));
			// } else {
			// 	throw new \Exception('Form id does not exist');
			// }
		}
	}
	public function deleteQuiz($id)
	{
		$id = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		$audiofile =  $row->audiofile;
		unlink($audiofile);
		$this->tableGateway->delete(array('id' => $id));
		
	}
}

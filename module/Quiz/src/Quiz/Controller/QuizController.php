<?php
namespace Quiz\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Quiz\Model\Quiz;
// <-- Add this import
use Quiz\Form\QuizForm;
// <-- Add this import

class QuizController extends AbstractActionController {
	protected $quizTable;
	public function indexAction() {
        // grab the paginator from the QuizTable
		$paginator = $this->getQuizTable()->fetchAll(true);
        // set the current page to what has been passed in query string, or to 1 if none set
		$paginator->setCurrentPageNumber((int)$this->params()->fromQuery('page', 1));
        // set the number of items per page to 10
		$paginator->setItemCountPerPage(10);
        // echo "<pre>";
        // var_dump($paginator);
        // echo "</pre>";
        //

		return new ViewModel(array(
			'paginator' => $paginator
			));
	}
	public function addAction() {
		$form = new QuizForm();
		$form->get('submit')->setValue('Add');
		$request = $this->getRequest();
		if ($request->isPost()) {
			$quiz = new Quiz();
            // $form->setInputFilter($mp3->getInputFilter());
			$post = array_merge_recursive($request->getPost()->toArray() , $request->getFiles()->toArray());
            // $form->setInputFilter($quiz->getInputFilter());
			$form->setData($post);
			if ($form->isValid()) {
				$quiz->exchangeArray($form->getData());
                // var_dump($quiz);
				$this->getQuizTable()->saveQuiz($quiz);
				$data = $form->getData();
                // Redirect to list of quizs

				return $this->redirect()->toRoute('quiz');
			}
		}

		return array(
			'form' => $form
			);
        // 		$request = $this->getRequest();
        // 		if ($request->isPost()) {
        // // Make certain to merge the files info!
        // 			$mp3 = new Mp3();
        // 			// $form->setInputFilter($mp3->getInputFilter());
        // 			$post = array_merge_recursive(
        // 				$request->getPost()->toArray(),
        // 				$request->getFiles()->toArray()
        // 				);
        // 			$form->setData($post);
        // 			if ($form->isValid()) {
        // 				$mp3->exchangeArray($form->getData());
        // 				var_dump($mp3);
        // 				$this->getMp3Table()->saveMp3($mp3);
        // 				$data = $form->getData();
        // // Form is valid, save the form!
        // 				return $this->redirect()->toRoute('mp3');
        // 				var_dump($form->getData());
        // 			}
        // 		}
        // 		return array('form' => $form);

	}
	public function editAction() {
		$id = (int)$this->params()->fromRoute('id', 0);
		if (!$id) {

			return $this->redirect()->toRoute('quiz', array(
				'action' => 'add'
				));
		}
        // Get the Quiz with the specified id.
        // if it cannot be found, in which case go to the index page.
		try {
			$quiz = $this->getQuizTable()->getQuiz($id);
		}
		catch(\Exception $ex) {

			return $this->redirect()->toRoute('quiz', array(
				'action' => 'index'
				));
		}
		$form = new QuizForm();
		$form->bind($quiz);
		$form->get('submit')->setAttribute('value', 'Edit');
		$request = $this->getRequest();
		if ($request->isPost()) {
			$form->setInputFilter($quiz->getInputFilter());
			$form->setData($request->getPost());
			if ($form->isValid()) {
				$this->getQuizTable()->saveQuiz($quiz);
                // Redirect to list of quizs

				return $this->redirect()->toRoute('quiz');
			}
		}

		return array(
			'id' => $id,
			'form' => $form,
			);
	}
	public function deleteAction() {
		$id = (int)$this->params()->fromRoute('id', 0);
		if (!$id) {

			return $this->redirect()->toRoute('quiz');
		}
		$request = $this->getRequest();
		if ($request->isPost()) {
			$del = $request->getPost('del', 'No');
			if ($del == 'Yes') {
				$id = (int)$request->getPost('id');
				$this->getQuizTable()->deleteQuiz($id);
			}
            // Redirect to list of quizs

			return $this->redirect()->toRoute('quiz');
            // return;

		}

		return array(
			'id' => $id,
			'quiz' => $this->getQuizTable()->getQuiz($id)
			);
	}
	public function jsAction() {
        // $this->view->layout()->scriptTags = '<script src="js/my.js"></script>';

	}
    // module/Quiz/src/Quiz/Controller/QuizController.php:
	public function getQuizTable() {
		if (!$this->quizTable) {
			$sm = $this->getServiceLocator();
			$this->quizTable = $sm->get('Quiz\Model\QuizTable');
		}

		return $this->quizTable;
	}
}

<?php
namespace Mp3\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Mp3\Model\Mp3;
// <-- Add this import
use Mp3\Form\Mp3Form;
// <-- Add this import

class Mp3Controller extends AbstractActionController
{
	protected $mp3Table;

	public function indexAction()
	{
		return new ViewModel(array(
			'Mp3s' => $this->getMp3Table()->fetchAll(),
			));


	}
	public function addAction()
	{
		$form = new Mp3Form();
		$form->get('submit')->setValue('add mp3');
// 		$request = $this->getRequest();
// 		if ($request->isPost()) {
// 			$mp3 = new Mp3();
// 			$form->setInputFilter($mp3->getInputFilter());
// 			$form->setData($request->getPost());
// 			if ($form->isValid()) {
// 				$mp3->exchangeArray($form->getData());
// 				$this->getMp3Table()->saveMp3($mp3);
// // Redirect to list of mp3s
// 				return $this->redirect()->toRoute('mp3');
// 			}
// 		}
// 		return array('form' => $form);

		$request = $this->getRequest();
		if ($request->isPost()) {
// Make certain to merge the files info!
			$mp3 = new Mp3();
			// $form->setInputFilter($mp3->getInputFilter());
			$post = array_merge_recursive(
				$request->getPost()->toArray(),
				$request->getFiles()->toArray()
				);
			$form->setData($post);
			if ($form->isValid()) {
				$mp3->exchangeArray($form->getData());
				var_dump($mp3);
				$this->getMp3Table()->saveMp3($mp3);
				$data = $form->getData();
// Form is valid, save the form!
				return $this->redirect()->toRoute('mp3');
				var_dump($form->getData());
			}
		}
		
		return array('form' => $form);


	}
	public function editAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		if (!$id) {
			return $this->redirect()->toRoute('mp3', array(
				'action' => 'add'
				));
		}
// Get the Mp3 with the specified id.
// if it cannot be found, in which case go to the index page.
		try {
			$mp3 = $this->getMp3Table()->getMp3($id);
		}
		catch (\Exception $ex) {
			return $this->redirect()->toRoute('mp3', array(
				'action' => 'index'
				));
		}
		$form = new Mp3Form();
		$form->bind($mp3);
		$form->get('submit')->setAttribute('value', 'Edit');
		$request = $this->getRequest();
		if ($request->isPost()) {
			$form->setInputFilter($mp3->getInputFilter());
			$form->setData($request->getPost());
			if ($form->isValid()) {
				$this->getMp3Table()->saveMp3($mp3);
// Redirect to list of mp3s
				return $this->redirect()->toRoute('mp3');
			}
		}
		return array(
			'id' => $id,
			'form' => $form,
			);
	}
	public function deleteAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		if (!$id) {
			return $this->redirect()->toRoute('mp3');
		}
		$request = $this->getRequest();
		if ($request->isPost()) {
			$del = $request->getPost('del', 'No');
			if ($del == 'Yes') {
				$id = (int) $request->getPost('id');
				$this->getMp3Table()->deleteMp3($id);
			}
// Redirect to list of Mp3s
			return $this->redirect()->toRoute('mp3');
		}
		return array(
			'id'
			=> $id,
			'mp3' => $this->getMp3Table()->getMp3($id)
			);


	}
	// module/Mp3/src/Mp3/Controller/Mp3Controller.php:
	public function getMp3Table()
	{
		if (!$this->mp3Table) {
			$sm = $this->getServiceLocator();
			$this->mp3Table = $sm->get('Mp3\Model\Mp3Table');
		}
		return $this->mp3Table;
	}

}

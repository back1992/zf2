<?php
namespace Cms\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Cms\Model\Mp3;
// <-- Add this import
use Cms\Form\Mp3Form;
// <-- Add this import
use Zend\File\Transfer\Adapter\Http;
use Zend\File\Transfer\Transfer;

class CmsController extends AbstractActionController
{

	protected $mp3Table;

	public function indexAction()
	{
		return new ViewModel(array(
			'mp3s' => $this->getMp3Table()->fetchAll(),
			));

	}
	public function addAction()
	{
		$form = new Mp3Form();
		$form->get('submit')->setValue('Add');
		$request = $this->getRequest();
		if ($request->isPost()) {
			$mp3 = new Mp3();
			$form->setInputFilter($mp3->getInputFilter());
			$form->setData($request->getPost());
			var_dump($request->getFiles());
			var_dump($request->getPost());
			if ($form->isValid()) {
				$mp3->exchangeArray($form->getData());
				$this->getMp3Table()->saveMp3($mp3);
// Redirect to list of mp3s
				// return $this->redirect()->toRoute('cms');



				// $uploadedData = $form->getValues();
				// var_dump($form);
			}

			// lingai 
			// $adapter = new Http();

			// $adapter->setDestination('/bbc');

			// if (!$adapter->receive()) {
			// 	$messages = $adapter->getMessages();
			// 	echo implode("\n", $messages);
			// }

			$upload = new Transfer();
			// $upload->setDestination($this->config->uploads->product->supplements);
			$upload->setDestination('/bbc');

// Returns all known internal file information
			$files = $upload->getFileInfo();


			// var_dump($files);

			foreach ($files as $file => $info) {
    // file uploaded ?
				if (!$upload->isUploaded($file)) {
					print "Why havn't you uploaded the file ?";
					continue;
				}

    // validators are ok ?
				if (!$upload->isValid($file)) {
					print "Sorry but $file is not what we wanted";
					continue;
				}
			}

			$upload->receive();
			if ($upload->receive()) { 
				echo "The file has been uploaded!";
			}
			

			var_dump($upload->receive());

		}
		return array('form' => $form);

	}
	public function editAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		if (!$id) {
			return $this->redirect()->toRoute('cms', array(
				'action' => 'add'
				));
		}
// Get the Mp3 with the specified id.
// if it cannot be found, in which case go to the index page.
		try {
			$mp3 = $this->getMp3Table()->getMp3($id);
		}
		catch (\Exception $ex) {
			return $this->redirect()->toRoute('cms', array(
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
				return $this->redirect()->toRoute('cms');
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
			return $this->redirect()->toRoute('cms');
		}
		$request = $this->getRequest();
		if ($request->isPost()) {
			$del = $request->getPost('del', 'No');
			if ($del == 'Yes') {
				$id = (int) $request->getPost('id');
				$this->getMp3Table()->deleteMp3($id);
			}
// Redirect to list of mp3s
			return $this->redirect()->toRoute('cms');
		}
		return array(
			'id'
			=> $id,
			'mp3' => $this->getMp3Table()->getMp3($id)
			);

	}
	public function getMp3Table()
	{
		if (!$this->mp3Table) {
			$sm = $this->getServiceLocator();
			$this->mp3Table = $sm->get('Cms\Model\Mp3Table');
		}
		return $this->mp3Table;
	}

}

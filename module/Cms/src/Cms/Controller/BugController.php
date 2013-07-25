<?php
namespace Cms\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Cms\Model\Bug;
// <-- Add this import
use Cms\Form\BugReportForm;
use Cms\Form\UploadForm;
// <-- Add this import
use Zend\File\Transfer\Adapter\Http;
use Zend\File\Transfer\Transfer;
// use Zend\Form\Element\File;


use Zend\Http\PhpEnvironment\Request;
use Zend\Filter;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\InputFilter\FileInput;
use Zend\Validator;

use Zend\Filter\File;

class BugController extends AbstractActionController
{

	protected $bugTable;

	public function indexAction()
	{
		return new ViewModel(array(
			'bugs' => $this->getBugTable()->fetchAll(),
			));
	}
	public function createAction()
	{
	}
	public function submitAction()
	{
		$form = new BugReportForm();
		$form->get('submit')->setValue('Add');
		$request = $this->getRequest();
		if ($request->isPost()) {
			$bug = new Bug();
			$form->setInputFilter($bug->getInputFilter());
			$form->setData($request->getPost());
			if ($form->isValid()) {
				$bug->exchangeArray($form->getData());
				$this->getBugTable()->saveBug($bug);
// Redirect to list of bugs
				return $this->redirect()->toRoute('bug');
			}
		}
		return array('form' => $form);
	}

	public function listAction()
	{

		return new ViewModel(array(
			'bugs' => $this->getBugTable()->fetchAll(),
			));
	}

	public function editAction()
	{

		$id = (int) $this->params()->fromRoute('id', 0);
		if (!$id) {
			return $this->redirect()->toRoute('bug', array(
				'action' => 'submit'
				));
		}
// Get the Bug with the specified id.
// if it cannot be found, in which case go to the index page.
		try {
			$bug = $this->getBugTable()->getBug($id);
		}
		catch (\Exception $ex) {
			return $this->redirect()->toRoute('bug', array(
				'action' => 'index'
				));
		}
		$form = new BugReportForm();
		$form->bind($bug);
		$form->get('submit')->setAttribute('value', 'Edit');
		$request = $this->getRequest();
		if ($request->isPost()) {
			$form->setInputFilter($bug->getInputFilter());
			$form->setData($request->getPost());
			if ($form->isValid()) {
				$this->getBugTable()->saveBug($bug);
// Redirect to list of bugs
				return $this->redirect()->toRoute('bug');
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
			return $this->redirect()->toRoute('bug');
		}
		$request = $this->getRequest();
		if ($request->isPost()) {
			$del = $request->getPost('del', 'No');
			if ($del == 'Yes') {
				$id = (int) $request->getPost('id');
				$this->getBugTable()->deleteBug($id);
			}
// Redirect to list of bugs
			return $this->redirect()->toRoute('bug');
		}
		return array(
			'id'
			=> $id,
			'bug' => $this->getBugTable()->getBug($id)
			);

	}

	public function inputAction()
	{
		
		$form = new BugReportForm();
		$form->get('submit')->setValue('Add');
		$request = $this->getRequest();
		if ($request->isPost()) {
			$bug = new Bug();
			$form->setInputFilter($bug->getInputFilter());
			$form->setData($request->getPost());
			if ($form->isValid()) {
				$bug->exchangeArray($form->getData());
				$this->getBugTable()->saveBug($bug);
// Redirect to list of bugs
				// return $this->redirect()->toRoute('bug');
			}
		}
		var_dump($request->getFiles()->toArray());
		return array('form' => $form);


	}


	public function uploadFormAction()
	{
		$form = new UploadForm('upload-form');

		$request = $this->getRequest();
		if ($request->isPost()) {
// Make certain to merge the files info!
			$post = array_merge_recursive(
				$request->getPost()->toArray(),
				$request->getFiles()->toArray()
				);
			var_dump($post);
			$form->setData($post);
			if ($form->isValid()) {
				$data = $form->getData();
// Form is valid, save the form!
				// return $this->redirect()->toRoute('upload-form/success');
			}
		}
		return array('form' => $form);

	}


	public function renameFormAction()
	{

		$form = new UploadForm('upload-form');

		$tempFile = null;

		$prg = $this->fileprg($form);
		if ($prg instanceof \Zend\Http\PhpEnvironment\Response) {
			var_dump($prg);
        return $prg; // Return PRG redirect response
    } elseif (is_array($prg)) {
    	if ($form->isValid()) {
    		$data = $form->getData();
            // Form is valid, save the form!
    		var_dump($data);
    		// return $this->redirect()->toRoute('upload-form/success');
    	} else {
            // Form not valid, but file uploads might be valid...
            // Get the temporary file information to show the user in the view
    		$fileErrors = $form->get('image-file')->getMessages();
    		if (empty($fileErrors)) {
    			$tempFile = $form->get('image-file')->getValue();
    		}
    	}
    }
    var_dump($tempFile);
    return array(
    	'form'     => $form,
    	'tempFile' => $tempFile,
    	);
}

public function getBugTable()
{
	if (!$this->bugTable) {
		$sm = $this->getServiceLocator();
		$this->bugTable = $sm->get('Cms\Model\BugTable');
	}
	return $this->bugTable;
}


}

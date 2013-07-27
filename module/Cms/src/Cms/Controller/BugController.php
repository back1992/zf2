<?php

namespace Cms\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Cms\Model\Bug;
// <-- Add this import
use Cms\Form\BugReportForm;
use Cms\Form\UploadForm;
use Cms\Form\MyForm;
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

use Zend\Db\Sql\Ddl;
use Zend\Db\Sql\Ddl\Column;

class BugController extends AbstractActionController {

    protected $bugTable;

    public function indexAction() {
        return new ViewModel(array(
            'bugs' => $this->getBugTable()->fetchAll(),
            ));
    }

    public function createAction() {

    }

    public function submitAction() {
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

    public function listAction() {

        return new ViewModel(array(
            'bugs' => $this->getBugTable()->fetchAll(),
            ));
    }

    public function editAction() {

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
        } catch (\Exception $ex) {
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

    public function deleteAction() {
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

    public function inputAction() {

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

    public function uploadFormAction() {
        $form = new UploadForm('upload-form');
        $request = $this->getRequest();
        if ($request->isPost()) {
// Make certain to merge the files info!
            $post = array_merge_recursive(
                $request->getPost()->toArray(), $request->getFiles()->toArray()
                );
            $form->setData($post);
            if ($form->isValid()) {
                $data = $form->getData();
// Form is valid, save the form!
                if (!empty($post['isAjax'])) {
                    return new JsonModel(array(
                        'status'
                        => true,
                        // 'redirect' => $this->url()->fromRoute('upload-form/success'),
                        'formData' => $data,
                        ));
                } else {
// Fallback for non-JS clients
                    // return $this->redirect()->toRoute('upload-form/success');
                }
            } else {
                if (!empty($post['isAjax'])) {
// Send back failure information via JSON
                    return new JsonModel(array(
                        'status'
                        => false,
                        'formErrors' => $form->getMessages(),
                        'formData'
                        => $form->getData(),
                        ));
                }
            }
        }
        // var_dump($form);
        return array('form' => $form);
    }

    public function renameFormAction() {

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
            'form' => $form,
            'tempFile' => $tempFile,
            );
    }

    public function uploadProgressAction() {
        $id = $this->params()->fromQuery('id', null);
        $progress = new \Zend\ProgressBar\Upload\SessionProgress();
        return new \Zend\View\Model\JsonModel($progress->getProgress($id));
    }

// Returns JSON
//{
//
// "total"
// //
// "current"
// //
// "rate"
// //
// "message"
// //
// "done"
// //}


    public function myFormAction() {

        $form = new MyForm('my-form');
        $form->get('submit')->setValue('Add');
        $request = $this->getRequest();
        if ($request->isPost()) {
            $bug = new Bug();
            $form->setInputFilter($bug->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $bug->exchangeArray($form->getData());
                // $this->getBugTable()->saveBug($bug);
// Redirect to list of bugs
                // return $this->redirect()->toRoute('bug');
            }
        }
        var_dump($request->getFiles()->toArray());
        return array('form' => $form);
    }

    public function viewAction() {

        $form = new MyForm('my-form');
//         $form->get('submit')->setValue('Add');
//         $request = $this->getRequest();
//         if ($request->isPost()) {
//             $bug = new Bug();
//             $form->setInputFilter($bug->getInputFilter());
//             $form->setData($request->getPost());
//             if ($form->isValid()) {
//                 $bug->exchangeArray($form->getData());
//                 // $this->getBugTable()->saveBug($bug);
// // Redirect to list of bugs
//                 // return $this->redirect()->toRoute('bug');
//             }
//         }
// Set attributes
        // $form->setAttribute('action', $this->url('bug/process'));
        $form->setAttribute('method', 'post');

        return array('form' => $form);
    }

    public function tableCreateAction() {



        $table = new Ddl\CreateTable();

// or with table
        $table = new Ddl\CreateTable('bar');

// optionally, as a temporary table
        $table = new Ddl\CreateTable('bar', true);

        $table->setTable('bar');

        $table->addColumn(new Column\Integer('id'));
$table->addColumn(new Column\Varchar('name', 255));
    }

    public function getBugTable() {
        if (!$this->bugTable) {
            $sm = $this->getServiceLocator();
            $this->bugTable = $sm->get('Cms\Model\BugTable');
        }
        return $this->bugTable;
    }

}

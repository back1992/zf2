<?php
namespace Cms\Form;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Form\Element\File;
class BugReportForm extends Form
{
	public function __construct($name = null)
	{
// we want to ignore the name passed
		parent::__construct('bugReport');


		$this->addElements();


		$this->setAttribute('method', 'post');
		$this->add(array(
			'name' => 'id',
			'type' => 'Hidden',
			));




		$this->add(array(
			'name' => 'author',
			'type' => 'Text',
			'required' => 'TRUE',
			'size'  => '30',
			'options' => array(
				'label' => 'Author:',
				),
			));

		$this->add(array(
			'name' => 'email',
			'type' => 'Text',
			'required' => 'TRUE',
			'size'  => '40',
			'options' => array(
				'label' => 'Your email address:',
				),
			));


		$this->add(array(
			'name' => 'date',
			'type' => 'Text',
			'required' => 'TRUE',
			'size'  => '20',
			'options' => array(
				'label' => 'Date the issue occurred (mm-dd-yyyy):',
				),
			));


		$this->add(array(
			'name' => 'url',
			'type' => 'Text',
			'required' => 'TRUE',
			'size'  => '50',
			'options' => array(
				'label' => 'Issue URL:',
				),
			));

		$this->add(array(
			'name' => 'description',
			'type' => 'textarea',
			'required' => 'TRUE',
			'cols'  => '50',
			'rows'  => '4',
			'options' => array(
				'label' => 'Issue description:',
				),
			));


		$this->add(array(
			'name' => 'priority',
			'type' => 'select',
			'required' => 'TRUE',
			'options' => array(
				'label' => 'Issue priority:',
				'value_options' => array(
					'low'
					=> 'Low',
					'med'
					=> 'Medium',
					'high'
					=> 'High'
					),
				),
			));


		$this->add(array(
			'name' => 'status',
			'type' => 'select',
			'required' => 'TRUE',
			'options' => array(
				'label' => 'Current status:',
				'value_options' => array(
					'new'
					=> 'New',
					'in_progress'
					=> 'In Progress',
					'resolved'
					=> 'Resolved'
					),
				),

			));

		// $file = new File('image-file');
		// $file->setLabel('Avatar Image Upload')->setAttribute('id', 'image-file');
		// $this->add($file);

		$this->add(array(
			'name' => 'image-file',
			'type' => 'file',
			'required' => 'FALSE',
			'destination' => '/bbc',
			'enctype' => 'multipart/form-data',
			'options' => array(
				'label' => 'File Upload:',
				),

			));


		//Add File Upload
		// $fileUploadElement = new File('avatar');
		// $fileUploadElement->setLabel('Your Avatar:');
		// $fileUploadElement->setDestination('../public/users');
		// $fileUploadElement->addValidator('Count', false, 1);
		// $fileUploadElement->addValidator('Extension', false, 'jpg,gif');
		$this->add(array(
			'name' => 'avatar',
			'type' => 'Zend\Form\Element\File',
			'options' => array(
				'label' => 'avatar',
				),
			));

		$this->add(array(
			'name' => 'submit',
			'type' => 'Submit',
			'attributes' => array(
				'value' => 'Go',
				'id' => 'submitbutton',
				),
			));


	}

	public function addElements()
	{
        // File Input
		$file = new Element\File('image-file');
		$file->setLabel('Avatar Image Upload')
		->setAttribute('id', 'image-file');
		$this->add($file);
	}
}

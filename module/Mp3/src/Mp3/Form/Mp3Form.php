<?php
namespace Mp3\Form;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\InputFilter;
class Mp3Form extends Form
{
	public function __construct($name = null)
	{
// we want to ignore the name passed
		parent::__construct('mp3');
		$this->addElements();
		$this->addInputFilter();


		$this->setAttribute('method', 'post');
		$this->add(array(
			'name' => 'id',
			'type' => 'Hidden',
			));
		$this->add(array(
			'name' => 'title',
			'type' => 'Text',
			'options' => array(
				'label' => 'Title',
				),
			));
		$this->add(array(
			'name' => 'area',
			'type' => 'Text',
			'options' => array(
				'label' => 'Area',
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
		$file = new Element\File('mp3-file');
		$file->setLabel('Mp3 File Upload')
		->setAttribute('id', 'mp3-file');
		$this->add($file);
	}

	public function addInputFilter()
	{
		$inputFilter = new InputFilter\InputFilter();

        // File Input
		$fileInput = new InputFilter\FileInput('mp3-file');
		$fileInput->setRequired(true);
		$fileInput->getFilterChain()->attachByName(
			'filerenameupload',
			array(
				'target'    => './data/tmpuploads/mp3',
				'randomize' => true,
				)
			);
		$inputFilter->add($fileInput);

		$this->setInputFilter($inputFilter);
	}
}

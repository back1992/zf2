<?php
namespace Quiz\Form;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\InputFilter;
class QuizForm extends Form
{
	public function __construct($name = null)
	{
// we want to ignore the name passed
		parent::__construct('quiz');
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
				'label' => 'Title ',
				),
			));
		$this->add(array(
			'name' => 'area',
			'type' => 'Text',
			'options' => array(
				'label' => 'Area ',
				),
			));
		$this->add(array(
			'name' => 'submit',
			'type' => 'Submit',
			'attributes' => array(
				'value' => 'Go ',
				'id' => 'submitbutton',
				),
			));
	}
	public function addElements()
	{
// File Input
		$file = new Element\File('audiofile');
		$file->setLabel('Audio File Upload ')
		->setAttribute('id', 'audiofile');
		$this->add($file);
	}

	public function addInputFilter()
	{
		$inputFilter = new InputFilter\InputFilter();

        // File Input
		$fileInput = new InputFilter\FileInput('audiofile');
		$fileInput->setRequired(true);
		$fileInput->getFilterChain()->attachByName(
			'filerenameupload',
			array(
				'target'    => './data/tmpuploads/audiofile',
				'randomize' => true,
				)
			);
		$inputFilter->add($fileInput);

		$this->setInputFilter($inputFilter);
	}
}

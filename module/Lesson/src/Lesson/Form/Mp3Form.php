<?php
namespace Lesson\Form;
use Zend\Form\Element;
use Zend\Form\Form;
class Mp3Form extends Form
{
	public function __construct($name = null)
	{
// we want to ignore the name passed
		parent::__construct('mp3');
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
			'name' => 'mp3',
			'type' => 'File',
			'destination' => '/bbc',
			'options' => array(
				'label' => 'Mp3 to upload:',
				'destination' => '/bbc',
				),
			));

		// $file = new Element\File('image-file');
		// $file->setLabel('Avatar Image Upload')
		// ->setAttribute('id', 'image-file');
		// $this->add($file);
		$this->add(array(
			'name' => 'image-file-name',
			'id' => 'image-file-id',
			'type' => 'File',
			'destination' => '/bbc',
			'options' => array(
				'label' => 'image-file-lable',
				'destination' => '/bbc',
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
}

<?php
namespace Cms\Model;
// Add these import statements
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
class Bug implements InputFilterAwareInterface
{
	public $id;
	public $author;
	public $email;
	public $date;
	public $url;
	public $description;
	public $priority;
	public $status;
	protected $inputFilter;
// <-- Add this variable
	public function exchangeArray($data)
	{
		$this->id
		= (isset($data['id']))
		? $data['id']
		: null;
		$this->author = (isset($data['author'])) ? $data['author'] : null;
		$this->email = (isset($data['email'])) ? $data['email'] : null;
		$this->date = (isset($data['date'])) ? $data['date'] : null;
		$this->url = (isset($data['url'])) ? $data['url'] : null;
		$this->description = (isset($data['description'])) ? $data['description'] : null;
		$this->priority = (isset($data['priority'])) ? $data['priority'] : null;
		$this->status = (isset($data['status'])) ? $data['status'] : null;
	}
// Add content to these methods:
	public function setInputFilter(InputFilterInterface $inputFilter)
	{
		throw new \Exception("Not used");
	}
	public function getInputFilter()
	{
		if (!$this->inputFilter) {
			$inputFilter = new InputFilter();
			$factory
			= new InputFactory();
			$inputFilter->add($factory->createInput(array(
				'name'
				=> 'id',
				'required' => true,
				'filters' => array(
					array('name' => 'Int'),
					),
				)));
			$inputFilter->add($factory->createInput(array(
				'name'
				=> 'author',
				'required' => true,
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
					),
				'validators' => array(
					array(
						'name'
						=> 'StringLength',
						'options' => array(
							'encoding' => 'UTF-8',
							'min'
							=> 1,
							'max'
							=> 100,
							),
						),
					),
				)));
			$inputFilter->add($factory->createInput(array(
				'name'
				=> 'email',
				'required' => true,
				'filters' => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
					),
				'validators' => array(
					array(
						'name'
						=> 'StringLength',
						'options' => array(
							'encoding' => 'UTF-8',
							'min'
							=> 1,
							'max'
							=> 100,
							),
						),
					),
				)));
			$this->inputFilter = $inputFilter;
		}
		return $this->inputFilter;
	}
	// Add the following method:
	public function getArrayCopy()
	{
		return get_object_vars($this);
	}

}


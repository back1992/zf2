<?php
namespace Cms\Form;
// File: MyForm.php

use Zend\InputFilter;
// use Zend\Form\Element;
// use Zend\Form\Form;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Captcha;
class MyForm extends Form
{
	public function __construct($name = null, $options = array())
	{
		parent::__construct($name, $options);
		$this->addElements();
		$this->addInputFilter();
	}
	public function addElements()
	{
// File Input
		$file = new Element\File('image-file');
        $file->setLabel('Avatar Image Upload')
                ->setAttribute('id', 'image-file')
                ->setAttribute('multiple', true);
        $this->add($file);


        $username = new Element\Text('username');
        $username
                ->setLabel('Username')
                ->setAttributes(array(
                    'class' => 'username',
                    'size' => '30',
        ));

        $this->add($username);
        $password = new Element\Password('password');
        $password
                ->setLabel('Password')
                ->setAttributes(array(
                    'size' => '30',
        ));
        $form = new Form('my-form');
        $this->add($password);

        $button = new Element\Button('my-button');
        $button->setLabel('My Button')
                ->setValue('foo');
        $this->add($button);

        $captcha = new Element\Captcha('captcha');
        $captcha
                ->setCaptcha(new Captcha\Dumb())
                ->setLabel('Please verify you are human');
        $this->add($captcha);

        $checkbox = new Element\Checkbox('checkbox');
        $checkbox->setLabel('A checkbox');
        $checkbox->setUseHiddenElement(true);
        $checkbox->setCheckedValue("good");
        $checkbox->setUncheckedValue("bad");
        $this->add($checkbox);

        $colors = new Element\Collection('collection');
        $colors->setLabel('Colors');
        $colors->setCount(2);
        $colors->setTargetElement(new Element\Color());
        $colors->setShouldCreateTemplate(true);
        $this->add($colors);

        // $csrf = new Element\Csrf('csrf');
        // $this->add($csrf);

// Single file upload
        $file = new Element\File('file');
        $file->setLabel('Single file input');
// HTML5 multiple file upload
        $multiFile = new Element\File('multi-file');
        $multiFile->setLabel('Multi file input')
                ->setAttribute('multiple', true);
        $this->add($multiFile);

        // $hidden = new Element\Hidden('my-hidden');
        // $hidden->setValue('foo');
        // $this->add($hidden);

        // $image = new Element\Image('my-image');
        // $image->setAttribute('src', 'http://my.image.url'); // Src attribute is required
        // $this->add($image);

        $monthYear = new Element\MonthSelect('monthyear');
        $monthYear->setLabel('Select a month and a year');
        $monthYear->setMinYear(1986);
        $this->add($monthYear);

        $multiCheckbox = new Element\MultiCheckbox('multi-checkbox');
        $multiCheckbox->setLabel('What do you like ?');
        $multiCheckbox->setValueOptions(array(
            '0' => 'Apple',
            '1' => 'Orange',
            '2' => 'Lemon'
        ));
        $this->add($multiCheckbox);

        $radio = new Element\Radio('gender');
        $radio->setLabel('What is your gender ?');
        $radio->setValueOptions(array(
            '0' => 'Female',
            '1' => 'Male',
        ));
        $this->add($radio);

        $select = new Element\Select('language');
        $select->setLabel('Which is your mother tongue?');
        $select->setValueOptions(array(
            '0' => 'French',
            '1' => 'English',
            '2' => 'Japanese',
            '3' => 'Chinese',
        ));
        $this->add($select);

        $text = new Element\Text('my-text');
        $text->setLabel('Enter your name');
        $this->add($text);

        $textarea = new Element\Textarea('my-textarea');
        $textarea->setLabel('Enter a description');
        $this->add($textarea);

        $color = new Element\Color('color');
        $color->setLabel('Background color');
        $this->add($color);

        $date = new Element\Date('appointment-date');
        $date
                ->setLabel('Appointment Date')
                ->setAttributes(array(
                    'min' => '2012-01-01',
                    'max' => '2020-01-01',
                    'step' => '1', // days; default step interval is 1 day
                ))
                ->setOptions(array(
                    'format' => 'Y-m-d'
        ));
        $this->add($date);

        $dateTime = new Element\DateTime('appointment-date-time');
        $dateTime
                ->setLabel('Appointment Date/Time')
                ->setAttributes(array(
                    'min' => '2010-01-01T00:00:00Z',
                    'max' => '2020-01-01T00:00:00Z',
                    'step' => '1', // minutes; default step interval is 1 min
                ))
                ->setOptions(array(
                    'format' => 'Y-m-d\TH:iP'
        ));
        $this->add($dateTime);

        $dateTimeLocal = new Element\DateTimeLocal('appointment-date-time');
        $dateTimeLocal
                ->setLabel('Appointment Date')
                ->setAttributes(array(
                    'min' => '2010-01-01T00:00:00',
                    'max' => '2020-01-01T00:00:00',
                    'step' => '1', // minutes; default step interval is 1 min
                ))
                ->setOptions(array(
                    'format' => 'Y-m-d\TH:i'
        ));
        $this->add($dateTimeLocal);

        $email = new Element\Email('email');
        $email->setLabel('Email Address');
        $this->add($email);
// Comma separated list of emails
        $emails = new Element\Email('emails');
        $emails
                ->setLabel('Email Addresses')
                ->setAttribute('multiple', true);
        $this->add($email);

        $month = new Element\Month('month');
        $month
                ->setLabel('Month')
                ->setAttributes(array(
                    'min' => '2012-01',
                    'max' => '2020-01',
                    'step' => '1', // months; default step interval is 1 month
        ));
        $this->add($month);

        $number = new Element\Number('quantity');
        $number
                ->setLabel('Quantity')
                ->setAttributes(array(
                    'min' => '0',
                    'max' => '10',
                    'step' => '1', // default step interval is 1
        ));
        $this->add($number);

        $range = new Element\Range('range');
        $range
                ->setLabel('Minimum and Maximum Amount')
                ->setAttributes(array(
                    'min' => '0',
// default minimum is 0
                    'max' => '100', // default maximum is 100
                    'step' => '1',
// default interval is 1
        ));
        $this->add($range);

        $time = new Element\Time('time');
        $time
                ->setLabel('Time')
                ->setAttributes(array(
                    'min' => '00:00:00',
                    'max' => '23:59:59',
                    'step' => '60', // seconds; default step interval is 60 seconds
                ))
                ->setOptions(array(
                    'format' => 'H:i:s'
        ));
        $this->add($time);

        $url = new Element\Url('webpage-url');
        $url->setLabel('Webpage URL');
        $this->add($url);

        $week = new Element\Week('week');
        $week
                ->setLabel('Week')
                ->setAttributes(array(
                    'min' => '2012-W01',
                    'max' => '2020-W01',
                    'step' => '1', // weeks; default step interval is 1 week
        ));
        $this->add($week);
	}

	public function addInputFilter() {
		$inputFilter = new InputFilter\InputFilter();
// File Input
		$fileInput = new InputFilter\FileInput('image-file');
		$fileInput->setRequired(true);
// You only need to define validators and filters
// as if only one file was being uploaded. All files
// will be run through the same validators and filters
// automatically.
		$fileInput->getValidatorChain()
		->attachByName('filesize', array('max' => 204800))
		->attachByName('filemimetype', array('mimeType' => 'image/png,image/jpg,image/jpeg,image/x-png'))
		->attachByName('fileimagesize', array('maxWidth' => 2000, 'maxHeight' => 1000));
// All files will be renamed, i.e.:
//
//         ./data/tmpuploads/avatar_4b3403665fea6.png,
// //
//         ./data/tmpuploads/avatar_5c45147660fb7.png
		$fileInput->getFilterChain()->attachByName(
			'filerenameupload', array(
				'target'
				=> './data/tmpuploads/avatar.png',
				'randomize' => true,
				)
			);
		$inputFilter->add($fileInput);
		$this->setInputFilter($inputFilter);
	}
}
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
		// grab the paginator from the Mp3Table
		$paginator = $this->getMp3Table()->fetchAll(true);
// set the current page to what has been passed in query string, or to 1 if none set
		$paginator->setCurrentPageNumber((int)$this->params()->fromQuery('page', 1));
// set the number of items per page to 10
		$paginator->setItemCountPerPage(10);
		// echo "<pre>";
		// var_dump($paginator);
		// echo "</pre>";
		// 
		return new ViewModel(array(
			'paginator' => $paginator
			));


	}
	public function addAction()
	{
		$form = new Mp3Form();
		$form->get('submit')->setValue('Add');
		$request = $this->getRequest();
		if ($request->isPost()) {
			$mp3 = new Mp3();
						// $form->setInputFilter($mp3->getInputFilter());
			$post = array_merge_recursive(
				$request->getPost()->toArray(),
				$request->getFiles()->toArray()
				);
			// $form->setInputFilter($mp3->getInputFilter());
			$form->setData($post);
			if ($form->isValid()) {
				$mp3->exchangeArray($form->getData());
				// var_dump($mp3);
				$this->getMp3Table()->saveMp3($mp3);
				$data = $form->getData();
// Redirect to list of mp3s
				return $this->redirect()->toRoute('mp3');
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
		
		$mp3->audiofilename = basename($mp3->audiofilepath);
		$mp3->audiofiledir = dirname($mp3->audiofilepath);
		// var_dump($mp3);
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
// Redirect to list of mp3s
			return $this->redirect()->toRoute('mp3');
			// return;
		}
		return array(
			'id'
			=> $id,
			'mp3' => $this->getMp3Table()->getMp3($id)
			);

	}
	
	public function spltAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		if (!$id) {
			return $this->redirect()->toRoute('mp3', array(
				'action' => 'edit'
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
		$spltlog = shell_exec('mp3splt -s -p th=-25,nt=10,min=0.17 ' . $mp3->audiofilepath);
		return array(
			'spltlog' => $spltlog
			);
	}

	public function readlogAction()
	{
// 		$id = (int) $this->params()->fromRoute('id', 0);
// 		if (!$id) {
// 			return $this->redirect()->toRoute('mp3', array(
// 				'action' => 'edit'
// 				));
// 		}
// // Get the Mp3 with the specified id.
// // if it cannot be found, in which case go to the index page.
// 		try {
// 			$mp3 = $this->getMp3Table()->getMp3($id);
// 		}
// 		catch (\Exception $ex) {
// 			return $this->redirect()->toRoute('mp3', array(
// 				'action' => 'index'
// 				));
// 		}
		$audiofile =  './data/tmpuploads/audiofile_520310b0cf57e';
		$logfile = './data/tmpuploads/mp3splt.log';
		$logArray =  file($logfile);
		array_splice($logArray,  0, 2);		

		for ($i=0; $i<count($logArray); $i++) {
			$logArray[$i] = preg_split("/[\s,]+/", $logArray[$i]);
			array_splice($logArray[$i], 2, 2);
		}
		sort ($logArray);
		return array(
			'logArray' => $logArray,
			'audiofile' => $audiofile,
			);
	}

	public function testAction()
	{
        // action body
		$mp3Tag = file_get_contents('./data/audio/mp3tag');

//echo $mp3Tag;
//$mp3TagArray = explode(' ', $mp3Tag);
//print_r($mp3TagArray);

		$pattern = '/\d*\.\d*/';
		preg_match_all($pattern, $mp3Tag, $matches);
//print_r($matches);

		foreach (array_unique($matches[0]) as $matches_value) {
			$mp3TagArrayTmp[] = $matches_value;
		}

        // print_r($mp3TagArrayTmp);
		echo '<br />';
		// echo  $this->view->baseUrl();

//
//array_shift($mp3TagArray);
//print_r($mp3TagArray);
//echo '<br />';
//
//
		// function fine($n) {
  //           // (($n-1)>0) ? return($n-1) : return($n);
		// 	return($n-1);
		// }

		// $mp3TagArrayTmp = array_map("fine", $mp3TagArrayTmp);
		// array_unshift($mp3TagArrayTmp, "0");
		// print_r($mp3TagArrayTmp);
  //       // print_r($mp3TagArray);
		// echo '<br />';


		$file_str_seri = './data/audio/encode/mp3silennce_seri.txt';
        // chmod("audio/encode", 0755);
        // $ourFileHandle = fopen($file_str_seri, 'w') or die("can't open file");
		$result_str_seri = serialize($mp3TagArrayTmp);
		file_put_contents($file_str_seri, $result_str_seri);
        // fclose($ourFileHandle);
		return array(
			'mp3TagArrayTmp' => $mp3TagArrayTmp,
			// 'audiofile' => $audiofile,
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

	public function audio_echo_str($src, $start, $end) {
		$audio_str = '<audio src="' . $src . '#t=' . $start . ',' . $end . '"  controls autoplay="true">';
		$audio_str .= 'audio is not supported.';
		$audio_str .= '</audio>';
		return $audio_str;
	}
}

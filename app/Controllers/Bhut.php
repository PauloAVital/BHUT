<?php
namespace App\Controllers;

//use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\LogModel;

class Bhut extends BaseController
{
	protected $logModel;

    public function __construct(){        
        $this->logModel = new LogModel();
	}
	
	public function createCar() {
		/* 
		   {        
				"title": "HONDA_CIVIC NEW",
				"brand": "HONDA",
				"price": "200",
				"age": 2020
			}
        */
		
		$carInfo = $this->request->getJSON();
		
		$headers = array('Content-Type: application/json');

		$ci = curl_init();
 
		curl_setopt( $ci, CURLOPT_URL, "http://157.230.213.199:3000/api/cars" ); 
		curl_setopt( $ci, CURLOPT_POST, true);
		curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ci, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ci, CURLOPT_POSTFIELDS, json_encode($carInfo));
		curl_setopt( $ci, CURLOPT_HEADER, false );
		
		$result = curl_exec( $ci );
		
		$_retorno = json_decode( $result, true );
		
		var_dump($_retorno);
		// # Tratamento de Log				
		$id = $this->searchListCars($carInfo->title);				
		$request = $this->logModel->save(['car_id'=>$id]);
	}
	function listCars(){				
		$headers =  array('Content-Type: application/json',);
				
		$url = 'http://157.230.213.199:3000/api/cars'; 
				
		$ch = curl_init();
				
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
		
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				
		$result = curl_exec($ch);

		curl_close($ch);
		
		$items = json_decode($result);
		
		echo json_encode($items);
	}

	function searchListCars($name){				
		$headers =  array('Content-Type: application/json',);
				
		$url = 'http://157.230.213.199:3000/api/cars'; 
				
		$ch = curl_init();
				
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
		
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				
		$result = curl_exec($ch);

		curl_close($ch);
		
		$items = json_decode($result);
		
		$key = array_search($name, array_column($items, 'title'));
		
		return $items[$key]->_id;
		//echo json_encode($items);
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$curl = curl_init();
		$API_KEY = '47e7156eac2a20cb7a304fc5a5ece002';
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.themoviedb.org/3/authentication/token/new?api_key=".$API_KEY."",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "{}",
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  $response = json_decode($response);
		  $request_token = $response->request_token;
		  if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
			    $location = "https://www.themoviedb.org/authenticate/".$request_token."?redirect_to=http://localhost:8095/StarMovies/index.php/Welcome/CreateSession/";
			    header('HTTP/1.1 301 Moved Permanently');
			    header('Location: ' . $location);
			    exit;
			}
		}
	}

	public function CreateSession(){
    $API_KEY = '47e7156eac2a20cb7a304fc5a5ece002';
    
    $request_token = $_GET['request_token'];
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.themoviedb.org/3/authentication/session/new?api_key=".$API_KEY."",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "{\"request_token\":\"".$request_token."\"}",
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/json"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  $response = json_decode($response);
		  $session_id = $response->session_id;

		  $this->ShowWelcomeView($session_id,$API_KEY);
		}
	}

	public function ShowWelcomeView($session_id,$API_KEY){
		if(isset($session_id) && isset($API_KEY)){
     	$data['session_id'] = $session_id;
     	$data['API_KEY']  = $API_KEY;


     	$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.themoviedb.org/3/trending/all/week?api_key=".$API_KEY."",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_POSTFIELDS => "{}",
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $response = json_decode($response,true);
			  $data['trending_movies'] = $response;
			}


			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.themoviedb.org/3/movie/upcoming?api_key=".$API_KEY."",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_POSTFIELDS => "{}",
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $response = json_decode($response,true);
			  $data['upcoming_movies'] = $response;
			}

     	$this->load->view('welcome_view',$data);
		}
		else{
			echo "Error!";
			die();
		}
	}

	/*public function SearchMovies(){
		$API_KEY = $this->uri->segment(3);

	}*/
}

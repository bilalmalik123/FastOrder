<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;

class Task1Controller extends BaseController
{

	public function task1()
	{
		\Twig_Autoloader::register();
	    $loader = new \Twig_Loader_Filesystem(app_path() . '/../resources/views');
	    $twig = new \Twig_Environment($loader);

	  
		$url = "https://hn.algolia.com/api/v1/search?numericFilters&hitsPerPage=10";
		$response = \Httpful\Request::get($url)->send();

		try
		{
			if ($response->hasErrors()) 
			{
		        throw new Exception('Invalid response. Got a HTTP ' . $response->code . "\r\n\r\n" . $response->raw_headers . "\r\n\r\n" . $response->raw_body . "\r\n\r\nRequest was: " . $request->method . ': ' . $request->uri . "\r\n" . $request->raw_headers . "\r\n\r\n" . $request->payload);
		    }
			else
			{	
				$data = $response->body->hits; 
				// echo "<pre>";
				// print_r($data);
			}
			echo $twig->render('tasks/task1.twig.php', array('debug' => true, 'data' => $data));
		}

		catch(\Exception $e)
		{
            $message = $e->getMessage();
            // echo $message;

            $oops = 'Opps Something went wrong. Please try again later.' ;
            return $oops;
		}
	}

}

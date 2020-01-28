<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;

class Task2Controller extends BaseController
{

	public function task2()
	{
		\Twig_Autoloader::register();
	    $loader = new \Twig_Loader_Filesystem(app_path() . '/../resources/views');
	    $twig = new \Twig_Environment($loader);

	    $date = date('yy-m-d');
	   
		$url = "http://api.tvmaze.com/schedule?country=US&date=".$date;
		$response = \Httpful\Request::get($url)->send();

		try
		{
			if ($response->hasErrors()) 
			{
		    	throw new Exception('Invalid response. Got a HTTP ' . $response->code . "\r\n\r\n" . $response->raw_headers . "\r\n\r\n" . $response->raw_body . "\r\n\r\nRequest was: " . $request->method . ': ' . $request->uri . "\r\n" . $request->raw_headers . "\r\n\r\n" . $request->payload);
		    }
			else
			{	
				$data[] = $response->body;
			}
			$data = json_decode( json_encode($data), true);

			echo $twig->render('tasks/task2.twig.php', array('debug' => true,'data'=>$data));

		}
		catch(\Exception $e)
		{
            $message = $e->getMessage();
           	// echo $message;

            $oops = 'Opps Something went wrong. Please try again later.' ;
            return $oops;
		}
	}

	public function getshow(Request $request)
	{
		$show_id = $request->input('id');
		$url = "http://api.tvmaze.com/shows/".$show_id;
		$response = \Httpful\Request::get($url)->send();

		try
		{
			if ($response->hasErrors()) 
			{
		    	throw new Exception('Invalid response. Got a HTTP ' . $response->code . "\r\n\r\n" . $response->raw_headers . "\r\n\r\n" . $response->raw_body . "\r\n\r\nRequest was: " . $request->method . ': ' . $request->uri . "\r\n" . $request->raw_headers . "\r\n\r\n" . $request->payload);
		    }
			else
			{	
				$data[] = $response->body;
			}
			return $data = json_decode( json_encode($data), true);

		}
		catch(\Exception $e)
		{
            $message = $e->getMessage();
           	//echo $message;

            $oops = 'Opps Something went wrong. Please try again later.' ;
            return $oops;
		}
	}
}

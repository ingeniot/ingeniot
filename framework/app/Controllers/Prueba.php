<?php namespace App\Controllers;

class Prueba extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}
	public function prueba(){
		echo "esto es una prueba";
	}
	//--------------------------------------------------------------------

}

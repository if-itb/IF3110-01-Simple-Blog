<?php namespace App\Http\Controllers;

use DB;
use Input;
use App\Quotation;
use Session;

class LoginController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('loginPage');
	}
	
	/**
	* Login has several role : dinas, UKM, industri
	* @redirect
	*/
	public function validateLogin()
	{

		$inputUsername = Input::get('username');
		$inputPassword = Input::get('password');

		echo (Input::get('username'));
		echo (Input::get('password'));

		$results = DB::select('select * from ppl_ukmin_dinas where username="'.$inputUsername.'" and password="'.$inputPassword.'"');
		if ($results!=NULL) 
		{
			//$this->middleware('auth');
			Session::put('username', $inputUsername);
			Session::put('role', 'dinas');
			return redirect('dashboardDinas');
		}
		else 
		{
			//tes apakah ada di tabel ukm/industri
			$results = DB::select('select * from ppl_ukmin_industri where username="'.$inputUsername.'" and password="'.$inputPassword.'"');
			if ($results!=NULL)
			{
				foreach ($results as $row) {
					$no_registrasi = $row->no_registrasi;
				}

				$results = DB::select('select * from ppl_ukmin_verifikasi where no_registrasi="'.$no_registrasi.'" and status="verified"');
				if ($results!=NULL)
				{
					Session::put('username', $inputUsername);
					Session::put('id', $row->id_industri);
					Session::put('role','industri');
					Session::put('no_registrasi',$no_registrasi);
					return redirect('dashboardUKMIN');
				}
				else
					return redirect('/login');
			}
			else {
				$results = DB::select('select * from ppl_ukmin_ukm where username="'.$inputUsername.'" and password="'.$inputPassword.'"');
				if ($results!=NULL)
				{
					foreach ($results as $row) {
						$no_registrasi = $row->no_registrasi;
					}

					$results = DB::select('select * from ppl_ukmin_verifikasi where no_registrasi="'.$no_registrasi.'" and status="verified"');
					if ($results!=NULL)
					{
						Session::put('username', $inputUsername);
						Session::put('id', $row->id_ukm);
						Session::put('role','ukm');
						Session::put('no_registrasi',$no_registrasi);
						return redirect('dashboardUKMIN');
					}
					else
						return redirect('/login');
				}
			}
			return redirect('/login');
		}
	}

	public function logout() 
	{
		Session::flush();
		return redirect('/login');
	}
}

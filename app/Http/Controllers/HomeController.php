<?php namespace App\Http\Controllers;

use Auth;
use App\Event;
use Carbon\Carbon;

class HomeController extends Controller {

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
		$this->middleware('auth');
	}


	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index($date = null)
	{
       /* Provide all events for given month to that user
       */
        $dt = Carbon::parse($date);

		$userID = Auth::id();
		$events = Event::month($dt)->get();
		
		return view('home', compact('events', 'date'));
	}


}

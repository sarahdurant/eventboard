<?php namespace App\Http\Controllers;

use Auth;
use App\Event;
use App\Http\Requests;
use App\Http\Requests\EventRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


class EventsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $events = Event::all();

        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(EventRequest $request)
    {
        $event = new Event($request->all());
        $event->organizerID = Auth::id();
				$event->startDate = Carbon::parse($event->startDate)->toDateTimeString();
				$event->endDate = Carbon::parse($event->endDate)->toDateTimeString();
        $event->save();

        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('events.show', compact('event'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, EventRequest $request)
    {
        $event = Event::findOrFail($id);

        $event->update($request->all());
    }

		/**
     * List all events on the given date
     *
     * @param  string $date
     * @return Response
     */
		public function listDate($date) {
			$dt = Carbon::parse($date);
			$dayEvents = Event::day($dt)->get();
			
			return view('events.list', compact('dayEvents'));
		}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
				$event = Event::find($id);
				$title = $event->title;
        Event::destroy($id);
				
				return "Deleted event '{$title}'. ID: {$id}";
    }
}

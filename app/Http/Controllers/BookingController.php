<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScheduledClass;

class BookingController extends Controller
{
    /** 
     * Show all the bookings of the authenticated user. 
     */
    public function index()
    {
        $bookings = auth()->user()->bookings()->where('date_time', '>', now())->get();

        return view('members.upcoming')->with('bookings', $bookings);
    }

    /** 
     * S
     */
    public function create()
    {
        $scheduledClasses = ScheduledClass::where('date_time', '>', now())
            ->with(['classType', 'instructor'])
            ->oldest()->get();

        return view('members.book')
            ->with('scheduledClasses', $scheduledClasses);
    }    

    /** 
     * Store a newly booked class in the datanbase.
     */
    public function store(Request $request)
    {
        auth()->user()->bookings()->attach($request->scheduled_class_id);

        return redirect()->route('booking.index');
    }

    public function destroy(int $id)
    {
        auth()->user()->bookings()->detach($id);

        return redirect()->route('booking.index');
    }
}

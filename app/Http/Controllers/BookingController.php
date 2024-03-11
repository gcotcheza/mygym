<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScheduledClass;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BookingController extends Controller
{
    /** 
     * Show all the bookings of the authenticated user. 
     */
    public function index(): View
    {
        $bookings = auth()->user()->bookings()->upcoming()->get();

        return view('members.upcoming')->with('bookings', $bookings);
    }

    /** 
     * Show the form for creating a new booking.
     */
    public function create(): View
    {
        $scheduledClasses = ScheduledClass::upcoming()
            ->with(['classType', 'instructor'])
            ->notBooked()
            ->oldest()->get();

        return view('members.book')
            ->with('scheduledClasses', $scheduledClasses);
    }

    /** 
     * Store a newly booked class in the datanbase.
     */
    public function store(Request $request): RedirectResponse
    {
        // check if it's already attached before attaching it. 
        auth()->user()->bookings()->syncWithoutDetaching([$request->scheduled_class_id]);

        return redirect()->route('booking.index');
    }

    /** 
     * Destroy a booking resource.
     */
    public function destroy(int $id): RedirectResponse
    {
        auth()->user()->bookings()->detach($id);

        return redirect()->route('booking.index');
    }
}

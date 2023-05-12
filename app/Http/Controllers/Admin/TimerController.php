<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Timer;
use Illuminate\Http\Request;

class TimerController extends Controller
{
    public function index()
    {
        $timers = Timer::orderBy('id', 'desc')->paginate(10);
        return view('admin.timer.index', compact('timers'));
    }
    public function create()
    {
        return view('admin.customers.create');
    }
    public function store(Request $request)
    {

        $customer = new Timer();
        $customer->name = $request['name'];

        $customer->save();
        return redirect('admin/timers')->with('message', 'Timer Has Added');
    }
    public function edit(Timer $timer)
    {
        return view('admin.timer.edit', compact('timer'));
    }
    public function update(Request $request, $timer)
    {
        $timer = Timer::findOrFail($timer);
        $timer->name = $request['name'];
        $timer->update();
        return redirect('admin/timers')->with('message', 'Customer update Succesfully');
    }
    public function destroy(int $timer_id)
    {
        $timer = Timer::findOrFail($timer_id);
        $timer->delete();
        return redirect()->back()->with('message', 'Customer has ben Deleted!');
    }
}

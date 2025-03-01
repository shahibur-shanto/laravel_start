<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {

    return view('home');
});


Route::get('/jobs', function () {
//    $jobs = Job::with('employer')->get();
//    $jobs = Job::with('employer')->paginate(3);
$jobs = Job::with('employer')->latest()->simplePaginate(3);
//    return response()->json($jobs);
    return view('jobs.index', [
        'jobs' => $jobs
]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');

});

Route::post('/jobs', function () {
//    dd(request()->all());
    request()->validate([
        'title'=>['required','min:3'],
        'salary'=>['required',]
    ]);

    Job::create([
        'title'=>request('title'),
        'salary'=>request('salary'),
        'employer_id'=>1
    ]);
    return redirect('/jobs');
});

//Show
Route::get('/jobs/{job}', function (Job $job) {

//    $res = Job::find($id);
//    return view('jobs.show', ['job' => $res]);
    return view('jobs.show', ['job' => $job]);

});


//Edit
Route::get('/jobs/{job}/edit', function (Job $job) {

//    $res = Job::find($id);
//    return view('jobs.edit', ['job' => $res]);
    return view('jobs.edit', ['job' => $job]);


});
//Update
Route::patch('/jobs/{job}', function (Job $job) {
//validate
    request()->validate([
        'title'=>['required','min:3'],
        'salary'=>['required',]
    ]);
//authorized
//update the jo

//    $job = Job::findOrFail($id);
    //one methotd
//    $job->title = request('title');
//    $job->salary = request('salary');
//    $job->save();

    //Another Method
    $job->update([
        'title'=>request('title'),
        'salary'=>request('salary')

    ]);
// redirect to the job page
    return redirect('/jobs/'.$job->id);


});


//Delete
Route::delete('/jobs/{job}', function (Job $job) {
    //one method
    //    $job = Job::findOrFail($id);
    //    $job->delete();
$job->delete();
    //another method
//    Job::findOrFail($job)->delete();



    return redirect("/jobs");


});



Route::get('/contact', function () {
    return view('contact');
});



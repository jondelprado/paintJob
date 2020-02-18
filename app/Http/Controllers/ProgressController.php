<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaintJobProgress;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function home(){
      $navbarActive = array(
        'homelink' => 'active',
        'hometext' => 'black',
      );

      return view('home.index')->with($navbarActive);
    }

    public function index()
    {


      $navbarActive = array(
        'adminlink' => 'active',
        'admintext' => 'black',
      );

      return view('admin.index')->with($navbarActive);

    }

    public function refreshProgress(){

      $jobs = PaintJobProgress::where('status','In Progress')->get();
      return response()->json($jobs);

    }

    public function refreshQueue(){

      $queues = PaintJobProgress::where('status', 'In Queue')->get();
      return response()->json($queues);

    }

    public function showPerformance(){

      $totalCarsPainted = PaintJobProgress::where('status', 'Completed')->get();
      $totalRedCars = PaintJobProgress::where('status', 'Completed')->where('target_color', 'red')->get();
      $totalBlueCars = PaintJobProgress::where('status', 'Completed')->where('target_color', 'blue')->get();
      $totalGreenCars = PaintJobProgress::where('status', 'Completed')->where('target_color', 'green')->get();

      $totalCount = $totalCarsPainted->count();
      $totalRedCount = $totalRedCars->count();
      $totalBlueCount = $totalBlueCars->count();
      $totalGreenCount = $totalGreenCars->count();

      $countArray = array(
        "counts" => array(
          "total" => $totalCount,
          "red" => $totalRedCount,
          "blue" => $totalBlueCount,
          "green" => $totalGreenCount,
        )
      );

      return response()->json($countArray);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

          'plate_number' => 'required',
          'current_color' => 'required',
          'target_color' => 'required',

        ]);

        $inProgress = PaintJobProgress::where('status','In Progress')->get();
        $countProgress = $inProgress->count();

        if ($countProgress >= 5) {
          $progress = new PaintJobProgress;
          $progress->plate = strtoupper($request->input('plate_number'));
          $progress->current_color = $request->input('current_color');
          $progress->target_color = $request->input('target_color');
          $progress->status = "In Queue";

          $progress->save();

          return redirect('http://localhost/paintJob/public/paint-jobs');
        }
        else {
          $progress = new PaintJobProgress;
          $progress->plate = strtoupper($request->input('plate_number'));
          $progress->current_color = $request->input('current_color');
          $progress->target_color = $request->input('target_color');
          $progress->status = "In Progress";

          $progress->save();

          return redirect('http://localhost/paintJob/public/paint-jobs');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id = $request->jobID;

        $job = PaintJobProgress::find($id);
        $job->status = "Completed";
        $job->save();

        $countQueue = PaintJobProgress::where('status', 'In Queue')->orderBy('created_at', 'asc')->count();

        // $countQueue = $getQueue->count();

        if ($countQueue >= 1) {
          $getQueue = PaintJobProgress::where('status', 'In Queue')->orderBy('created_at', 'asc')->first();
          $updateQueue = PaintJobProgress::find($getQueue->id);
          $updateQueue->status = "In Progress";

          $updateQueue->save();
        }

        return redirect('http://localhost/paintJob/public/paint-jobs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

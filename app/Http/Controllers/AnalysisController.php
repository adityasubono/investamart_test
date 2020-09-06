<?php

namespace App\Http\Controllers;

use App\Analysis;
use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nilai = DB::select("SELECT analysis.user_id, SUM(opportunist) as a, SUM(yolo) as b, SUM(optimistic) as c,
                            (SUM(opportunist) +  SUM(yolo) +  SUM(optimistic)) as total 
                             FROM `analysis` JOIN answers ON analysis.answer_id = answers.id GROUP BY analysis.user_id");

        return view('analysis.index',compact('nilai'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

//            dd($request->answer);
            foreach ($request->answer as $key => $value) {
                Analysis::create($value);
            }

            return redirect()->action('AnalysisController@show', ['id' => $request->user_id])
                ->with('success', 'Ini Hasil Analisa Karakter Kamu');

        } catch (\Exception $e) {
            return redirect('/analysis')->with('error', 'Data Not Successfully Saved');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $id;
        $nilai = DB::select("SELECT analysis.user_id, SUM(opportunist) as a, SUM(yolo) as b, SUM(optimistic) as c,
                            (SUM(opportunist) +  SUM(yolo) +  SUM(optimistic)) as total 
                             FROM `analysis` JOIN answers ON analysis.answer_id = answers.id
                             WHERE  analysis.user_id ='$id'
                             GROUP BY analysis.user_id");

        return view('analysis.show',compact('nilai','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

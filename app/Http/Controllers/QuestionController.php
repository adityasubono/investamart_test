<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_question = Question::all()->sortByDesc('id')->take(1);
        $question = Question::all();
        $opportunist = DB::select("SELECT SUM(opportunist) as a FROM answers");
        $optimistic = DB::select("SELECT SUM(optimistic) as a FROM answers");
        $yolo = DB::select("SELECT SUM(yolo) as a FROM answers");


//        dd($opportunist);
        $data_anwser = DB::select("SELECT * FROM questions join answers ON questions.id = answers.question_id");

        return view('question.index', compact('data_question', 'data_anwser','question','opportunist',
        'optimistic','yolo'));
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

            $question = strtoupper($request->input_question);
            Question::create([
                'question' => $question
            ]);

//        dd($request->question);
            foreach ($request->question as $key => $value) {
                Answer::create($value);
            }
            return redirect('/question')->with('success', 'Data Successfully Saved');

        } catch (\Exception $e) {
            return redirect('/question')->with('error', 'Data Not Successfully Saved');
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
        //
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


        try {

//            dd($request->opportunist);
            $data = Answer::where('id', $id)->update([
                'opportunist' => $request->opportunist,
                'optimistic'=> $request->optimistic,
                'yolo' => $request->yolo
            ]);

//            dd($data);
            return redirect('/question')->with('success', 'Data Successfully Saved');

        } catch (\Exception $e) {
            return redirect('/question')->with('error', 'Data Not Successfully Saved');
        }
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

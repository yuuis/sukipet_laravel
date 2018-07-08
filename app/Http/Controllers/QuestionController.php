<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Message;
use App\Models\User;
use Validator;

class QuestionController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view("questions.create", compact("category"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $rules = [
            "title" => "required|max:100",
            "body" => "required|max:1000",
            "category" => "required|integer"
        ];
        $messages = [
            "title.required" => "名前を入力してください",
            "title.max" => "タイトルは100文字以内で入力してください",
            "body.required" => "本文を入力してください",
            "body.max" => "本文は1000文字以内で入力してください",
            "category.required" => "カテゴリを選択してください",
        ];
        $validator = Validator::make($inputs, $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withinput();
        } else {
            $question = new Question();
            $form = [
                "title" => $request->input("title"),
                "body" => $request->input("body"),
                "category_id" => $request->input("category"),
                "status" => 0,
                "user_id" => currentUser()->id,
            ];
            $question->fill($form);
            if ($question->save()) {
                return redirect()->route("root");
            } else {
                return back()->withinput();
            }
        }
    }

    public function show($question)
    {
        $return["question"] = Question::where("id", $question)->first();
        $return["category"] = Category::where("id", $return["question"]->category_id)->first();
        $return["answers"] = Answer::where("question_id", $return["question"]->id)->get();
        $return["user"] = User::where("id", $return["question"]->user_id)->first();
        $return["users"] = array();
        $messages = array();
        foreach ($return["answers"] as $answer) {
            array_push($messages, Message::where("answer_id", $answer->id)->get());
        }
        $return["messages"] = $messages;
        foreach ($return["messages"] as $message) {
            $return["users"][$message->id] = User::where("id", $message->user_id)->get();
        }

        return view("questions.show", compact("return"));
    }
}

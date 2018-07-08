<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Question;
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
}

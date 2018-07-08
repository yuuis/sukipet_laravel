<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Question;
use App\Models\PasswordAuthentication;

class UserController extends Controller
{
    protected $users;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create");
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
            "name" => "required|max:20",
            "email" => "required|max:255|email",
            "password" => "required|max:255"
        ];
        $messages = [
            "name.required" => "名前を入力してください",
            "name.max" => "名前は20文字以内で入力してください",
            "email.required" => "メールアドレスを入力してください",
            "email.email" => "メール形式が間違っています",
            "password.required" => "パスワードを入力してください",
        ];
        $validator = Validator::make($inputs, $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withinput();
        } else {
            $user = new User();
            $form = [
                "name" => $request->input("name"),
                "email" => $request->input("email"),
            ];
            $user->fill($form);
            if ($user->save()) {
                $passwordAuthentication = new PasswordAuthentication;
                $formPassword = [
                    "password_digest" => hash("sha512", hash("sha512", $request->input("password"))),
                    "user_id" => $user->id,
                ];
                $passwordAuthentication->fill($formPassword);
                if ($passwordAuthentication->save()) {
                    session(["user_id" => $user->id]);
                    return redirect()->route("root");
                }
            } else {
                return back()->withinput();
            }
        }
    }
}

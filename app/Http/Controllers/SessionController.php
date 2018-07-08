<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;
use App\Models\User;
use App\Models\Question;
use App\Models\PasswordAuthentication;

class SessionController extends Controller
{
    /**
     * @return view
     */
    public function create()
    {
        return view("sessions.login_form");
    }
    /**
     * @param  Request $request [HttpRequest]
     * @return redirect
     */
    public function store(Request $request)
    {
        $user = User::where("email", $request->input("email"))->first();
        $passwordAuthentication = PasswordAuthentication::where("user_id", $user->id)->first();
        if ($user && $passwordAuthentication && hash("sha512", hash("sha512", $request->input("password"))) === $passwordAuthentication->password_digest) {
            session(["user_id" => $user->id]);
            $notice = "ログインが完了しました";
            return redirect()->route("root");
        } else {
            $alert = "ログインに失敗しました";
            return back()->with("alert", $alert);
        }
    }


    public function destroy()
    {
        session(["user_id" => null]);
        return redirect()->route("root");
    }
}

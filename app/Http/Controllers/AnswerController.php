<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;
use App\Models\User;
use App\Models\Question;
use App\Models\PasswordAuthentication;

class AnswerController extends Controller
{
    /**
     * @return view
     */
    public function create()
    {
        return view("message.create");
    }
    
    /**
     * @param  Request $request [HttpRequest]
     * @return redirect
     */
    public function store(Request $request)
    {
    }
}

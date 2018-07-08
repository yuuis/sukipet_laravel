<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class SandboxController extends Controller
{
    /**
     * @return view
     */
    public function show()
    {
        $questions = Question::all();
        return view("sandbox.show", compact("questions"));
    }
}

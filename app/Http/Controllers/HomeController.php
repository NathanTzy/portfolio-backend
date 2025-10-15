<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Contact;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('start_year', 'desc')->get();
        $projects = Project::all();
        $skills = Skill::all();
        $contacts = Contact::all();


        return view('welcome', compact('projects', 'skills', 'contacts','experiences'));
    }
}

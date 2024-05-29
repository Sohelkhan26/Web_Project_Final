<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactAPIController extends Controller
{

    public function index($user_id = null)
    {
        return $user_id ? Contact::where('user_id' , $user_id) ->get() : Contact::all();
    }

}

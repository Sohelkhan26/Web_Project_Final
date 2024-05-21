<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactAPIController extends Controller
{
    //
//    public function index($user_id = null)
//    {
////        i want to fetch contacts whose user_id = $id
//        return $user_id ? Contact::where('user_id' , $user_id) ->get() : Contact::all();
//    }
    public function index(Request $request, $user_id = null)
    {
//        dd($request->input('query'));
        $query = $request->input('query');
//        dd($query);
        $contacts = Contact::where('first_name', 'LIKE', "%{$query}%")
            ->orWhere('last_name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->orWhere('phone', 'LIKE', "%{$query}%")
            ->orWhere('address', 'LIKE', "%{$query}%")
            ->get();
//        if($contacts <= 1){
//            return response()->json(['message' => 'No contacts found'], 404);
//        }
//        return view('showcontacts', ['contacts' => $contacts]);
        return response()->json($contacts);
    }
}

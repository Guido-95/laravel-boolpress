<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Lead;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        // validazione
        $validator = Validator::make($data,[
            'name'=>'required|max:60',
            'email'=>'required|max:60|email',
            'message'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'errori' => $validator->errors()
            ]);
        };
        
        // salvataggio a db
        $lead = new Lead();
        $lead->fill($data);
        $lead->save();

        // invio email ad admin
        // return response()->json($data);
        Mail::to('admin@sito.it')->send(new ContactMessage($lead));
        return response()->json([
            'success' => true
        ]);

        
    }
}

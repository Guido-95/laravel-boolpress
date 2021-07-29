<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;
class TagController extends Controller
{
   
    public function show(Tag $tag){
        
        return view('admin.tag.show' , compact('tag'));
    }
}

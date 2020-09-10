<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meme;

class MemeController extends Controller
{
    //list all images
    public function index(){

        $meme = Meme::all();
        return response()->json($meme);
    }

    //show image based ID
    public function show($id){

        $meme = Meme::findOrFail($id);
        return response()->json($meme);
    }

    //show images based on page
    public function showPage($page){

        $meme = Meme::where('page','=',$page)->get();
        return response()->json($meme);
    }

    //show image based on requestCount(popular)
    public function showPopular(){

        $meme = Meme::orderBy('requestCount','desc')->first();
        return response()->json($meme);
    }

    //to allow user to enter data
    public function create(){
        return view('/meme/create');
    }

    //to insert new data to database
    public function store(){

        $meme = new Meme();
        $meme->timestamps = false;
        $meme->name = request('name');
        $meme->url  = request('url');
        $meme->requestCount = 0;
        
        $page  = Meme::select('page')->orderBy('page','desc')->first();    //select the highest page no.
        if($page != null){                                                 //then count the current page no
            $count = Meme::where('page','=',$page->page)->count();         //as one page has 9 images, so if 
            error_log($count);                                             //more than 9 then it'll be next page
            if($count>=9)
                $meme->page = $page->page+1;
            else
                $meme->page = $page->page;
        }else{
            $meme->page = 1;
        }

        $meme->save();
        return redirect('/meme/all');
    }
}

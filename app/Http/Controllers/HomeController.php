<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Rubric;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller //Контроллеры 15.11.2023
{
     public function index1() {
        
    //     $res = 2 + 3;
    //     $name = 'Name';
    //     return view('home', compact('res', 'name'));

    //     $post = Post::find(2);
    //     dump($post->title, $post->rubric);

    return view('home');

    // $post = Post::find(1);
    // dump($post->title);
    // foreach ($post->tags as $tag) {
    //     dump($tag->title);
    // }

    // $tag = Tag::find(1);
    // dump($tag->title);
    
    // return view('home');

    }

    public function index(Request $request){

        //Сеесии и кэш
        //Cookie::queue('test', 'Value', 1);
        //dump(Cookie::get('test'));
        //dump(Cookie::forget('test'));

        //Cache::put('key', 'value', 60);
        //dump(Cache::get('key'));

        // if (Cache::has('posts')) {
        //     $posts = Cache::get('posts');
        // } else {
        //     $posts = Post::orderBy('id', 'desc')->get();
        //     Cache::put('posts', $posts);
        // }
        
        //dump($request->session()->all());

        //dump(session()->all());

        // session(['cart' => [
        // ['id'=> 1, 'title' => 'product 1'],
        // ['id'=> 2, 'title' => 'product 2']]
        // ]);

        // $request->session()->push('card',['id' => 3, 'title' => 'product 3']);

        //Очистка корзины
        // $request->session()->forget('card');
        
        // dump(session('card')[0]['title']);

        

        $title = 'Home page';
        //$posts = Post::all();
        $posts = Post::orderBy('id', 'desc')->get();
        return view('home', compact('title', 'posts'));
    }

    

    public function show(){

        $title = 'About Page';
        return view('about', compact('title'));
    }

    public function create(){

        $title = 'Create Page';
        $rubrics = Rubric::pluck('title', 'id')->all();
        return view('create', compact('title', 'rubrics'));

    }

    public function store(Request $request){

        // dump($request->input('title'));
        // dump($request->input('content'));
        // dump($request->input('rubric_id'));
        // dd($request->all());

        $this->validate($request, [
            'title' => 'required|min:5|max:100',
            'content' => 'required',
            'rubric_id' => 'required|integer',
        ], [
            'title.required' => 'Заполните все поля',
            'title.min' => 'Минимум 5 символов',
            'title.max' => 'Максимум 100 символов',  // Corrected the max length message
            'content.required' => 'Заполните поле',  // Corrected the message
            'rubric_id.required' => 'Выберите рубрику',
            'rubric_id.integer' => 'ID должно быть целочисленным',  // Corrected the message and the field name
        ]);
        
        Post::create($request->all());

        return redirect()->route('home');

        
    }

    public function task(Request $request)
    {
        $title = 'Task 1';
        $currentMonth = $request->input('newMonth');
        $currentAge = $request->input('newAge');


        $currentArray = $request->input('Array');
        $currentArray = explode(",", $currentArray);

        $currentArray2 = $request->input('Array2');
        $currentArray2 = explode(",", $currentArray2);

        $currentArray3 = $request->input('Array3');
        $currentArray3 = explode(",", $currentArray3);
        
        return view('task', ['currentMonth' => $currentMonth,'currentAge' => $currentAge, 'currentArray' => $currentArray, 'currentArray2' => $currentArray2, 'currentArray3' => $currentArray3], compact('title'));
    }

    
}   

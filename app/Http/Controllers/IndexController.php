<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class IndexController extends Controller
{
	protected $message;
	protected $header;
	
	public function __construct ()
	{
		$this->header = 'Hello World';
		$this->message = 'This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and 					three supporting pieces of content. Use it as a starting point to create something more unique.';
	}
	
	public function index ()
	{
//		$articles = Article::all();

		$articles = Article::select(['id', 'title', 'text', 'mini_text'])->get();
		
//		dump($articles);
		
		return view ('page')->with(['header'=>$this->header, 'message'=>$this->message, 'articles'=>$articles]);
	}
	
	public function show ($id)
	{
//		dump($id);
//		$article = Article::find($id);
		$article = Article::select(['id', 'title', 'text'])->where('id', $id)->first();
//		dump($article);
		return view('article-content')->with(['header'=>$this->header, 'message'=>$this->message, 'article'=>$article]);
	}
	
	public function add ()
	{
		return view('add-content')->with(['header'=>$this->header, 'message'=>$this->message]);
	}
	
	public function store (Request $request)
	{
//		dump($request->all());
		$this->validate($request, 
		[
			'title'=>'required|max:255',
			'mini_text'=>'required|unique:articles,mini_text',
			'text'=>'required'
		]);
		
		$date = $request->all();
		
		$article = new Article;
		$article->fill($date);
		$article->save();
		
		return redirect('/');
	}
	
}

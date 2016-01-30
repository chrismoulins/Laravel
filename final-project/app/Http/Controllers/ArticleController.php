<?php namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\Page;
use Auth;
use App\ContentArea;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $articles = Article::all();
        return view('articles.index', compact('articles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $content_areas = ContentArea::lists('name', 'id');
        $pages = Page::lists('name', 'id');
		return view('articles.create', compact('pages', 'content_areas'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ArticleRequest $request)
	{
//        $request['created_by'] = Auth::user()->id;
//        $request['modified_by'] = Auth::user()->id;
//        Article::create($request->all());
        $article = new Article($request->all());
        $article->created_by = Auth::user()->id;
        $article->modified_by = Auth::user()->id;
        $article->save();
        flash()->success('Article Created!');

        return redirect('articles');

    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $article = Article::findOrFail($id);

        return view('articles.show', compact('article'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $content_areas = ContentArea::lists('name', 'id');
        $pages = Page::lists('name', 'id');

        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article', 'pages', 'content_areas'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, ArticleRequest $request)
	{
        $article = Article::findOrFail($id);

        $article->fill($request->all());
        $article->modified_by = Auth::user()->id;
        $article->save();

        flash()->success('Article Updated');

        return redirect('articles');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $article = Article::destroy($id);

        flash()->success('Article Archived');

        return redirect('articles');

	}

}

<?php namespace App\Http\Controllers;

use App\ContentArea;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Auth;
use Illuminate\Http\Request;
use App\Article;
use App\Page;
use App\Template;

class SiteController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        $pagesAll = Page::all();
        $articlesAll = Article::all();
        $templatesAll = Template::all();
        $contentAreasAll = ContentArea::all();

        return view('site.index', compact('pagesAll', 'articlesAll', 'templatesAll', 'contentAreasAll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $pagesAll = Page::all();
        $articlesAll = Article::all();
        $templatesAll = Template::all();
        $contentAreasAll = ContentArea::all();
        $content_areas = ContentArea::lists('name', 'id');
        $pages = Page::lists('name', 'id');

        return view('site.create', compact('pagesAll', 'articlesAll', 'templatesAll', 'contentAreasAll','pages', 'content_areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ArticleRequest $request)
    {

        $article = new Article($request->all());
        $article->created_by = 1;
        $article->modified_by = 1;
        $article->save();

        flash()->success('Article Created!');

        return redirect('site');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {


        $page = Page::findOrFail($id);
        $contentAreas = ContentArea::orderBy('display_order', 'Asc')->get();

        $pagesAll = Page::all();
        $articlesAll = Article::all();
        $templatesAll = Template::all();
        $contentAreasAll = ContentArea::all();

        return view('site.show', compact('contentAreas','page', 'pagesAll', 'articlesAll', 'templatesAll', 'contentAreasAll'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $pagesAll = Page::all();
        $articlesAll = Article::all();
        $templatesAll = Template::all();
        $contentAreasAll = ContentArea::all();
        $content_areas = ContentArea::lists('name', 'id');
        $pages = Page::lists('name', 'id');

        $article = Article::findOrFail($id);

        return view('site.edit', compact('article', 'pages', 'content_areas', 'pagesAll', 'articlesAll', 'templatesAll', 'contentAreasAll'));
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
        $article->modified_by = 1;
        $article->save();

        flash()->success('Article Updated');

        return redirect('site');
    }
}


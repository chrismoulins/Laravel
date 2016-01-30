<?php namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Page;
use Illuminate\Support\Facades\Session;

class PageController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pages = Page::all();

        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PageRequest $request)
    {

        $page = new Page($request->all());
        $page->created_by = Auth::user()->id;
        $page->modified_by = Auth::user()->id;
        $page->save();

        flash()->success('Page Created');

        return redirect('pages');

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

        return view('pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);

        return view('pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, PageRequest $request)
    {
        $page = Page::findOrFail($id);

        $page->fill($request->all());
        $page->modified_by = Auth::user()->id;
        $page->save();

        flash()->success('Page Updated');

        return redirect('pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $page = Page::destroy($id);

        flash()->success('Page Deleted');

        return redirect('pages');

    }

}

<?php namespace App\Http\Controllers;

use App\ContentArea;
use App\Http\Requests\ContentAreaRequest;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class ContentAreaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $content_areas = ContentArea::orderBy('display_order','ASC')->get();
        return view('content_area.index', compact('content_areas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('content_area.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ContentAreaRequest $request)
	{
//        ContentArea::create($request->all());
        $contentArea = new ContentArea($request->all());
        $contentArea->created_by = Auth::user()->id;
        $contentArea->modified_by = Auth::user()->id;
        $contentArea->save();
        flash()->success('Content Area Created.');
        return redirect('contentarea');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $content_area= ContentArea::findOrFail($id);
        return view('content_area.show', compact('content_area'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $content_area = ContentArea::findOrFail($id);
        return view('content_area.edit', compact('content_area'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, ContentAreaRequest $request)
	{
        $content_area = ContentArea::findOrFail($id);

        $content_area->fill($request->all());
        $content_area->modified_by = Auth::user()->id;
        $content_area->save();

        flash()->success('Content Area Updated.');

        return redirect('contentarea');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $destroyContentArea = ContentArea::destroy($id);

        flash()->success('Content Area Deleted.');

        return redirect('contentarea');
	}

}

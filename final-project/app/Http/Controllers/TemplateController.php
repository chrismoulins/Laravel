<?php namespace App\Http\Controllers;

use App\Http\Requests\TemplateRequest;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Template;

class TemplateController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $templates = Template::all();
		return view('template.index', compact('templates'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('template.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(TemplateRequest $request)
	{


        if($request->active_state = 1){
            $templates = Template::all();
            foreach($templates as $template){
                $template->active_state = 0;
                $template->save();
            }
        };
        $template = new Template($request->all());
        $template->created_by = Auth::user()->id;
        $template->modified_by = Auth::user()->id;
        $template->save();
        flash()->success('Template Created.');
        return redirect('template');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$template = Template::findOrFail($id);
        return view('template.show', compact('template'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$template = Template::findOrFail($id);
        return view('template.edit', compact('template'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, TemplateRequest $requests)
	{

        if($requests->active_state = 1){
            $templates = Template::all();
            foreach($templates as $template){
                $template->active_state = 0;
                $template->save();
            }
        };
        $template = Template::findOrFail($id);

        $template->fill($requests->all());
        $template->modified_by = Auth::user()->id;
        $template->save();

        flash()->success('Template Updated.');

        return redirect('template');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$destroyTemplate = Template::destroy($id);

        flash()->success('Template Deleted.');

        return redirect('template');
	}

}

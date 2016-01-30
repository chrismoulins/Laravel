<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
//        dd($this->route('articles')->id);
//        $alias = 'required|unique:articles|alpha_dash';
//
//        if($this->isMethod('PATCH')){
//            $alias = 'required|unique:articles,alias,|alpha_dash';
//        }

		return [
            'title' => 'required',
            'alias' => 'required|alpha_dash',
            'all_pages' => 'required',
            'article_content' => 'required',
            'article_page_id' => 'required',
            'article_content_area_id' => 'required'

		];
	}

}

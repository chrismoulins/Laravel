<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model {

    use SoftDeletes;

    protected $articles = ['deleted_at'];

    protected $fillable = ['title', 'alias', 'description', 'all_pages',
                            'article_content', 'article_page_id', 'article_content_area_id'];

    public function createdByUser(){
        return $this->belongsTo('App\User', 'created_by');
    }

    public function modifiedByUser(){
        return $this->belongsTo('App\User', 'modified_by');
    }

    public function page(){
        return $this->belongsTo('App\Page', 'article_page_id');
    }

    public function content_area(){
        return $this->belongsTo('App\ContentArea', 'article_content_area_id');
    }

}

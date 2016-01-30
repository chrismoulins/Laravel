<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

    protected $fillable = ['name', 'alias', 'description', 'page_article_id'];

    public function createdByUser(){
        return $this->belongsTo('App\User', 'created_by');
    }

    public function modifiedByUser(){
        return $this->belongsTo('App\User', 'modified_by');
    }

    public function articles(){
        return $this->hasMany('App\Article', 'article_page_id');
    }

    public function template(){
        return $this->belongsTo('App\Template', 'page_template_id');
    }

}


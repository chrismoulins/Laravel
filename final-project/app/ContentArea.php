<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentArea extends Model {

    protected $fillable = ['name', 'alias', 'description', 'display_order'];

    public function createdByUser(){
        return $this->belongsTo('App\User', 'created_by');
    }

    public function modifiedByUser(){
        return $this->belongsTo('App\User', 'modified_by');
    }

    public function articles(){
        return $this->hasMany('App\Article', 'article_content_area_id');
    }
}

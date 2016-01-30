<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model {

    protected $fillable = ['name', 'alias', 'description', 'active_state', 'css_content', 'template_page_id', 'created_by', 'modified_by'];

    public function createdByUser(){
        return $this->belongsTo('App\User', 'created_by');
    }

    public function modifiedByUser(){
        return $this->belongsTo('App\User', 'modified_by');
    }

}

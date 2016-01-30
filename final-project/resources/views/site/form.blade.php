<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('alias', 'Alias:') !!}
    {!! Form::text('alias', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('article_content', 'Article Content:') !!}
    {!! Form::textarea ('article_content', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('all_pages', 'All Pages:') !!}
    {!! Form::select('all_pages', array('0' => 'No', '1' => 'Yes'), null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('article_page_id', 'Select Pages:') !!}
    {!! Form::select('article_page_id', $pages, null, ['id' => 'article_page_id', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('article_content_area_id', 'Select Content Area:') !!}
    {!! Form::select('article_content_area_id', $content_areas, null, ['id' => 'article_content_area_id', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Name: ') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('alias', 'Alias: ') !!}
    {!! Form::text('alias', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('active_state', 'Active State: ') !!}
    {!! Form::select('active_state', array('1' => 'Yes', '0' => 'No'), null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    <label for="cp2">CSS Customized Color Picker :</label><br>
    <input type="color" name="cp2" value="#9b59b6" class="demo2">
</div>

<div class="form-group">
    {!! Form::label('css_content', 'CSS Content:') !!}
    {!! Form::textarea('css_content', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
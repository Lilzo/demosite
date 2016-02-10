{!!  Form::open(
    ['url' => '/auth/register',
    'class' => 'form']    ) !!}
<div class="form-group">
    {!! Form::label('area', 'Area') !!}
    <div class="form-controls">
        {!! Form::select('role', [
            'admin' => 'Admin',
            'mod' => 'Moderator',
            'user' => 'User'], null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    <div class="form-controls">
        {!! Form::text('name', null,
            ['class' => 'form-control',
            'placeholder' => 'Name']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    <div class="form-controls">
        {!! Form::text('email', null,
            ['class' => 'form-control',
            'placeholder' => 'E-mail adress'])
        !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('password', 'Password') !!}
    <div class="form-controls">
        {!! Form::password('password', null,
            ['class' => 'form-control',
            'placeholder' => 'password'])
        !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('password_confirmation', 'Confirm password') !!}
    <div class="form-controls">
        {!! Form::password('password_confirmation', null,
            ['class' => 'form-control',
            'placeholder' => 'Confirm password'])
        !!}
    </div>
</div>
{!! Form::submit('Add log', ['class' => 'btn btn-primary']) !!}


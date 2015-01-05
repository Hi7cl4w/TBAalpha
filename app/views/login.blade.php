@extends('master')
@section('head')

<title>login here</title>
{{HTML::style('css/login.css')}}
@stop
@section('body')

<div class="jumbotron">
  <div class="container">
    <span class="glyphicon glyphicon-list-alt"></span>
    <h2>Login</h2>
    <div class="boxlogin">
        
   
	{{ Form::open(array('url' => 'login')) }}
		<!-- if there are login errors, show them here -->
	
			{{ $errors->first('email') }}
			{{ $errors->first('password') }}
	

	
			
			{{ Form::text('username', Input::old('email'), array('placeholder' => 'username or email' ,'class' => 'form-control')) }}	
			
			{{ Form::password('password',array('placeholder' => 'password', 'class' => 'form-control')) }}
	

		<p>{{ Form::button('<span class="glyphicon glyphicon-ok"></span>',array('type' => 'submit' , 'class'=>'btn btn-default full-width')) }}</p>
	{{ Form::close() }}
	 </div>
  </div>
</div>
	@stop




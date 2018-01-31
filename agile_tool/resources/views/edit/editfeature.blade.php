<!doctype html>
<html lang="en">
  <head>
      <title>Editing a Feature</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/check.css" rel="stylesheet">
  </head>
  <body>
@extends ('layout/header')<div class="featurespecial">
	<div class="form-group row">
  <button type="button" class="btn btn-outline-info" onclick="javascript:history.back()">Go back</button>
</div>
  <form  method="POST" action="/features/{{ $feature->id }}/update">
      {{ csrf_field() }}
	  <div class="form-group row">
	    <h1> Edit a Feature</h1>
	  </div>
	  
	  <div class="form-group row">
	    <label for="title" class="col-2 col-form-label">Title</label>
	    <div class="col-10">
	      <input class="form-control" type="text" id="title" name="title"  value="{{ $feature->title }}">
	    </div>
	  </div>
	  
	  <div class="form-group row">
	    <label for="user_role_id" class="col-2 col-form-label">User Role</label>
	    <div class="col-10">
	      <select class="form-control" id="user_role_id" name="user_role_id">
			@foreach ($feature->user_role->all() as $user_role)
				<option value="{{ $user_role->id }}"> {{ $user_role->name }}</option>
			@endforeach
	      </select>
	    </div>
	  </div>
	
	  <div class="form-group row">
	    <label for="functionality" class="col-2 col-form-label">Functionality</label>
	    <div class="col-10">
	      <textarea class="form-control" rows="3" id="functionality" name="functionality">{{ $feature->functionality }}</textarea>
	    </div>
	  </div>
	
	  <div class="form-group row">
	    <label for="benefit" class="col-2 col-form-label">Benefit</label>
	    <div class="col-10">
	      <textarea class="form-control" rows="3" id="benefit" name="benefit">{{ $feature->benefit }}</textarea>
	    </div>
	  </div>
 
	  <div class="form-group row">
	    <label for="priority" class="col-2 col-form-label">Priority</label>
	    <div class="col-10">
	      <input class="form-control" type="number" id="priority" name="priority"  value="{{ $feature->priority }}">
	    </div>
	  </div>
	  
	  <div class="form-group row">
	    <label for="iteration_id" class="col-2 col-form-label">Iteration</label>
	    <div class="col-10">

	      <select class="form-control" id="iteration_id" name="iteration_id">
	      	 @if ($feature->iteration_id == null)
              	<option selected disabled>No Iteration id</option>             
             @elseif($feature->iteration_id != null)
			 @foreach ($feature->iteration->all() as $iteration)
				<option value="{{ $iteration->id }}">number: {{ $iteration->id }} deadline: {{ $iteration->deadline }}</option>
			 @endforeach
			 @endif
	      
	      </select>
	    </div>
	  </div>
  	  <div class="form-group row">
  	    <div class="col-8" align="center">
    	  <br><br><button type="submit" class="btn btn-primary">Submit</button>
  		</div>
	  </div>
  </form>
</div>
</body>
</html>
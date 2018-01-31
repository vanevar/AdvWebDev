<!doctype html>
<html lang="en">
  <head>
    <title>Editing a Task</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/check.css" rel="stylesheet">
  </head>
  <body>
@extends ('layout/header')
<div class="container">
  <div class="form-group row">
  <button type="button" class="btn btn-outline-info" onclick="javascript:history.back()">Go back</button>
</div>
    <form action="/tasks/{{ $task->id }}/update" method="post">
  {{ csrf_field() }}
  <div class="form-group row">
    <h1> Edit a Task</h1>
  </div>
<div class="form-group row">
  <label for="tasktitle" class="col-2 col-form-label">Title</label>
  <div class="col-10">
    <input class="form-control" type="text" id="tasktitle" value="{{ $task->title }}">
  </div>
</div>
<div class="form-group row">
  <label for="taskdesc" class="col-2 col-form-label">Description</label>
  <div class="col-10">
    <textarea class="form-control" rows="3" id="taskdesc"> {{ $task->description }} </textarea>
  </div>
</div>
  <div class="form-group row">
    <label for="taskstatus" class="col-2 col-form-label">Status</label>
    <div class="col-10">
    <select class="form-control" id="taskstatus">
    	@foreach ($task->task_status->all() as $task_status)
				<option value="{{ $task_status->id }}"> {{ $task_status->name }}</option>
			@endforeach
    </select>
  </div>
  </div>
  <div class="form-group row">
    <label for="taskowner" class="col-2 col-form-label">Owner</label>
    <div class="col-10">
    <select class="form-control" id="taskstatus">
    	<option selected disabled>Please select one option</option>
     		@foreach ($task->member->all() as $member)
				<option value="{{ $member->id }}"> {{ $member->first_name }}</option>
			@endforeach
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
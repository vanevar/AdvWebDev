<!doctype html>
<html lang="en">
  <head>
    <title>Editing a Project</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/check.css" rel="stylesheet">
  </head>
  <body>
@extends ('layout/header')
<div class="container">
<form action="{{url('projects', [$project->id])}}" method="post">
  {{ csrf_field() }}
  <input type="hidden" name="_method" value="PUT">
  <div class="form-group row">
  <h1>Create a New Project</h1>
  </div>
  <div class="form-group row">
    <label for="projectname" class="col-2 col-form-label">Project Name</label>
    <div class="col-10">
      <input class="form-control" type="text" id="projectname" name="projectname" value="{{$project->name}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="description" class="col-2 col-form-label">Description</label>
    <div class="col-10">
      <input class="form-control" type="text" id="projectdescription" name="projectdescription" value="{{$project->description}}">
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
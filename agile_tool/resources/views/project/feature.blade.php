<html lang="en">
<head>
    <title>Projects</title>

    <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/grid.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  </head>

  <body>
@extends ('layout/header')
   <br><br>
    <div class="container">

      <div class = "row">
	  <h1>Features</h1> 
	  
	<div class="input-group-addon"><a href="/features/{{ $project->id }}/create"> <i class="fa fa-plus" aria-hidden="true"></i></a></div>
	 </div>
      <p class="lead">All the features related to the project.</p>
 <ul>
  <div class="row">
        <div class="col-1"><strong>S No.</strong></div>
        <div class="col-2"><strong>Title</strong></div>
        <div class="col-2"><strong>Functionality</strong></div>
        <div class="col-2"><strong>Benefit</strong></div>
        <div class="col-1"><strong>Priority</strong></div>
        <div class="col-1"><strong>Options</strong></div>
   </div>
  </ul>

@foreach ($project->features as $index => $efeature)
      <ul>
  <div class="row">
        <div class="col-1">{{$index+1}}</div>
        <div class="col-2">{{$efeature->title}}</div>
        <div class="col-2">{{$efeature->functionality}}</div>
        <div class="col-2">{{$efeature->benefit}}</div>
        <div class="col-1">{{$efeature->priority}}</div>
        <div class="col-1">
		      <a href="/features/{{ $efeature->id }}/edit">edit feature</a>
		    </div>
   </div>
  </ul>
  @endforeach
    </div> <!-- /container -->
</body>
</html>
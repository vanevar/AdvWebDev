 <div class="container">

      <div class = "row">
	  <h1>Projects</h1> 
	  
	<div class="input-group-addon"><a href="http://google.com"> <i class="fa fa-plus" aria-hidden="true"></i></a></div>
	 </div>
      <p class="lead">All the projects where the user is involved in.</p>

@foreach ($project as $eproject)
      <ul>
      <div class="row">
        <div class="col-4">{{$eproject->name}}</div>
        <div class="col-4">{{$eproject->description}}</div>
        <div class="col-4">
		<a href="edit project">edit project</a>
		</div>
      </div>
  </ul>
  @endforeach
    </div> <!-- /container -->
 <div class="container">

      <div class = "row">
	  <h1>Projects</h1> 
	  
	<div class="input-group-addon"><a href="/projects/create"> <i class="fa fa-plus" aria-hidden="true"></i></a></div>
	 </div>
      <p class="lead">All the projects where the user is involved in.</p>

 <ul>
  <div class="row">
        <div class="col-1"><strong>S No.</strong></div>
        <div class="col-2"><strong>Project Name</strong></div>
        <div class="col-6"><strong>Description</strong></div>
        <div class="col-2"><strong>Options</strong></div>
   </div>
  </ul>

@foreach ($project as $index => $eproject)
      <ul>
      <div class="row">
        <div class="col-1">{{$index+1}}</div>
        <div class="col-2">{{$eproject->name}}</div>
        <div class="col-6">{{$eproject->description}}</div>
        <div class="col-2">
		<a href="/projects/{{$eproject->id}}/edit">edit project</a>
		</div>
      </div>
  </ul>
  @endforeach
    </div> <!-- /container -->
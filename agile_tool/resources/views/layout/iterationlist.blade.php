 <div class="container">

      <div class = "row">
	  <h1>Iterations</h1> 
	  
	<div class="input-group-addon"><a href="http://google.com"> <i class="fa fa-plus" aria-hidden="true"></i></a></div>
	 </div>
      <p class="lead">All the Iterations related to the project.</p>

@foreach ($iteration as $eiteration)
      <ul>
  <div class="row">
        <div class="col-2">{{$eiteration->deadline}}</div>
        <div class="col-2">{{$eiteration->project_id}}</div>
        <div class="col-1">
		      <a href="/project/feature/edit">edit project</a>
		    </div>
   </div>
  </ul>
  @endforeach
    </div> <!-- /container -->
 <div class="container">
<div class="form-group row">
  <button type="button" class="btn btn-outline-info"><a href="{{ URL::previous() }}">Go Back</a></button>
</div>
      <div class = "row">
	  <h1>Iterations</h1> 
	  
	<div class="input-group-addon"><a href="/project/iterations/create"> <i class="fa fa-plus" aria-hidden="true"></i></a></div>
	 </div>
      <p class="lead">All the Iterations related to the project.</p>
 <ul>
  <div class="row">
        <div class="col-1"><strong>S No.</strong></div>
        <div class="col-2"><strong>Deadline</strong></div>
        <div class="col-2"><strong>Project Name</strong></div>
        <div class="col-1"><strong>Options</strong></div>
   </div>
  </ul>

@foreach ($iteration as $index => $eiteration)
      <ul>
  <div class="row">
        <div class="col-1">{{$index+1}}</div>
        <div class="col-2">{{$eiteration->deadline}}</div>
        <div class="col-2">{{$eiteration->project_id}}</div>
        <div class="col-1">
		      <a href="/project/iterations/edit">edit project</a>
		    </div>
   </div>
  </ul>
  @endforeach
    </div> <!-- /container -->
 <div class="container">

      <div class = "row">
	  <h1>Acceptance Tests</h1> 
	  
	<div class="input-group-addon"><a href="http://google.com"> <i class="fa fa-plus" aria-hidden="true"></i></a></div>
	 </div>
      <p class="lead">All the Acceptance tests related to the project.</p>

@foreach ($acceptance_test as $eacceptancetest)
      <ul>
  <div class="row">
        <div class="col-2">{{$eacceptancetest->description}}</div>
        <div class="col-2">{{$eacceptancetest->test_result}}</div>
        <div class="col-2">{{$eacceptancetest->feature_id}}</div>
        <div class="col-1">{{$eacceptancetest->bug_id}}</div>
        <div class="col-1">
		      <a href="/project/feature/edit">edit project</a>
		    </div>
   </div>
  </ul>
  @endforeach
    </div> <!-- /container -->
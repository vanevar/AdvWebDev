 <div class="container">

      <div class = "row">
	  <h1>Acceptance Tests</h1> 
	  
	<div class="input-group-addon"><a href="/project/features/acceptancetests/create"> <i class="fa fa-plus" aria-hidden="true"></i></a></div>
	 </div>
      <p class="lead">All the Acceptance tests related to the project.</p>
 

  <ul>
  <div class="row">
       <div class="col-1"><strong>S No.</strong></div>
        <div class="col-2"><strong>Description</strong></div>
        <div class="col-2"><strong>Test Result</strong></div>
        <div class="col-2"><strong>Feature Id</strong></div>
        <div class="col-1"><strong>Bug Id</strong></div>
        <div class="col-1"><strong>Options</strong></div>
   </div>
  </ul>

@foreach ($acceptance_test as $index => $eacceptancetest)
      <ul>
  <div class="row">
        <div class="col-1">{{$index+1}}</div>
        <div class="col-2">{{$eacceptancetest->description}}</div>
        <div class="col-2">{{$eacceptancetest->test_result}}</div>
        <div class="col-2">{{$eacceptancetest->feature_id}}</div>
        <div class="col-1">{{$eacceptancetest->bug_id}}</div>
        <div class="col-1">
		      <a href="/project/features/acceptancetests/edit">edit project</a>
		    </div>
   </div>
  </ul>
  @endforeach
    </div> <!-- /container -->
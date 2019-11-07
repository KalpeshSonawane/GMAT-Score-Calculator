<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>E-GMAT’S CODING ASSIGNMENT</title>
  </head>
  <body>
    <div class="container">
      <br>
      <form class="row pl-5 " method="POST">
        <div class="col-sm-6 row">
          <label for="subject-name" class="pr-3 col-sm-12 h3">Quant</label>
          <div class="form-group col-sm-6 row"> 
            <label for="subject-type-name" class="col-form-label pr-3">Current</label>
            <input type="number" class="form-control col-sm-6 text" name="c1" min="0" max="60" >
          </div>
          <div class="form-group col-sm-6 row">
            <label for="subject-type-name" class="col-form-label pr-3">Target</label>
            <input type="number" class="form-control col-sm-6 text" name="t1" min="0" max="60">
          </div>
        </div>
        <div class="col-sm-6 row">
          <label for="subject-name" class="pr-3 col-sm-12 h3">Verble</label>
          <div class="form-group col-sm-6  row"> 
            <label for="subject-type-name" class="col-form-label pr-3">Current</label>
            <input type="number" class="form-control col-sm-6 text"  name="c2" min="0" max="60"> 
          </div>
          <div class="form-group col-sm-6 row ">
            <label for="subject-type-name" class="col-form-label pr-3" >Target</label>
            <input type="number" class="form-control col-sm-6 text" name="t2" min="0" max="60">
          </div>
        </div>
        <br>
        <div class="col text-center pr-10 d">
          <button class="btn btn-primary" name="submit">Submit and refresh</button>
        </div>
      </form>
    </div>
  </body>
</html>
<style>
  .d {
  padding-right: 118px;
  padding-top: 14px;
  }
</style>
<script type="text/javascript">
  $('.text').keyup(function(){
   if ($(this).val() > 60 ){
     alert("Please enter marks in between 0 to 60");
     $(this).val('');
   }
   });
  
   
   $(document).ready(function(){
   $('[data-toggle="popover"]').popover('show');   
   });
</script>
<div>
<?php 
  if(isset($_POST['submit']))
  {
  	
      $c1=$_POST['c1'];
      $c2=$_POST['c2'];
      $t1=$_POST['t1'];
      $t2= $_POST['t2'];
  	
  	if($c1 == "" || $c2 == "" || $t1 == "" || $t2 == "" )
  {
    echo "<script>alert('Enter marks first')</script>";
  }else{
  
  	$Total_current_score = 200 + ($c2 + $c1) *5;
      $Total_target_score = 200 + ($t2 + $t1) *5;
  	
  	$width1 = ($Total_current_score/800)*100;
  	$width2 = ($Total_target_score/800)*100;
  	
  	$cq3 = floor(($c1/60)*100);
  	$tq3 = floor(($t1/60)*100);
  	$cv4 = floor(($c2/60)*100);
  	$tv4 = floor(($t2/60)*100);
  	
  	$dc = floor($tq3 - $cq3);
  	$dv = floor($tv4 - $cv4);
  	
  	$d1 = abs($t1 - $c1);
  	$d2 = abs($t2 - $c2);
  	
  	$x = floor($width1);
  	$y = floor($width2);
  
  	$z = abs($Total_target_score - $Total_current_score) ;
  
  	$a = $y -$x;
  	
  	echo '<div class="container pt-5">
  	
  	<div class="bg-light a p-3" >
  <div class="col-sm-12 h3"> Total Score <br> ' . $Total_current_score . '</div> 
  	
  	';
  	if($Total_current_score<$Total_target_score)
  	{
  	echo'
  	<div class="progress " >
    <div class="progress-bar bg-primary progress-bar-striped rounded-right" role="progressbar" style="width:' . $x . '%" aria-valuenow="' . $x . '" aria-valuemin="0" aria-valuemax="100"></div><a href="#" data-toggle="popover" data-placement="Top" data-content="' . $Total_current_score . '"></a>
    <div class="progress-bar bg-warning progress-bar-striped rounded-right" role="progressbar" style="width:' . $a . '%" aria-valuenow="' . $a . '" aria-valuemin="0" aria-valuemax="100">+' . $z . '</div><a href="#" data-toggle="popover" data-placement="Top" data-content="' . $Total_target_score . '"></a>
  
  </div>
  
  <div class="pt-4 ">Your estimated GMAT score per performance in this mock test is ' . $Total_current_score . ' which is <b>' . $z . 'points </b>lower than your GMAT score of ' . $Total_target_score . ' </div>
  </div>
  
  ';
  }elseif($Total_current_score>$Total_target_score)
  {
  	echo '
  	<div class="progress">
    <div class="progress-bar bg-primary progress-bar-striped rounded-right" role="progressbar" style="width: ' . $x . '%" aria-valuenow="' . $x . '" aria-valuemin="0" aria-valuemax="100"><a href="#" data-toggle="popover" data-placement="Top" data-content="' . $Total_target_score . '"></a></div>
    <div class="progress-bar bg-warning progress-bar-striped rounded-right" role="progressbar" style="width: -' . $Total_target_score . '%" aria-valuenow="-' . $Total_target_score . '" aria-valuemin="0" aria-valuemax="100"><a href="#" data-toggle="popover" data-placement="Top" data-content="' . $Total_current_score . '"></a></div>
  </div>
  <div class="pt-4 ">Your estimated GMAT score per performance in this mock test is ' . $Total_current_score . ' which is <b>' . $z . 'points </b>higher than your GMAT score of ' . $Total_target_score . ' </div>
  </div>
  	';
  }
  if($Total_current_score==$Total_target_score)
  	{
  	echo'
  	<div class="progress " >
    <div class="progress-bar bg-primary progress-bar-striped rounded-right" role="progressbar" style="width:' . $x . '%" aria-valuenow="' . $x . '" aria-valuemin="0" aria-valuemax="100"></div><a href="#" data-toggle="popover" data-placement="Top" data-content="' . $Total_current_score . '"></a>
    <div class="progress-bar bg-warning progress-bar-striped rounded-right" role="progressbar" style="width:' . $a . '%" aria-valuenow="' . $a . '" aria-valuemin="0" aria-valuemax="100"></div><a href="#" data-toggle="popover" data-placement="Bottom" data-content="' . $Total_target_score . '"></a>
  
  </div>
  
  <div class="pt-4">Your estimated GMAT score per performance in this mock test is ' . $Total_current_score . ' which is equal to your GMAT target score.</div>
  </div>
  
  
  ';
  }
  
  echo'
  
  
  
  
  
  
  <div class="row pt-5 " >
  <div class="col-sm-6 ">
   <div class="col-sm-12 h3 p-3"> Quant Score<br> Q' . $c1 . '</div> 
  ';
  if($c1<$t1)
  {
  
  echo '
  <div class="progress " >
    <div class="progress-bar bg-primary progress-bar-striped rounded-right" role="progressbar" style="width:' . $cq3 . '%" aria-valuenow="' . $cq3 . '" aria-valuemin="0" aria-valuemax="100"></div><a href="#" data-toggle="popover" data-placement="Top" data-content="' . $c1 . '"></a>
    <div class="progress-bar bg-warning progress-bar-striped rounded-right" role="progressbar" style="width:' . $dc .'%" aria-valuenow="' . $dc . '" aria-valuemin="0" aria-valuemax="100">+' . $d1 .'</div><a href="#" data-toggle="popover" data-placement="Top" data-content="' . $t1 . '"></a>
  
  </div>
  
  <div class="pt-4">Your estimated Quantiative score per performance in this mock test is Q ' . $c1 . ' which is <b>' . $d1 .' points </b> lower than your target quantitative score of Q ' . $t1 . '.
   </div>
          
  </div>
  
   ';
  }elseif($c1>$t1){
  	
  	echo '
  	<div class="progress">
    <div class="progress-bar bg-primary progress-bar-striped rounded-right" role="progressbar" style="width: ' . $cq3 . '%" aria-valuenow="' . $cq3 . '" aria-valuemin="0" aria-valuemax="100"><a href="#" data-toggle="popover" data-placement="Top" data-content="' . $t1 . '"></a></div>
    <div class="progress-bar bg-warning progress-bar-striped rounded-right" role="progressbar" style="width:-' . $tq3 . '%" aria-valuenow="-' . $tq3 . '" aria-valuemin="0" aria-valuemax="100"><a href="#" data-toggle="popover" data-placement="Top" data-content="' . $c1 . '"></a></div>
  </div>
  <div class="pt-4">
  Your estimated Quantiative score per performance in this mock test is Q ' . $c1 . ' which is <b>' . $d1 . ' points </b> higher than your target quantitative score of Q ' . $t1 . '.
  </div>
  
  </div>
  
  	';
  }elseif($c1==$t1){
  	echo '
  	<div class="progress " >
    <div class="progress-bar bg-primary progress-bar-striped rounded-right" role="progressbar" style="width:' . $cq3 . '%" aria-valuenow="' . $cq3 . '" aria-valuemin="0" aria-valuemax="100"></div><a href="#" data-toggle="popover" data-placement="Top" data-content="' . $c1 . '"></a>
    <div class="progress-bar bg-warning progress-bar-striped rounded-right" role="progressbar" style="width:' . $dc .'%" aria-valuenow="' . $dc . '" aria-valuemin="0" aria-valuemax="100"></div><a href="#" data-toggle="popover" data-placement="Bottom" data-content="' . $t1 . '"></a>
  
  </div>
  
  <div class="pt-4">Your estimated Quantiative score per performance in this mock test is Q ' . $c1 . ' which is equal to your target.
  
   </div>
          
  </div>
  
  	';
  }
  
  echo'
  
  <div class=" col-sm-6  " >
    <div class="col-sm-12 h3 p-3"> Verble Score <br> V' . $c2 . '</div> 
    ';
    if($c2<$t2)
  {
  
  echo '
  <div class="progress">
    <div class="progress-bar bg-primary progress-bar-striped rounded-right" role="progressbar" style="width: ' . $cv4 . '%" aria-valuenow="' . $cv4 . '" aria-valuemin="0" aria-valuemax="100"></div><a href="#" data-toggle="popover" data-placement="Top" data-content="' .$c2 . '"></a>
    <div class="progress-bar bg-warning progress-bar-striped rounded-right" role="progressbar" style="width: ' . $dv . '%" aria-valuenow="' . $dv . '" aria-valuemin="0" aria-valuemax="100">+' . $d2 . '</div><a href="#" data-toggle="popover" data-placement="Top" data-content="' .$t2 . '"></a>
  </div>
  <div class="pt-4">Your estimated Quantiative score per performance in this mock test is Q ' . $c2 . ' which is <b>' . $d2 . ' points </b> lower than your target verble score of Q ' . $t2 . '.
  </div>
  </div>
  
  </div>
  
  ';
  }
  
  elseif($c2>$t2){
  	echo '
  <div class="progress">
    <div class="progress-bar bg-primary progress-bar-striped rounded-right" role="progressbar" style="width: ' . $cv4 . '%" aria-valuenow="' . $cv4 . '" aria-valuemin="0" aria-valuemax="100"><a href="#" data-toggle="popover" data-placement="Top" data-content="' . $t2 . '"></a></div>
    <div class="progress-bar bg-warning progress-bar-striped rounded-right" role="progressbar" style="width: -' . $tv4 . '%" aria-valuenow="-' . $tv4 . '" aria-valuemin="0" aria-valuemax="100"><a href="#" data-toggle="popover" data-placement="Top" data-content="' . $c2 . '"></a></div>
  </div>
  <div class="pt-4">Your estimated Quantiative score per performance in this mock test is Q ' . $c2 . ' which is <b>' . $d2 . ' points </b> higher than your target  score of Q ' . $t2 . '.
  </div>
  
  </div>
  </div>
  ';
  }
    elseif($c2==$t2)
  {
  
  echo '
  <div class="progress">
    <div class="progress-bar bg-primary progress-bar-striped rounded-right" role="progressbar" style="width: ' . $cv4 . '%" aria-valuenow="' . $cv4 . '" aria-valuemin="0" aria-valuemax="100"></div><a href="#" data-toggle="popover" data-placement="Top" data-content="' .$c2 . '"></a>
    <div class="progress-bar bg-warning progress-bar-striped rounded-right" role="progressbar" style="width: ' . $dv . '%" aria-valuenow="' . $dv . '" aria-valuemin="0" aria-valuemax="100"></div><a href="#" data-toggle="popover" data-placement="Bottom" data-content="' .$t2 . '"></a>
  </div>
  <div class="pt-4">Your estimated Quantiative score per performance in this mock test is Q ' . $c2 . ' which is equal to your target.
  
  </div>
  </div>
  </div>
  
  ';
  }
  	
  
  }
  }
  
  
  ?>
<br>
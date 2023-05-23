<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body style="background-color:bisque">


    <div class="pull-right mb-2" style="text-align:right;padding:20px">
        <a class="btn btn-success" href="{{route('index.student')}}"> back </a>

    </div>
    @auth('web')
    <div class="pull-left">
        <h1 style="text-align: center">student: {{Auth::user()->name}}</h1>
    </div>
    @endauth
    
     
    <div class="pull-right mb-2" style="text-align:center;padding:20px">
        <h1  > </h1>
    </div> 


   <div class="col-lg-6" style="text-align: center">
    <h3><span>doctor:</span> gamal </h3>
    <h3><span>previous subjects:</span> arabic </h3>
   </div>
 
       
</body>
</html>
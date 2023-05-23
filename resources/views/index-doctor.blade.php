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
        <a class="btn btn-success" href="{{route('index.logout')}}"> Logout </a>
        <a class="btn btn-success" href="{{route('dashboard')}}"> system </a>

    </div>
     
    <div class="pull-right mb-2" style="text-align:center;padding:20px">
        <h1  >dr: {{Auth::guard('doctor')->user()->name}}</h1>
    </div> 
    <table class="table table-bordered" style="width:900px;margin:auto">
        <thead>
            <tr>
                <th >id</th>
               
                <th > subjects</th>
               
            </tr>
        </thead>
        <tbody>

            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $subject->id }}</td>
                    
                    <td> <a href="">{{ $subject->name }}</a> </td>
                   
                    @auth('doctor')
                   
                    @endauth
                   
                   
                </tr>
                @endforeach
        </tbody>
    </table>
    <form action="{{route('store.subject')}}" method="POST" enctype="multipart/form-data">
   @csrf
    <div class="col-lg-6 col-sm-12 col-md-12" style="margin:auto">
        <div class="form-group col-lg-12">
            <strong> upload file:</strong>
            <input type="file" name="file" value="" class="form-control" placeholder=" file">
            @error('file')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <a class="btn btn-primary col-lg-12" href=""> upload  </a>

    </div>
    
</form>
       
</body>
</html>
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
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
            
                <div class="pull-right mb-2" style="text-align:right;padding:20px">
                    <a class="btn btn-success" href="{{route('student.logout')}}"> Logout </a>
                    <a class="btn btn-success" href="{{route('dashboard')}}"> system </a>
            
                </div>
              
                @auth('web')
                <div class="pull-left">
                    <h1 style="text-align: center">student: {{Auth::user()->name}}</h1>
                </div>
                @endauth
               
                
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
       
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th >id</th>
                    <th > subjects</th>
                    <th > departments</th>
                   
                </tr>
            </thead>
            <tbody>

                @foreach ($subjects as $subject)
                    <tr>
                        <td>{{ $subject->id }}</td>
                       <td> <a href="{{route('student.index')}}">{{ $subject->name }}</a></td>
                        <td>{{ $subject->department }}</td>
                       
                     
                       
                       
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {{-- {!! $subjects->links() !!} --}}
    </div>
</body>
</html>
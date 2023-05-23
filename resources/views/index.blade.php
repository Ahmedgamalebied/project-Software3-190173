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
            
                <div class="pull-left">
                    <h1 style="text-align: center; font-size:50px"> System Administrator</h1>
                </div>
              
                
              
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{route('doctor.login')}}"> are you Doctor ?</a>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{route('login')}}"> are you student ?</a>
                </div>
                
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{route('create.subject')}}"> Add Subject</a>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('create.department') }}"> Add department</a>
                </div>
            
                
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
                    <th > subject</th>
                    <th > department</th>
                    <th > previous subjects</th>
                    {{-- @auth('doctor') --}}
                    <th width="280px">Action</th>
                    {{-- @endauth --}}
                </tr>
            </thead>
            <tbody>

                @foreach ($subjects as $subject)
                    <tr>
                        <td>{{ $subject->id }}</td>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->department }}</td>
                        <td>{{ $subject->previous }}</td>
                       
                        {{-- @auth('doctor') --}}
                        <td>
                            <form action="{{ route('delete.subject',$subject->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('edit.subject',$subject->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        {{-- @endauth --}}
                       
                       
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {{-- {!! $subjects->links() !!} --}}
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
    <form action="{{route('store.subject')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row col-lg-6">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> subject:</strong>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder=" Name">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> code:</strong>
                    <input type="text" name="code" value="{{old('email')}}" class="form-control" placeholder=" code">
                    @error('code')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> previous subjects:</strong>
                    <input type="text" name="previous" value="{{old('email')}}" class="form-control" placeholder=" previous subjects">
                    @error('code')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> department:</strong>
                    <select name="department" class="select2 form-control">
                        @foreach($departments as $department)
                            <option value="{{$department->name}}"> {{$department->name}}   </option>
                        @endforeach    
                        
                    </select>                    @error('department_id')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Add subject</button>
        </div>
    </form>
</body>
</html>
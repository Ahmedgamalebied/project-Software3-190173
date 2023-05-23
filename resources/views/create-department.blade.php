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
    <form action="{{route('store.department')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row col-lg-6">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> department:</strong>
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
          
            <button type="submit" class="btn btn-primary ml-3">Add department</button>
        </div>
    </form>
    
</body>
</html>
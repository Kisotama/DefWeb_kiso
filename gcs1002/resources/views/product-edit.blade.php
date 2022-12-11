<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container"  style="margin-top: 20px">
        <div    class="row">
            <div    class="col-mid-12">
                <h2>Update Product</h2>
                @if (Session::has('success'))
                    <div    class="alert alert-success"  role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif

                <form action="{{{url('product-update')}}}" method="POST">
                    @csrf
                    <div    class="md-3">
                        <label for="form-label">Product ID</label>
                        <input type="text"  class="form-control" name="id" value="{{$data->id}}" readonly>
                    </div>
                    <div    class="md-3">
                        <label for="form-label">Name</label>
                        <input type="text"  class="form-control" name="name" value="{{$data->name}}">

                    </div>
                    <div    class="md-3">
                        <label for="form-label">Price</label>
                        <input type="text"  class="form-control" name="price" value="{{$data->price}}">
                    </div>

                    <div    class="md-3">
                        <label for="form-label">Category</label>
                        {!! Form::select('categoryID', $cat_list, $data->categoryID, ['class' => 'form-control']) !!}
                    </div>
                    <div    class="md-3">
                        <label for="form-label">Image </label>
                        <input type="file"  class="form-control" name="Image">
                    </div>
                     <br>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{url('product-list')}}"   class="btn  btn-danger">Back</a>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

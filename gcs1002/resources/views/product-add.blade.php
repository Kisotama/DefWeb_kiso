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
                <h2>Add Product</h2>
                @if (session('success'))
                    <div    class="alert alert-success"  role="alert">
                        {{session('success')}}
                    </div>
                @endif

                <form action="{{{url('product-save')}}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div    class="md-3">
                        <label for="form-label">Name</label>
                        <input type="text"  class="form-control" name="name"  placeholder="Enter product Name">

                    </div>
                    <div    class="md-3">
                        <label for="form-label">Price</label>
                        <input type="text"  class="form-control" name="price"  placeholder="Enter product Price">
                    </div>

                    <div    class="md-3">
                        <label for="form-label">Category</label>
                        {{-- <input type="number"  class="form-control" name="Category"> --}}
                        <select name="categoryID" id="form-control">
                            @foreach ($data as $Category )
                            <option value="{{$Category->id}}">
                                {{$Category->cat_name}}
                            </option>

                            @endforeach
                        </select>

                    </div>
                    <div    class="md-3">
                        <label for="form-label">Image</label>
                        <input type="file"  class="form-control" name="image">
                    </div>
                     <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{url('product-list')}}"   class="btn  btn-danger">Back</a>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

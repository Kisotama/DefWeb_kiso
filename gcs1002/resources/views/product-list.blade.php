<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container" style="margin-top:20px;">
        <div class="row">
            <div class="col-mid-12">
                <div style="margin-right: 10% ;  float:  right">
                    <a href="{{ url('product-add') }}" class="btn btn-primary">Add Product</a>
                </div>
                <table class="table table-hover">
                    <caption align="top">
                        @if (session('success'))
                        <div    class="alert alert-success"  role="alert">
                            {{session('success')}}
                        </div>
                    @endif
                        <h2>Product List</h2>
                    </caption>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <img src="http://localhost/gcs1002/public/Image/{{$product->image}}" alt="No image" height="120px" width="160px"
                                        title="{{ $product->productDetails }}">
                                </td>
                                <td>{{ $product->cat_name }}</td>
                                <td>
                                    <a href="{{ url('product-edit/' . $product->id) }}" class="btn btn-primary">
                                        Edit
                                    </a> |
                                    <a href="{{ url('product-delete/' . $product->id) }}" class="btn btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>

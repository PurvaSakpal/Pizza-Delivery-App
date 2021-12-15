<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wtotalth=device-width, initial-scale=1.0">
    <title>Order Page</title>
    @include('admin.includes.head')
</head>
<body>
    <nav>
    @include('admin.includes.nav')
    </nav>
    <div class="container">
        <h1>Orders </h1>
        <table class="table">
            <tbody>
                <tr>
                    <th scope="col">Order Id</th>
                    <td>{{$order->id}}</td>
                </tr>
                <tr>
                    <th scope="col">Card Details</th>
                    <td>{{$order->ccdetails}}</td>
                </tr>
                <tr>
                    <th scope="col">Total Amount</th>
                    <td><b class="text">{{$order->total}}</b></td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Quantity</th>
                    <th>Product Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderproducts as $prod )
                <tr>
                    <td><img src="{{ URL::asset('image/'.$prod['image']) }}" height="100px"></td>
                    <td>{{ $prod["pname"] }}</td>
                    <td>{{ $prod["quantity"] }}</td>
                    <td>{{ $prod["price"] }}</td>
                </tr>                            
                @endforeach
            </tbody>
        </table>
    </div>
@include('admin.includes.script')
    
</body>
</html>
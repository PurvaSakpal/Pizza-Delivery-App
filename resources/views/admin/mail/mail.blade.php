<table class="table">
    <tbody>
        <tr>
            <th scope="col">Order Id :</th>
            <td>{{$order->id}}</td>
        </tr>
        <tr>
            <th scope="col">Card Details :</th>
            <td>{{$order->ccdetails}}</td>
        </tr>
        <tr>
            <th scope="col">Total Amount :</th>
            <td><b class="text text-danger">{{$order->total}}</b></td>
        </tr>
        <tr>
            <th scope="col">Product Details</th>
            <td>
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
                            <td>{{$prod["pname"]}}</td>
                            <td>{{$prod["quantity"]}}</td>
                            <td>{{$prod["price"]}}</td>
                        </tr>                            
                        @endforeach
                    </tbody>
                </table>
            </td>
        </tr>  
    </tbody>
    </table>
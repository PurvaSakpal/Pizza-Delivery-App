<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success page</title>
    @include('admin.includes.head')
</head>
<body>
    <nav>
        @include('admin.includes.nav')
    </nav>
    <div class="container">
        <h1 class="display-4">Order has been placed successfully!</h1>
        
        <div class="alert alert-success">You will receive notification by email with order details.</div>
        <div class="col-12">
            <a href="{{route('menu')}}" class="btn btn-dark">Go and order some more</a>
        </div>
    </div>
@include('admin.includes.script')
    
</body>
</html>
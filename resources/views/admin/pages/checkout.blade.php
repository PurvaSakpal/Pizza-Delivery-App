<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.includes.head')
    <title>Checkout Page</title>
</head>
<body>
    @include('admin.includes.nav')
    <div class="container">
        <h1 class="my-3">Checkout</h1>
        <form action="{{route('postOrder')}}" method="post">
            @csrf()
            <div class="form-group">
            <label for="creditCard" class="col-form-label col-form-label-lg">Credit card</label>
            <div class="col-12">
                <input type="text" name="creditCard" class="form-control form-control-lg" id="creditCard" placeholder="e.g: XXXX-XXXX-XXXX-XXXX">
            </div>
            </div>
            <div class="form-group">
                <label for="total">Order Total : </label>
                <span><b>RS.{{$val}}</b></span>
            </div>
            <input type="hidden" value="{{$val}}" name="total">
            <div class="form-group">
                <button class="btn btn-dark text-light" type="submit">Checkout</button>
            </div>
        </form>
    </div>
    @include('admin.includes.script')
</body>
</html>
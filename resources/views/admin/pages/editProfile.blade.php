<!doctype HTML>
<html>
    <head>
        @include('admin.includes.head')
        <title>Edit Profile</title>
    </head>
    <body>
        <nav>
            @include('admin.includes.loginNav')
        </nav>
        <div class="container">
        @if(Session::has('user_updated'))
            <div class="alert alert-success">{{Session::get('user_updated')}}</div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif
        <form action="{{route('update.profile')}}" method="post">
                @csrf()
                <h1 class="text-warning text-center">Edit Profile</h1>
                <input type="hidden" value="{{$profile->id}}" name="hidden">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
                    <div class="col-10">
                        <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{$profile->name}}">
                    </div>
                </div>
                @if($errors->has('name'))
                    <div class="alert alert-danger">{{$errors->first('name')}}</div>
                @endif
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
                    <div class="col-10">
                        <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{$profile->email}}">
                    </div>
                </div>
                @if($errors->has('email'))
        <div class="alert alert-danger">{{$errors->first('email')}}</div>
            @endif
                <div class="form-group row">
                    <label for="mobileNo" class="col-sm-2 col-form-label col-form-label-lg">Mobile No</label>
                    <div class="col-10">
                        <input type="text" class="form-control form-control-lg" id="mobileNo" name="mobileNo" value="{{$profile->mobileno}}">
                    </div>
                </div>
                @if($errors->has('mobileno'))
        <div class="alert alert-danger">{{$errors->first('mobileNo')}}</div>
            @endif
                <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label col-form-label-lg">Address</label>
                    <div class="col-10">
                        <textarea name="address" id="address" class="form-control form-control-lg" cols="30" rows="8">{{$profile->address}}</textarea>
                    </div>
                </div>
                @if($errors->has('address'))
                    <div class="alert alert-danger">{{$errors->first('address')}}</div>
                @endif
                <div class="form-group row">
                    <label for="" class="col-2"></label>
                <div class="col-sm-10 col-lg-10">
                    <button type="submit" class="btn btn-warning btn-lg" name="update">Update</button>
                </div>
                </div>
            </form>
        </div>
        @include('admin.includes.script')
    </body>
</html>
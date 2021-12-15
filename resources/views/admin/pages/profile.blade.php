<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    @include('admin.includes.head')
</head>
<body>
    <nav>
    @include('admin.includes.nav')
    </nav>
    <div class="container">
    <h1 class="my-3">My Profile</h1>
        <table id="cart" class="table table-hover table-condensed">
                <tr>
                    <th>Name</th>
                    <td>{{$details[0]->name}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$details[0]->email}}</td>
                </tr>
                <tr>
                    <th>Mobile No</th>
                    <td>{{$details[0]->mobileno}}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{$details[0]->address}}</td>
                </tr>
                <tr>
                    <th>Action</th>
                    <td>
                        <a href="{{route('edit.profile')}}" class="btn btn-success">Edit</a>
                    </td>
                </tr>
        </table>
        </div>
@include('admin.includes.script')
    
</body>
</html>
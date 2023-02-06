@extends('layouts.main')

@section('content')

    <br>
@if (Auth::user()->roll == 1)

    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-sm-12">

            <form action="{{route('suppliers.update',$supplier->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 mt-3">
                  <label for="name" class="form-label">Full name:</label>
                  <input type="text" class="form-control" value="{{$supplier->fullname}}" id="name" placeholder="Enter Full Name" name="name">
                </div>

                <div class="mb-3 mt-3">
                    <label for="cname" class="form-label">Company name:</label>
                    <input type="text" class="form-control" value="{{$supplier->companyname}}" id="cname" placeholder="Enter Company Name" name="companyname">
                </div>

                <div class="mb-3 mt-3">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" class="form-control" value="{{$supplier->address}}" id="address" placeholder="Enter Address" name="address">
                </div>

                <div class="mb-3 mt-3">
                    <label for="city" class="form-label">City:</label>
                    <input type="text" class="form-control" value="{{$supplier->city}}" id="city" placeholder="Enter City" name="city">
                </div>

                <div class="mb-3 mt-3">
                    <label for="postalcode" class="form-label">Postal Code:</label>
                    <input type="text" class="form-control" value="{{$supplier->postalcode}}" id="postalcode" placeholder="Enter Postal code" name="pcode">
                </div>

                <div class="mb-3 mt-3">
                    <label for="regno" class="form-label">Company Register Number:</label>
                    <input type="text" class="form-control" value="{{$supplier->regno}}" id="regnum" placeholder="Enter Registation Number" name="regno">
                </div>

                <div class="mb-3 mt-3">
                    <label for="des" class="form-label">Description:</label>
                    <textarea class="form-control" rows="5" id="des" name="des">
                        {{$supplier->des}}
                    </textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>
    </div>

@else

    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger">
                <strong>Access Denited!</strong> You have not permition to add suppliers <a href="{{route('login')}}" class="alert-link">Back to Login</a>.
              </div>
        </div>
    </div>

@endif




@endsection

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
    <form action="{{route('staff.update',$staff->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3 mt-3">
          <label for="staffname" class="form-label">Staff Full Name:</label>
          <input type="text" class="form-control" value="{{$staff->fullname}}" id="staffname" placeholder="Enter Full Name" name="staffname">
        </div>

        <div class="mb-3 mt-3">
            <label for="stafftel" class="form-label">Staff TEL NO:</label>
            <input type="number" class="form-control" value="{{$staff->tel}}" id="stafftel" placeholder="Enter Tel Numbe" name="stafftel">
          </div>

          <div class="mb-3 mt-3">
            <label for="staffaddress" class="form-label">Address:</label>
            <input type="text" class="form-control" value="{{$staff->address}}" id="staffaddress" placeholder="Enter Address" name="address">
          </div>

          <div class="mb-3 mt-3">
            <label for="staffnic" class="form-label">NIC:</label>
            <input type="text" class="form-control" value="{{$staff->nic}}" id="staffnic" placeholder="Enter NIC" name="nic">
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
</div>



@else

    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger">
                <strong>Access Denited!</strong> You have not permition to add staff <a href="{{route('login')}}" class="alert-link">Back to Login</a>.
              </div>
        </div>
    </div>

@endif

@endsection


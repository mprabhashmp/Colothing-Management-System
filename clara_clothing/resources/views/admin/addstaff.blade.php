@extends('layouts.main')

@section('content')

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
    <form action="{{route('staff.store')}}" method="POST">
        @csrf
        <div class="mb-3 mt-3">
          <label for="staffname" class="form-label">Staff Full Name:</label>
          <input type="text" class="form-control" id="staffname" placeholder="Enter Full Name" name="staffname">
        </div>

        <div class="mb-3 mt-3">
            <label for="staffname" class="form-label">Staff Member email:</label>
            <input type="email" class="form-control" id="staffemail" placeholder="Enter Member email" name="staffemail">
          </div>

        <div class="mb-3 mt-3">
            <label for="stafftel" class="form-label">Staff TEL NO:</label>
            <input type="number" class="form-control" id="stafftel" placeholder="Enter Tel Numbe" name="stafftel">
          </div>

          <div class="mb-3 mt-3">
            <label for="staffaddress" class="form-label">Address:</label>
            <input type="text" class="form-control" id="staffaddress" placeholder="Enter Address" name="address">
          </div>

          <div class="mb-3 mt-3">
            <label for="staffnic" class="form-label">NIC:</label>
            <input type="text" class="form-control" id="staffnic" placeholder="Enter NIC" name="nic">
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
</div>



@endsection

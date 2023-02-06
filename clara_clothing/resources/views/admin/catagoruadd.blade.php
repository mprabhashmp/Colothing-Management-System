@extends('layouts.main')

@section('content')

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
            <form action="{{route('catagory.store')}}" method="POST">
                @csrf
                <div class="mb-3 mt-3">
                  <label for="catagoey" class="form-label">Catagory Name:</label>
                  <input type="text" class="form-control mb-2" id="catagoey" placeholder="Enter Sub catagory" name="catagoryname">
                  <label for="maincatagoey" class="form-label">Main Catagory Name:</label>
                  {{-- <input type="text" class="form-control" id="maincatagoey" placeholder="Enter Main catagory" name="main_catagoryname"> --}}
                  <select class="form-select" name="main_catagoryname">
                    <option value="selected disabled hidden">-- Select Main Catagory --</option>
                      @foreach ($maincats as $m)
                          <option value="{{$m->name}}">{{$m->name}}</option>
                      @endforeach

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>


@endsection

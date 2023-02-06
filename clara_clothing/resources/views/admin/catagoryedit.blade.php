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

            @foreach ($cat as $c) 
            <form action="{{route('catagory.update', $c->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3 mt-3">
                  <label for="catagory" class="form-label">Catagory Name:</label>
                  <input type="text" class="form-control mb-2" id="catagory" value="{{$c->catagoryname}}" placeholder="Enter Sub catagory" name="catagoryname">
                  <label id="maincatagory" " class="form-label">Main Catagory Name:</label>
                  {{-- <input type="text" class="form-control" id="maincatagory" value="{{$c->main_catagoryname}}" placeholder="Enter Main catagory" name="main_catagoryname"> --}}
                  <select class="form-select" name="main_catagoryname" id="maincatagory" >
                    <option value="selected disabled hidden">-- Select Main Catagory --</option>
                      @foreach ($maincat as $mc)
                          <option value="{{$mc->name}}">{{$mc->name}}</option>
                      @endforeach

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
              @endforeach
        </div>
    </div>


@endsection

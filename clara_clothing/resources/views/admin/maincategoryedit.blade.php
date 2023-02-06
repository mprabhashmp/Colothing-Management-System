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

            <form action="{{route('maincatagories.update',$maincatagories->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 mt-3">
                    <label for="catagoey" class="form-label">Main Catagory Name:</label>
                    <input type="text" class="form-control" id="catagory" placeholder="Enter Main catagory" name="name" value="{{$maincatagories->name}}">
                    <label for="image" class="form-label">Catagory Image:</label>
                    <input type="file" class="form-control" id="image" placeholder="Enter Main catagory" name="catagory_img" value="{{$maincatagories->catagory_img}}">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
 
        </div>
    </div>


@endsection
@extends('layouts.main')

@section('content')

    <div class="row">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="col-sm-12">
            <a href="{{route('maincatagories.create')}}" class="btn btn-primary">Add Main Catagories</a>
            <br>
            <hr>

            <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th>
                        Id
                    </th>
                    <th>Main Catagory Name</th>
                    <th>Catagory image</th>
                    <th>Action</th>
                  </tr>
                  
                  @foreach ($maincatagory as $c)
                    <tr>
                        <td>{{$c->id}}</td>
                        <td>{{$c->name}}</td>
                        <td>{{$c->catagory_img}}</td>
                        <td>
                            <form action="{{ route('maincatagories.destroy',$c->id) }}" method="POST">

                                <a class="btn btn-primary" href="{{ route('maincatagories.edit',$c->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                  @endforeach
                </table>
              </div>

        </div>
    </div>

@endsection

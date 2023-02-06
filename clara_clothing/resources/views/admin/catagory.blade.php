@extends('layouts.main')

@section('content')

    <div class="row">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="col-sm-12">
            <a href="{{route('catagory.create')}}" class="btn btn-primary">Add Catagory</a>
            <br>
            <hr>

            <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th>
                        Id
                    </th>
                    <th>Sub Catagory Name</th>
                    <th>Main Catagory Name</th>
                    <th>Action</th>
                  </tr>
                  @foreach ($catagory as $c)
                    <tr>
                        <td>{{$c->id}}</td>
                        <td>{{$c->catagoryname}}</td>
                        <td>{{$c->main_catagoryname}}</td>
                        <td>
                            <form action="{{ route('catagory.destroy',$c->id) }}" method="POST">

                                <a class="btn btn-primary" href="{{ route('catagory.edit',$c->id) }}">Edit</a>

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

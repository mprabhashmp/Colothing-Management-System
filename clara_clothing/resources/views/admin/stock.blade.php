@extends('layouts.main')

@section('content')

    <div class="row">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="col-sm-12">
            <a href="{{route('stocke.create')}}" class="btn btn-primary">Add Stockes</a>
            <br>
            <hr>

            <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th>Stock ID</th>
                    <th>Supplier ID</th>
                    <th>Quntity</th>
                    <th>Price</th>
                    <th>Date</th>

                    <th>Action</th>
                  </tr>
                  @foreach ($stockes as $s)
                    <tr>
                        <td>{{$s->id}}</td>
                        <td>{{$s->supid}}</td>
                        <td>{{$s->quntity}}</td>
                        <td>{{$s->price}}</td>
                        <td>{{$s->date}}</td>

                        <td>
                            <form action="{{ route('stocke.destroy',$s->id) }}" method="POST">

                                <a class="btn btn-primary" href="{{ route('stocke.edit',$s->id) }}">Edit</a>

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

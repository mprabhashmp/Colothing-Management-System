@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <br>
            <a href="{{route('suppliers.create')}}" class="btn btn-primary">Add Supplier</a>
            <br><hr>

            <div class="table-responsive-sm">
                <table class="table">
                    <tr>
                        <th>Full Name</th>
                        <th>Company Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Postal code</th>
                        <th>Register Number</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($suppliers as $s)
                        <tr>
                            <td>{{$s->fullname}}</td>
                            <td>{{$s->companyname}}</td>
                            <td>{{$s->address}}</td>
                            <td>{{$s->city}}</td>
                            <td>{{$s->postalcode}}</td>
                            <td>{{$s->regno}}</td>
                            <td>{{$s->des}}</td>
                            <td>
                                <form action="{{ route('suppliers.destroy',$s->id) }}" method="POST">

                                    <a class="btn btn-primary" href="{{ route('suppliers.edit',$s->id) }}">Edit</a>

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

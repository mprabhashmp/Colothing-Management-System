@extends('layouts.main')

@section('content')


<br>
<a href="{{route('staff.create')}}" class="btn btn-primary">Add Staff</a>
<br><hr>

<div class="table-responsive-sm">
    <table class="table">
        <tr>
            <th>Full Name</th>
            <th>Tel</th>
            <th>Address</th>
            <th>NIC</th>
            
        </tr>
        @foreach ($staff as $s)
            <tr>
                <td>{{$s->fullname}}</td>
                <td>{{$s->tel}}</td>
                <td>{{$s->address}}</td>
                <td>{{$s->nic}}</td>
                <td>
                    <form action="{{ route('staff.destroy',$s->id) }}" method="POST">

                        <a class="btn btn-primary" href="{{ route('staff.edit',$s->id) }}">Edit</a>

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
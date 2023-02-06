@extends('layouts.main')

@section('content')

<div class="row">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="col-sm-12">
        <a href="{{route('product.create')}}" class="btn btn-primary">Add Product</a>
        <br>
        <hr>

        <div class="table-responsive">
            <table class="table">
              <tr>
                <th>
                    Product Name
                </th>
                <th>Catagory</th>
                <th>Main Catagory</th>
                <th>Image</th>
                <th>Price</th>
                <th>Size</th>
                <th>Code</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              @foreach ($products as $p)
                <tr>
                    <td>{{$p->name}}</td>
                    <td>{{$p->catagory}}</td>
                    <td>{{$p->main_catagory}}</td>
                    <td><img src="{{asset('uploads/'.$p->image1)}}" class="img-fluid" style="width: 50px;"></td>
                    <td>{{$p->price}}</td>
                    <td>{{$p->size}}</td>
                    <td>{{$p->code}}</td>
                    <td>{{$p->status}}</td>
                    <td>
                        <form action="{{ route('product.destroy',$p->id) }}" method="POST">

                            <a class="btn btn-primary" href="{{ route('product.edit',$p->id) }}">Edit</a>

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

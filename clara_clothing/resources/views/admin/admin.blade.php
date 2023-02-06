@extends('layouts.main')

@section('content')

<section class="admin-cards">
    <div class="values">
        <div class="val-box">
            <i class="fas fa-users"></i>
            <div>
                <h3>{{$users}}</h3>
                <span>New Users</span>
            </div>
        </div>

        <div class="val-box">
            <i class="fas fa-shopping-cart"></i>
            <div>
                <h3>{{$orders}}</h3>
                <span>New Orders</span>
            </div>
        </div>

        <div class="val-box">
            <i class="fas fa-box"></i>
            <div>
                <h3>{{$items}}</h3>
                <span>Products</span>
            </div>
        </div>

        <div class="val-box">
            <i class="fas fa-dollar-sign"></i>
            <div>
                <h3>RS:{{$rev}}</h3>
                <span>Revenue</span>
            </div>
        </div>
    </div>
</section>

@endsection

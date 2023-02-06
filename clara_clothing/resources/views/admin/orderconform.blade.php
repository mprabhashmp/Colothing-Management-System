@extends('layouts.main')

@section('content')


<h1>Orders</h1>

<br>
<br><hr>

<div class="table-responsive-sm">
    <table class="table">
        <tr>
            <th>cusid</th>
            <th>products</th>
            <th>total</th>
            <th>confirm</th>
            
        </tr>
        @foreach ($order as $o)
        
            <tr>
                <td>{{$o->cusid}}</td>
                <td>{{$o->products}}</td>
                <td>{{$o->total}}</td>
                 @if($o->confirm==1)
                    <td>Confirm</td>
                 @else
                    <td>Pending</td>   
                 @endif   
                <td>
                    <form action="{{ route('ordercon.update',$o->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="color">Satatus</label>
                    <select name="st" id="color">
                        <option value="1">Confirm</option>
                        <option value="0">Pending</option>
                        
                    </select>

                    <button type="submit" class="btn btn-success" >Edite</button>
                        

                        
                        
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
</div>
</div>



@endsection
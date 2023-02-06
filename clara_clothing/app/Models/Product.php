<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'catagory','image1','image2','image3','price','size','code','des','status',
    ];

    public function scopeFilter($query, array $filters){
        if($filters['cat'] ??  false){
            $query->where('catagory', 'like', '%' . request('cat') .'%');
        }
        if($filters['psearch'] ??  false){
            $query->where('name', 'like', '%' . request('psearch') .'%')
                    // ->orWhere('des', 'like', '%' . request('psearch') .'%');
                    ->orWhere('catagory', 'like', '%' . request('psearch') .'%');
        }

        if($filters['search'] ??  false){
            $query->where('name', 'like', '%' . request('search') .'%')
                    ->orWhere('des', 'like', '%' . request('search') .'%');
                    // ->orWhere('tags', 'like', '%' . request('search') .'%');
        }

        if($filters['sizes'] ??  false){
            $query->where('size', 'like', '%' . request('sizes') .'%' );
                    // ->Where('price', '>',  request('pmin'));
                    // ->orWhere('tags', 'like', '%' . request('search') .'%');
        }

        if($filters['pmin'] ??  false){
            $query->where('price', '>=', request('pmin') )
                    ->Where('price', '<',  request('pmax'));
                    // ->orWhere('tags', 'like', '%' . request('search') .'%');
        }

        if($filters['pmax'] ??  false){
            $query->where('price', '<=', request('pmax') )
                    ->Where('price', '>',  request('pmin'));
                    // ->orWhere('tags', 'like', '%' . request('search') .'%');
        }


    }
}

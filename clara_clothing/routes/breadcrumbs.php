<!-- use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SupplierController; -->

<?php
 
// Breadcrumbs::for('pages', function (BreadcrumbTrail $trail): void {
//     $trail->push('Pages', route('pages'));
// });

Breadcrumbs::for('home', function ($trail){
    $trail->push('Home', route( name:'home'));
});

Breadcrumbs::for('cus_dashboard', function ($trail){
    $trail->parent('home');
    $trail->push('Customer Dashboard', route( name:'cus_dashboard'));
});

Breadcrumbs::for('contactus', function ($trail){
    $trail->parent('home');
    $trail->push('Contact Us', route( name:'contactus'));
});

Breadcrumbs::for('shop', function ($trail){
    $trail->parent('home');
    $trail->push('Shop', route( name: 'shop'));
});

Breadcrumbs::for('cusTheme', function ($trail){
    $trail->push('Customer', route( name:'cusTheme'));
});


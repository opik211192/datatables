<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('getUser', [UserController::class, 'index'])->name('user.index');

Route::get('/{user}/show', [UserController::class, 'show'])->name('user.show');

Route::delete('/{user}', [UserController::class, 'delete'])->name('user.delete');


// Route::get('getUser', function(Request $request){
//     if($request->ajax()){
//         $data = User::latest()->get();
//         return Datatables::of($data)
//             ->addIndexColumn()
//             ->addColumn('action', function($row){
//                 $actionBtn =  '<a href="javascript:void(0)" class="edit btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
//                 return $actionBtn;
//             })
//             ->rawColumns(['action'])
//             ->make(true);
//     }
// })->name('user.index');

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '
                    <a href="'.route('user.show', $row->id).'" class="edit btn-success btn-sm">
                    <i class="fas fa-cog">Edit</i>
                    </a>
                    <form action="' .route('user.delete', $row->id) . '}" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm(\'Are You Sure Want to Delete?\')">Delete</button>
                    </form>
                ';
                    return $btn;
                })->rawColumns(['action'])
                ->make(true);
        }

    }

    public function show(User $user)
    {
        dd($user);
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect('/')->with('pesan', "Hapus data berhasil");
    }
}

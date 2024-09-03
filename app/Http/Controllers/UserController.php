<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Designation;

class UserController extends Controller
{
    public function index()
    {
        // Eager load department and designation relationships
        $users = User::with(['department', 'designation'])->get();
        
        return view('welcome', compact('users'));
    }

    public function create()
    {
        $departments = Department::all();
        $designations = Designation::all();
        return view('create', compact('departments', 'designations'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query', '');

        $users = User::where('name', 'like', "%{$query}%")
            ->orWhereHas('designation', function($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->orWhereHas('department', function($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->get();

        return view('user-cards', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'fk_department' => 'required|exists:departments,id',
            'fk_designation' => 'required|exists:designations,id',
            'phone_number' => 'required|string|max:15',
        ]);

        User::create($request->all());

        return redirect()->route('users');
    }
}

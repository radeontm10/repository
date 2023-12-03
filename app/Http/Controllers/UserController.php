<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function index()
    // {
    //     //parsing data
    //     $nama = "Khevin Arviansyah";
    //     $data = [
    //         'myName' => $nama
    //     ];
    //     return view('user.index', $data);
    // }
//     public function index()
//     {
//         $users = session('users', []);
//         return view('user.index', compact('users'));
//     }
       

//     public function create()
//     {
//         return view("user.create");
//     }
    
//     public function store(Request $request)
//     {
//     return redirect()->route('user.index');
//     }

//     public function edit()
//     {
//         $users = session('users', []);
//         $user = $users[$id];
//         return view('user.edit', compact('user', 'id'));
//     }

//     public function destroy($id)
// {
//     $users = session('users', []);
//     unset($users[$id]);
//     session(['users' => $users]);
//     return redirect('/users');
// }
private $users = [
    [
        'id' => 1,
        'name' => 'Khevin Arviansyah',
        'email' => 'arviansyahvin@gmail.com',
        'password' => 'password1',
    ],
    [
        'id' => 2,
        'name' => 'Lyn',
        'email' => 'lyn@gmail.com',
        'password' => 'password2',
    ],
    [
        'id' => 3,
        'name' => 'mika',
        'email' => 'mika@gmail.com',
        'password' => 'password3',
    ],
];

public function index()
{
    $users = $this->users;
    return view('user.index', compact('users'));
}

public function create()
{
    return view('user.create');
}

public function store(Request $request)
{
    $user = [
        'id' => count($this->users) + 1,
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => $request->input('password'),
    ];
    array_push($this->users, $user);
    return redirect()->route('user.index');
}

public function show($id)
{
    $user = $this->users[$id - 1];
    return view('user.show', compact('user'));
}

public function edit($id)
{
    $user = $this->users[$id - 1];
    return view('user.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $userIndex = $id - 1;
    $this->users[$userIndex]['name'] = $request->input('name');
    $this->users[$userIndex]['email'] = $request->input('email');
    $this->users[$userIndex]['password'] = $request->input('password');

    return redirect()->route('user.index');
}

public function destroy($id)
{
    $userIndex = $id - 1;

       if (isset($this->users[$userIndex])) {
                unset($this->users[$userIndex]);

                return redirect()->route('user.index')->with('success', 'Pengguna berhasil dihapus');
    } else {
        
        return redirect()->route('user.index')->with('error', 'Pengguna tidak ditemukan');
    }
}

    
}

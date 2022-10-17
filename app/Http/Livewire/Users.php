<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $isBtnAddClicked = false ;

    public $newUser = [];

    protected $rules = [
        'newUser.name' => 'required',
        'newUser.lastName' => 'required',
        'newUser.email' => 'required|email|unique:users,email',
        'newUser.sexe' => 'required',
    ];
    protected $validationAttributes = [
        'newUser.email' => 'Email'
    ];
    public function render()
    {
        return view('livewire.users.index',[
            "users" => User::latest()->paginate(4)
        ])->extends("layouts.master")->section("contenu");
    }

    public function goToAddUser(){
        $this->isBtnAddClicked = true;
    }

    public function goToListUser(){
        $this->isBtnAddClicked = false;
    }
    public function addUser(){
        $validateAttribute = $this->validate();
        $validateAttribute['newUser']["password"] = "password";
        User::create($validateAttribute['newUser']);

        $this->newUser = [];
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur créé avec succès!"]);
    }
}

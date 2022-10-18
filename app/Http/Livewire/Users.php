<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;

    public $newUser = [];

    public $editUser = [];

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
    public function rules(){
        if($this->currentPage == PAGEEDITFORM){
            return [
                'editUser.name' => 'required',
                'editUser.lastName' => 'required',
                'editUser.email' => ['required', 'email', Rule::unique("users", "email")->ignore($this->editUser['id']) ],
                'editUser.sexe' => 'required',
            ];
        }
        else {
            return [
                'newUser.name' => 'required',
                'newUser.lastName' => 'required',
                'newUser.email' => 'required|email|unique:users,email',
                'newUser.sexe' => 'required',
            ];
        }
    }

    public function goToAddUser(){
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToListUser(){
        $this->currentPage = PAGELIST;
        $this->editUser = [];
    }

    public function goToEditUser($id){
        $this->editUser = User::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;
        //dd($this->editUser);
    }
    public function addUser(){
        $validateAttribute = $this->validate();
        $validateAttribute['newUser']["password"] = "password";
        User::create($validateAttribute['newUser']);

        $this->newUser = [];
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Compte créé avec succès!"]);
    }

    public function updateUser(){
        $validateAttribute = $this->validate();
        User::find($this->editUser["id"])->update($validateAttribute["editUser"]);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Mise à jour avec succès!"]);
    }
    public function confirmDelete($name,$id){

        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=>[
            'text' => "Vous êtes sur le point de supprimer le compte $name de la liste.Voulez vous continuer?",
            'title' =>"Êtes vous sûr de vouloir continuer?",
            'type' => "warning",
            'data' => [

                "user_id" => $id
            ]
        ]]);

    }
    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Compte supprimé avec succès!"]);
    }
}

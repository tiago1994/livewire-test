<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Users extends Component{
    public $users = [];
    public $action = '';
    public $edit_id = '';
    public $name = '';
    public $email = '';
    public $password = '';

    public function mount(){
        $this->index();
    }

    public function index(){
        $this->action = '';
        $this->edit_id = '';
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->users = User::all();
    }
    
    public function add(){
        $this->action = 'add';
    }
    
    public function save(){
        $new = new User();
        $new->name = $this->name;
        $new->email = $this->email;
        $new->password = $this->password;
        $new->save();

        $this->index();
    }
    
    public function edit($id){
        $this->action = 'edit';
        $user_edit = User::find($id);
        $this->edit_id = $user_edit->id;
        $this->name = $user_edit->name;
        $this->email = $user_edit->email;
    }

    public function update(){
        $new = new User();
        $user_edit = User::find($this->edit_id);
        $user_edit->name = $this->name;
        $user_edit->email = $this->email;
        if($this->password != ''){
            $user_edit->password = Hash::make($this->password);
        }
        $user_edit->save();

        $this->index();
    }

    public function remove($id){
        $delete = User::find($id)->delete();
        $this->index();
    }

    public function render(){
        return view('livewire.users');
    }
}

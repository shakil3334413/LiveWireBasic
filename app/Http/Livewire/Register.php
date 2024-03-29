<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{

    public $form=[
        'name'=>'',
        'email'=>'',
        'password'=>'',
        'password_confirmation'=>''
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'form.name' =>'required',
            'form.email' =>'required|email',
            'form.password' =>'required|confirmed'
        ]);
    }

    public function submit(){
        $this->validate([
            'form.name' =>'required',
            'form.email' =>'required|email',
            'form.password' =>'required|confirmed'
        ]);
        
        User::create($this->form);
        return redirect(route('home'));
    }
    public function render()
    {
        return view('livewire.register');
    }
}

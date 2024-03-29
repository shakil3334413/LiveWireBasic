<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $form=[
        'email'=>'',
        'password'=>'',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'form.email' =>'required|email',
            'form.password' =>'required'
        ]);
    }

    public function submit(){
        $this->validate([
            'form.email' =>'required|email',
            'form.password' =>'required'
        ]);
        Auth::attempt($this->form);
        return redirect(route('home'));
    }
    public function render()
    {
        return view('livewire.login');
    }
}

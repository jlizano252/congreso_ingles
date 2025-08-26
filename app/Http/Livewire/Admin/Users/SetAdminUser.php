<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class SetAdminUser extends Component
{
    public User $user;
    public string $password = "";

    protected function rules() {
        return [
            'password' => ['required']
        ];
    }

    public function update() {
        try {
            $this->validate();
            //
            $this->user->update([
                'admin' => 1,
                'password' => Hash::make($this->password)
            ]);
        }catch (\Exception $exception) {
            dd($exception);
            session()->flash( 'error', '¡Error al actualizar el usuario!' );
            return redirect(route('home'));
        }
        session()->flash( 'success', '¡Usuario actualizado con éxito!' );
        return redirect(route('home'));
    }

    public function render()
    {
        return view('livewire.admin.users.set-admin-user');
    }
}

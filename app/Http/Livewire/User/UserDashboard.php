<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\View\Components\UserBaseLayout;

class UserDashboard extends Component
{
    public function render()
    {
        return view('livewire.user.user-dashboard')->layout(UserBaseLayout::class);
    }
}

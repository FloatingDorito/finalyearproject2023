<?php

namespace App\Http\Livewire\User\Commission;

use App\View\Components\UserBaseLayout;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Commission;

class CommissionList extends Component
{
    use WithPagination;
    const PAGINATION_NUMBER = 12;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $commissions = Commission::where('status', true)
        ->paginate(self::PAGINATION_NUMBER);

        return view('livewire.user.commission.commission-list', ['commissions' => $commissions])->layout(UserBaseLayout::class);
    }
}

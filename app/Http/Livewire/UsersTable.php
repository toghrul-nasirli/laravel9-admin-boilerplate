<?php

namespace App\Http\Livewire;

use App\Services\RoleService;
use App\Services\UserService;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    protected $listeners = [
        'delete'
    ];

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $orderBy = 'id';
    public $orderDirection = 'asc';
    public $perPage = 10;
    public $role = 0;

    public function render()
    {
        $users = UserService::withFilter($this->search, $this->orderBy, $this->orderDirection, $this->perPage, $this->role);
        $roles = RoleService::all();

        return view('livewire.users-table', compact('users', 'roles'));
    }

    public function updating()
    {
        $this->gotoPage(1);
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('Swal:confirm', [
            'title' => __('admin.swal-title'),
            'text' => __('admin.swal-text'),
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        UserService::delete($id);
    }
}

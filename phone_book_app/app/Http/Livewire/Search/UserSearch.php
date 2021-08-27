<?php

namespace App\Http\Livewire\Search;

use App\Managers\UsersManager;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UserSearch extends Component
{
    use WithPagination;
    public $searchTerm;
    public $currentPage = 1;
    private UsersManager $usersManager;
    public $phoneId;

    public function mount($phone)
    {
        $this->phoneId = $phone['id'];
    }

    public function render(UsersManager $usersManager)
    {
        $this->usersManager = $usersManager;

        $users = $this->usersManager->searchUser($this->searchTerm);

        $phoneId = $this->phoneId;
        return view('livewire.search.user-search', [
            'users' => $users,
            'phone' => $phoneId
        ]);
    }

    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];

        Paginator::currentPageResolver(function () {
            return $this->currentPage;
        });
    }
}

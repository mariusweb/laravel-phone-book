<?php

namespace App\Http\Livewire\Search;


use App\Managers\UsersManager;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class PhoneSearch extends Component
{
    use WithPagination;
    public $searchTerm;
    public $currentPage = 1;
    private UsersManager $usersManager;


    public function render(UsersManager $usersManager)
    {
        $this->usersManager = $usersManager;

        $phoneBook = $this->usersManager->searchUserPhoneBook($this->searchTerm);


        return view('livewire.search.phone-search', [
            'phoneBook' => $phoneBook
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

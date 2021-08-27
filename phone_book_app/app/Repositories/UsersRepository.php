<?php

namespace App\Repositories;

use App\Models\User;

class UsersRepository
{

    public function searchUser(string $searchTerm)
    {
        $users = User::where('name', 'like', $searchTerm)
            ->orWhere('email','like', $searchTerm)
            ->paginate(5);

        return $users;
    }

    public function searchUserPhoneBook(string $searchTerm)
    {
        $phoneBook = User::find(auth()->id())->phone()
            ->where(
                function ($queryName) use ($searchTerm) {
                    $queryName->where('phones.user_id', auth()->id())
                        ->where('phones.name', 'like', $searchTerm);
                }
            )
            ->orWhere(
                function ($queryName) use ($searchTerm) {
                    $queryName->where('phones.user_id', auth()->id())
                        ->where('phones.phone', 'like', $searchTerm);
                }
            )
            ->get();

        $phoneBookShare = User::find(auth()->id())->sharePhones()
            ->where(
                function ($queryName) use ($searchTerm) {
                    $queryName->where('phones.name', 'like', $searchTerm);
                }
            )
            ->orWhere(
                function ($queryName) use ($searchTerm) {
                    $queryName->where('phones.phone', 'like', $searchTerm);
                }
            )
            ->get();

        $phoneBookMerge = $phoneBook->merge($phoneBookShare)->paginate(5);
        return $phoneBookMerge;
    }

}

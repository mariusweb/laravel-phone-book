<?php

namespace App\Repositories;

use App\Http\Requests\UpdatePhoneRequest;
use App\Models\Phone;
use App\Http\Requests\StorePhoneRequest;

class PhonesRepository
{
    public function storePhoneNumber(StorePhoneRequest $request)
    {
        Phone::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'phone' => $request->phone,
        ]);
    }

    public function updatePhoneNumber(UpdatePhoneRequest $request, $id)
    {
        $phone = Phone::find($id);
        $phone->update($request->toArray());
    }

    public function getPhoneNumber($id)
    {
        $phone = Phone::find($id);

        return $phone;
    }

    public function deletePhoneNumber(int $id)
    {
        Phone::destroy($id);
    }

    public function getPhoneShares(int $id)
    {
        $phone = Phone::find($id);
        $shares = $phone->sharingPhoneWith()->paginate(5);
        return $shares;
    }
}

<?php

namespace App\Http\Controllers;


use App\Http\Requests\DestroyShareRequest;
use App\Http\Requests\StoreShareRequest;
use App\Managers\SharesManager;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    public function __construct(private SharesManager $sharesManager)
    {
    }

    public function show($id)
    {
        $phone = $this->sharesManager->getPhoneNumber($id);
        $shares = $this->sharesManager->getPhoneShares($id);

        return view('phones.share', [
            'phone' => $phone,
            'shares' => $shares
        ]);
    }

    public function store(StoreShareRequest $request)
    {
        $this->sharesManager->shareWithUser($request);
        $phoneId = $this->sharesManager->getPhoneId($request);

        return redirect()->route('phones.show', $phoneId);
    }

    public function destroy(DestroyShareRequest $request)
    {
        $this->sharesManager->destroyShare($request);
        return redirect()->route('phones.show', $request->phone_id);
    }
}

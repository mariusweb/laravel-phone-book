<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhoneRequest;
use App\Http\Requests\UpdatePhoneRequest;
use App\Managers\PhonesManager;


class PhoneController extends Controller
{
    public function __construct(private PhonesManager $phonesManager)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('phones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePhoneRequest $request)
    {
        $this->phonesManager->storePhoneNumber($request);
        return redirect()->route('phones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phone = $this->phonesManager->getPhoneNumber($id);
        return view('phones.show', compact('phone'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phone = $this->phonesManager->getPhoneNumber($id);
        return view('phones.edit', compact('phone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePhoneRequest $request, $id)
    {
        $this->phonesManager->updatePhoneNumber($request, $id);
        return redirect()->route('phones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->phonesManager->deletePhoneNumber($id);
        return redirect()->route('phones.index');
    }
}

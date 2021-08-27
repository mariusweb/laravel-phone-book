<div class="mt-5 md:mt-0 md:col-span-2">
    <form method="post" action="">
        @csrf
        <div class="shadow overflow-hidden sm:rounded-md">
            {{$users->onEachSide(1)->links('vendor.livewire.livewire-pagination')}}
            <div class="px-4 py-5 bg-white sm:p-6">
                <label for="search" class="block font-medium text-sm text-gray-700">Search for users</label>
                <input type="text" name="search" id="search" wire:model="searchTerm"
                       class="form-input rounded-md shadow-sm mt-1 block w-full"
                       value="{{ old('name', '') }}" placeholder="Name or Email"/>
                @error('search')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror


            </div>
        </div>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead >
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Share
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <form></form>
                        @foreach($users as $user)

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{$user->name}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <form class="inline-block" action="{{ route('phone.share') }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @method('POST')
                                        @csrf
                                        <input type="hidden" name="user_shares_id" value="{{$user->id}}">
                                        <input type="hidden" name="phone_id" value="{{$phone}}">
                                        <input type="submit" class="text-yellow-600 hover:text-indigo-900 mb-2 mr-2" value="Share">
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                        @error('user_shares_id')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @error('phone_id')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>

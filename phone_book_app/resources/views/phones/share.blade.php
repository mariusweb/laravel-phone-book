<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Phone Number') }}
        </h2>
    </x-slot>

    <div >
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8 flex justify-between">
                <a href="{{ route('phones.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Back to Phone Book</a>
                <a href="{{ route('phones.show', $phone['id']) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">View and Share</a>
            </div>
            <div class="flex flex-col">
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
                                        Phone
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Edit
                                    </th>

                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{$phone['name']}}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{$phone['phone']}}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('phones.edit', $phone['id']) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                        <form class="inline-block" action="{{ route('phones.destroy', $phone['id']) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <table class="min-w-full divide-y divide-gray-200">
                                {{ $shares->links() }}
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
                                @error('user_shares_id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                @error('phone_id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($shares as $share)
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{$share->name}}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <form class="inline-block" action="{{ route('phone.share.destroy') }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" value="{{$phone['id']}}" name="phone_id">
                                            <input type="hidden" value="{{$share->id}}" name="user_shares_id">
                                            <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Stop sharing">
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

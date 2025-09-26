@extends('master')

@section('content')
    <div class="flex flex-col">
        <div class="basis-full">
            <h1 class="mb-2 text-2xl font-bold">Car Owners</h1>
        </div>
        <div class="basis-full">
        <form id="newowner" method="get" action="{{ route('owner.create') }}">
            @csrf
            <div class="space-y-12">
                <div class="border-b border-t border-gray-900/10 pt-6 pb-8 mb-12">
                    <h2 class="text-base/7 font-semibold text-gray-900">Enter new owner details</h2>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Forename</label>
                            <div class="mt-2">
                                <input id="first-name" type="text" name="forename" autocomplete="Forename" 
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="last-name" class="block text-sm/6 font-medium text-gray-900">Surname</label>
                            <div class="mt-2">
                                <input id="last-name" type="text" name="surname" autocomplete="Surname" 
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                            <div class="mt-2">
                                <input id="email" type="email" name="email" autocomplete="email" 
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="phone" class="block text-sm/6 font-medium text-gray-900">Phone</label>
                            <div class="mt-2">
                                <input id="phone" type="text" name="phone" autocomplete="Phone" 
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                            </div>
                        </div>

                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <!-- <button type="button" class="text-sm/6 font-semibold text-gray-900" @click="isVisible = !isVisible">Cancel</button> -->
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>

                </div>

            </div>
            </form>
        </div>
        <div class="basis-full">
            <table class="mx-auto table-auto border-collapse border border-slate-500 shadow-lg">
                <thead>
                    <tr>
                        <th class="bg-blue-100 border text-left px-8 py-4">Forename</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Surname</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Email</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Phone</th>
                        <th class="bg-blue-100 border text-left px-8 py-4"></th>
                        <th class="bg-blue-100 border text-left px-8 py-4"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($owners as $owner)
                        <tr>
                            <td class="border px-8 py-4">{{ $owner->forename }}</td>
                            <td class="border px-8 py-4">{{ $owner->surname }}</td>
                            <td class="border px-8 py-4">{{ $owner->email }}</td>
                            <td class="border px-8 py-4">{{ $owner->phone }}</td>
                            <td class="border px-8 py-4">
                                <a class="text-blue-600 hover:underline" href="{{ route('owner.show', $owner->id) }}">Show</a></td>
                            <td class="border px-8 py-4">
                                <a  class="text-blue-600 hover:underline" href="#" 
                                    onclick="event.preventDefault();
                                     document.getElementById('destroy-form{{ $owner->id }}').submit();">{{ __('DELETE') }}</a>
                                <form id="destroy-form{{ $owner->id }}" action="{{ route('owner.destroy', $owner->id) }}" method="POST" style="display: none;">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="flex flex-row">
        <div class="mt-5">
            <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>

    </div>

@endsection

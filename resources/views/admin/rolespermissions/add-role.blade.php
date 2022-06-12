<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role') }}
        </h2>
    </x-slot>
    <div class="py-5">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.role.show') }}"
                class="mb-3 inline-flex items-center px-4 py-2 bg-blue-200 hover:bg-blue-300 text-gray-800 text-sm font-medium rounded-md">
                Back
            </a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.role.store') }}">
                        @csrf
                        @if (isset($data->id))
                            <input type="hidden" name="id" value="{{ $data->id }}">
                        @endif
                        <div>
                            <x-label for="title" :value="__('Name')" />
                            <x-input id="title" class="block mt-1 w-full" type="text" name="name" :value="isset($data->name) ? $data->name : old('name')"
                                required autofocus />
                        </div>
                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="qty" :value="__('Slug')" />
                            <x-input id="qty" class="block mt-1 w-full" type="text" name="slug" required
                                :value="isset($data->slug) ? $data->slug : old('slug')" />
                        </div>

                        <div class="mt-4">
                            <div class="flex justify-between">
                                @foreach ($permissions as $permit)
                                    <div class="form-check">
                                        <input
                                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                            type="checkbox" name="permissions[]" value="{{ $permit->id }}" @if (isset($data->permissions) && in_array($permit->id, $data->permissions->pluck('id')->toArray())) checked @endif id="flexCheckDefault{{ $permit->id }}">
                                        <label class="form-check-label inline-block text-gray-800"
                                            for="flexCheckDefault{{ $permit->id }}">
                                            {{ $permit->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex items-center justify-start mt-4">
                            <x-button class="ml-3">
                                {{ __('Submit') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>

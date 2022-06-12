<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permission') }}
        </h2>
    </x-slot>
    <div class="py-5">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('admin.permission.show')}}" class="mb-3 inline-flex items-center px-4 py-2 bg-blue-200 hover:bg-blue-300 text-gray-800 text-sm font-medium rounded-md">
                Back
            </a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.permission.store') }}">
                        @csrf
                        @if (isset($data->id))
                            <input type="hidden" name="id" value="{{$data->id}}">
                        @endif
                        <div>
                            <x-label for="title" :value="__('Name')" />
                            <x-input id="title" class="block mt-1 w-full" type="text" name="name" :value="(isset($data->name)) ? $data->name : old('name')" required autofocus />
                        </div>
                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="qty" :value="__('Slug')" />
                            <x-input id="qty" class="block mt-1 w-full" type="text" name="slug" required :value="(isset($data->slug)) ? $data->slug : old('slug')"/>
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

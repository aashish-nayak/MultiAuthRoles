<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @role('admin')
                <div class="p-6 bg-white border-b border-gray-200">
                    You're Admin logged in!
                </div>
                @endrole
                @role('editor')
                <div class="p-6 bg-white border-b border-gray-200">
                    You're Editor logged in!
                </div>
                @endrole
                @role('author')
                <div class="p-6 bg-white border-b border-gray-200">
                    You're Author logged in!
                </div>
                @endrole
            </div>
        </div>
    </div>
</x-admin-app-layout>

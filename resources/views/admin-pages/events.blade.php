@extends('layouts.admin')

@section('content')
    <div class="mt-5 space-y-2">
        <div class="md:flex md:items-center md:justify-between ">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Events</h2>
            </div>
        </div>
        <div class="pt-2 space-y-2 border-t">
            <div>
                <livewire:admin.all-events />
            </div>

        </div>
    </div>
@endsection

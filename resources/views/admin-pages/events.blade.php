@extends('layouts.admin')

@section('content')
    <x-admin.page title="Events">
        <x-slot name="main">
            <livewire:admin.all-events />
        </x-slot>
    </x-admin.page>
@endsection

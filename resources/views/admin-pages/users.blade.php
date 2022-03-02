@extends('layouts.admin')

@section('content')
    <x-admin.page title="Manage Users">
        <x-slot name="main">
            <livewire:admin.manage-users />
        </x-slot>
    </x-admin.page>
@endsection

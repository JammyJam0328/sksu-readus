@extends('layouts.admin')

@section('content')
    <x-admin.page title="Manage School">
        <x-slot name="main">
            <livewire:admin.manage-school />
        </x-slot>
    </x-admin.page>
@endsection

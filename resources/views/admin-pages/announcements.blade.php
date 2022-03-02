@extends('layouts.admin')

@section('content')
    <x-admin.page title="Announcements">
        <x-slot name="main">
            <livewire:admin.manage-announcement />
        </x-slot>
    </x-admin.page>
@endsection

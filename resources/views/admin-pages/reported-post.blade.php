@extends('layouts.admin')
@section('content')
    <x-admin.page title="Reported Post">
        <x-slot name="main">
            <livewire:admin.reported-content />
        </x-slot>
    </x-admin.page>
@endsection

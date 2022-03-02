@extends('layouts.admin')

@section('content')
    <x-admin.page title="Posts">
        <x-slot name="main">
            <livewire:admin.manage-posts />
            <x-shared.image-viewer />
        </x-slot>
    </x-admin.page>
@endsection

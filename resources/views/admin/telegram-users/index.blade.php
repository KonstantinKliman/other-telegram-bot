@extends('layouts.main')

@section('title', 'Linebet Promocode Bot Telegram users')

@section('main')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center my-3">
            <div class="col-auto">
                <h1>Telegram users</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Submitted data from user</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $index => $user)
                        <tr>
                            <th class="align-middle" scope="row">{{ ++$index }}</th>
                            @if($user->username)
                                <td class="align-middle"><a class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover" href="https://t.me/{{ $user->username }}">{{ $user->username ?? "Empty" }}</a></td>
                            @else
                                <td class="align-middle"><p class="text-light text-opacity-50 m-0">Empty</p></td>
                            @endif
                            <td class="align-middle">{{ $user->first_name }}</td>
                            @if($user->last_name)
                                <td class="align-middle">{{ $user->last_name ?? "Empty" }}</td>
                            @else
                                <td class="align-middle"><p class="text-light text-opacity-50 m-0">Empty</p></td>
                            @endif
                            <td class="align-middle">@if($user->userData) <x-data-modal :telegram-user="$user" /> @else <p class="text-light text-opacity-50 m-0">Empty</p> @endif</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

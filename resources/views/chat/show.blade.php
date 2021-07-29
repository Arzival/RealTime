@extends('layouts.app')
@push('styles')
    <style>

    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Chat') }} </div>

                    <div class="card-body">
                        <div class="row p-2">
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-12 border rounded-lg">
                                        <ul id="messages"
                                            class="list-unstyled overflow-auto"
                                            style="height: 45vh">
                                            <li>test1:hola</li>
                                            <li>test2:hola</li>
                                        </ul>
                                    </div>
                                </div>
                                <form action="">
                                    <div class="row py-3">
                                        <div class="col-10">
                                            <input type="text" name="" id="messages"
                                                class="form-control">
                                        </div>
                                        <div class="col-2">
                                            <button id="send" type="button"
                                                class="btn btn-primary btn-block">send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-2">
                                <p><strong>Online now</strong></p>
                                <ul id="users"
                                    class="list-unstyled overflow-auto text-info"
                                    style="height: 45vh">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        const usersElement = document.getElementById('users');
        window.Echo.join('chat')
            .here((users) => {
                users.forEach((user, index) => {
                    let element = document.createElement('li');
                    element.setAttribute('id', user.id);
                    element.innerText = user.name;
                    usersElement.appendChild(element);
                });
            })
            .joining((user) => {
                let element = document.createElement('li');
                element.setAttribute('id', user.id);
                element.innerText = user.name;
                usersElement.appendChild(element);
            })
            .leaving((user) => {
                let element = document.getElementById(user.id);
                element.parentNode.removeChild(element);
            })
    </script>
@endpush

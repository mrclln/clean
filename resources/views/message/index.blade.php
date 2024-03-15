@extends('layouts.master')
@section('breadcrumbs')
    <ul class="navbar-nav mr-lg-2">
        <li class="nav-item ml-0">
            <h4 class="mb-0">MESSAGES</h4>
        </li>
        <li class="nav-item">
            <div class="d-flex align-items-baseline">
                <p class="mb-0">KCCF SMS</p>
                <i class="typcn typcn-chevron-right"></i>
                <p class="mb-0">Messages</p>
            </div>
        </li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="col-8 offset-2">
                            <div class="chat-container">
                                <div class="chat-message received">
                                    @include('message.receive', [
                                        'message' => 'Hey! Chat With Me',
                                        'user' => 'KCCFSMS',
                                    ])
                                </div>
                            </div>

                            <div class="new-message">
                                <input type="text" id="new-message-input" placeholder="Type your message...">
                                <input type="submit" class="btn btn-md btn-success" value="Send">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('css')
    <style>
        .chat-container {
            width: 100%;
        }

        .chat-message {
            background-color: #00ac2b;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            text-align: right;
        }

        .chat-message.received {
            background-color: #f0efef;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            text-align: left;
        }

        .sender {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .message {
            font-size: 14px;
        }

        .new-message {
            width: 90%;
            margin-top: 20px;

            float: right;

        }

        #new-message-input {
            width: 70%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-right: 10px;
        }
    </style>
@endsection
@section('script')
    <script src="{{ asset('assets/custom/pusher/pusher.js') }}"></script>
    <script>
     $(document).ready(function() {
    const pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
        cluster: 'ap1'
    });
    const channel = pusher.subscribe('public');

    // Receive messages
    channel.bind('mrclln', function(data) {
        $.post("/receive", {
            _token: '{{ csrf_token() }}',
            message: data.message,
            user:data.user
        }).done(function(res) {
            $(".chat-container").append(res); // Append inside chat-container
            $(document).scrollTop($(document).height());
        });
    });

    $("form").submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: "/broadcast",
            method: 'POST',
            headers: {
                'X-Socket-Id': pusher.connection.socket_id
            },
            data: {
                _token: '{{ csrf_token() }}',
                message: $("form #new-message-input").val(),
            }
        }).done(function(res) {
            $(".chat-container").append(res); // Append inside chat-container
            $("form #new-message-input").val('');
            $(document).scrollTop($(document).height());
        });
    });
});

function test(){
    Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            });
        }
    </script>
@endsection

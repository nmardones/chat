@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 ">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 style="font-weight: bold">Chats</h3></div>

                    <div class="panel panel-body " style="background-color: #ffffff;padding-left: 15px;padding-top: 10px;">
                        <chat-messages :messages="messages"></chat-messages>
                    </div>
                    <div class="card-footer shadow">
                        <chat-form
                            v-on:messagesent="addMessage"
                            :user="{{ Auth::user() }}"
                        ></chat-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')


@endpush

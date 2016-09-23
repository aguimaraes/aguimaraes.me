@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Contact Form</h1>

                <form action="{{ route('contact.store') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required maxlength="255"/>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email" class="form-control" required maxlength="255"/>
                    </div>

                    <div class="form-group">
                        <label for="body">Message:</label>
                        <textarea id="body" name="body" class="form-control" rows="4" required></textarea>
                    </div>

                    <button class="btn btn-primary" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection
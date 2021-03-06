@extends('layouts.app')

@section('content')
<h1>Contactez nous</h1>
<form action="{{ route('contact.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Pseudo :</label>
        <input type="text" class="form-control @error("name") is-invalid @enderror" name="name" placeholder="entrez votre pseudo">
        @error('name')
            <div class="invalid-feedback">
                {{ $errors->first("name") }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email : </label>
        @guest
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="entrer votre email">
        @endguest
        @auth
            <input type="text" value="{{Auth::user()->email}}" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="entrer votre email">
        @endauth
        @error('email')
            <div class="invalid-feedback">
                {{ $errors->first("email") }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="message">Message :</label>
        <textarea type="text" value="" cols="30" rows="10" class="form-control @error('email') is-invalid @enderror" placeholder="entrer votre message" name="message" ></textarea>
        @error('message')
            <div class="invalid-feedback">
                {{ $errors->first("message") }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Envoyer le message</button>
</form>
@endsection
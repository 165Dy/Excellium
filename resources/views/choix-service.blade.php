@extends('layouts.master')
@section('content')
<div class="container py-5 text-center">
    <h2>Merci pour votre inscription !</h2>
    <p>Quel service souhaitez-vous découvrir ?</p>
    <form action="#" method="POST">
        @csrf
        <div class="mb-3">
            <select name="service" class="form-select">
                <option value="">Sélectionner un service</option>
                <option value="compta">Assistance comptable et fiscale</option>
                <option value="audit">Audit et conseil</option>
                <option value="recrutement">Recrutement et placement</option>
                <option value="paie">Gestion de la paie</option>
                <option value="financement">Recherche de financement</option>
            </select>
        </div>
        <button class="btn btn-primary">Envoyer ma demande</button>
    </form>
</div>
@endsection

@extends('layouts.master')
@section('content')
<div class="container py-5 text-center">
    <h2>@lang('extracted.merci_pour_votre_inscription')</h2>
    <p>@lang('extracted.quel_service_souhaitez_vous_decouvrir')</p>
    <form action="#" method="POST">
        @csrf
        <div class="mb-3">
            <select name="service" class="form-select">
                <option value="">@lang('extracted.selectionner_un_service')</option>
                <option value="compta">@lang('extracted.assistance_comptable_et_fiscale')</option>
                <option value="audit">@lang('extracted.audit_et_conseil')</option>
                <option value="recrutement">@lang('extracted.recrutement_et_placement')</option>
                <option value="paie">@lang('extracted.gestion_de_la_paie')</option>
                <option value="financement">@lang('extracted.recherche_de_financement')</option>
            </select>
        </div>
        <button class="btn btn-primary">@lang('extracted.envoyer_ma_demande')</button>
    </form>
</div>
@endsection

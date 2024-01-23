@extends('front.layouts.front')

@section('content')
<div class="container">
    @if(Auth::user()->type == 'SuperUser' ||  (Auth::user()->type == 'Administrador')           
        <div class="mws-panel-body">

            <div class="mws-panel-content">
                <button type="button" id="mws-form-dialog-mdl-btn9" value="Show Modal Form" class="btn btn-primary" style="margin-left: 10px;margin-bottom: 10px;float:left"><i class="icon-home"></i> Añadir Reserva</button>
            </div>
            @include('front.modals.reservationForm')

            <div class="mws-panel-content">
                <button type="button" id="mws-form-dialog-mdl-btn9b" value="Show Modal Form" class="btn btn-basic" style="margin-left: 10px;margin-bottom: 10px;"><i class="icon-lock"></i> Añadir Bloqueo</button>
            </div>
            @include('front.modals.blockForm')

        </div>



        



    @endif


@endsection
@push('javascripts')


@endpush
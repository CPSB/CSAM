@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9"> {{-- Content --}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="fa fa-user" aria-hidden="true"></span> {{ $user->name }}
                    </div>

                    <div class="panel-body">
                    </div>
                </div>
            </div> {{-- /Content --}}

            <div class="col-md-3">
                <div class="panel panel-default"> {{-- Sidebar (opties) --}}
                    <div class="panel-heading">Opties:</div>

                    <div class="list-group"> {{-- Oplijsting opties --}}
                        <a href="mailto:{{ $user->email }}" class="list-group-item">
                            <span class="fa fa-envelope" aria-hidden="true"></span> Contacteer gebruiker
                        </a>

                        <a href="" class="list-group-item list-group-item-danger">
                            <span class="fa fa-trash" aria-hidden="true"> Verwijder gebruiker
                        </a>
                    </div>

                </div>  {{-- /Oplijsting opties --}}
            </div> {{-- /Sidebar (opties) --}}
        </div>
    </div>
@endsection
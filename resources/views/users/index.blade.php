@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash::message') {{-- Instantie voor de flash session berichten. --}}

        <div class="row">
            <div class="col-md-9"> {{-- Content --}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="fa fa-users" aria-hidden="true"></span> Gebruikersbeheer

                        <button class="pull-right btn btn-xs btn-primary">
                            <span class="fa fa-plus" aria-hidden="true"></span> Gebruiker toevoegen
                        </button>
                    </div>

                    <div class="panel-body">
                        @if (count($users) > 0) {{-- Gebruikers gevonden  --}}
                            <table class="table table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Status:</th>
                                        <th>Naam:</th>
                                        <th>Email:</th>
                                        <th colspan="2">Registratie datum:</th> {{-- Nodig voor de functies. --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user) {{--  Loop door de gebruikers--}}
                                        <tr>
                                            <td><strong>#U{{ $user->id }}</strong></td>
                                            <td>{{-- TODO: #2 Implementatie systeem om users te blokkeren en te activeren. --}}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at }}</td>

                                            <td class="pull-right"> {{-- Gebruikers opties --}}
                                                <a href="{{ route('users.show', $user) }}" class="label label-info">
                                                    Bekijk
                                                </a>
                                            </td> {{-- /Gebruikers opties --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else {{-- Geen gebruikers gevonden --}}
                            <div class="alert alert-info alert-important" role="alert">
                                <strong>Info:</strong> Er zijn gebruikers gevonden.
                            </div>
                        @endif
                    </div>
                </div> {{-- /Content --}}
            </div>

            <div class="col-md-3"> {{-- Sidebar --}}
                <div class="well well-sm"> {{-- Search form --}}

                </div> {{-- /Search form --}}
            </div> {{-- /Sidebar --}}
        </div>
    </div>
@endsection
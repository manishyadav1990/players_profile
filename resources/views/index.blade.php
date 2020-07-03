@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard
                <span style="float:right;"><a href="/players/create">Create Player Profile</a></span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                    <thead>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>mobile</td>
                        <td>Profile</td>
                        <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($players as $player)
                        <tr>
                            <td>{{$player->id}}</td>
                            <td>{{$player->name}}</td>
                            <td>{{$player->email}}</td>
                            <td>{{$player->mobile}}</td>
                            <td>{{$player->profile}}</td>
                            <td class="text-center">
                                <a href="{{ route('players.edit', $player->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('players.destroy', $player->id)}}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

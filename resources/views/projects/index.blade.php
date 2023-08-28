@extends('layouts.mbt')
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Projekty</h6>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nazwa</th>
                            <th>Data rozpoczęcia</th>
                            <th>Data zakończenia</th>
                            <th>Grafika</th>
                            <th>Edycja</th>
                            <th>Usuwanie</th>
                            <th>Wysyłka</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->begin_date }}</td>
                                <td>{{ $project->end_date }}</td>
                                <td>
                                    <div class="my-3">
                                        <img src="{{ asset($project->attachment) }}" alt="attachment" style="width:100px">
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}">Edycja</a>
                                </td>
                                <td>
                                    <form action="{{ route('projects.destroy',$project->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Usuń</button> 
                                    </form>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info">Wyślij</button>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
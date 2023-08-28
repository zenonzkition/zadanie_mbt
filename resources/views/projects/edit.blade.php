@extends('layouts.mbt')
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edycja projektu</h6>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        @if(session('status'))
                        <div class="alert alert-success mb-1 mt-1">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nazwa:</strong>
                                        <input type="text" name="name" value="{{ $project->name }}" 
                                            class="form-control @error('name') is-invalid @enderror" placeholder="Nazwa">
                                        @error('name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Data rozpoczęcia:</strong>
                                        <input type="date" name="begin_date" value="{{ $project->begin_date }}" 
                                            class="form-control @error('begin_date') is-invalid @enderror" placeholder="Data rozpoczęcia">
                                        @error('email')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Data zakończenia:</strong>
                                        <input type="date" name="end_date" value="{{ $project->end_date }}" 
                                            class="form-control @error('end_date') is-invalid @enderror" placeholder="Data zakończenia">
                                        @error('end_date')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Opis:</strong>
                                        <textarea name="description" rows="3"
                                            class="form-control @error('description') is-invalid @enderror" placeholder="Opis">
                                            {{ $project->description }}
                                        </textarea>
                                        @error('description')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group p-2">
                                        <strong>Załącznik:</strong>
                                        <input type="file" name="file" 
                                            class="form-control @error('file') is-invalid @enderror" placeholder="Załącznik">
                                        @error('file')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary ml-3">Zapisz</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
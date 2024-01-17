@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Edit {{ $technology->name }}</h1>
        <main>

            <div id="create-posts">

                <div class="container">
                    <div class="py-5">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="card p-2">
                            <form action="{{ route('admin.technologies.update', $technology->slug) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ $technology->name }}" required
                                        maxlength="255" minlength="3">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-primary">Reset</button>

                            </form>
                        </div>
                    </div>
                </div>
        </main>
    </section>
@endsection

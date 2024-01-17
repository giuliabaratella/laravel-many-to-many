@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="card">
            <div class="card-header">
                <h1>All {{ $technology->name }} projects</h1>
            </div>
            <div class="card-body">

                <div class="row">
                    @forelse ($technology->projects as $project)
                        <div class="col-12 col-md-6 col-xl-4 mb-3">
                            <div class="card h-100">
                                @if ($project->image)
                                    <div>
                                        <img class="card-img-top" src="{{ asset('storage/' . $project->image) }}"
                                            alt="{{ $project->title }}">
                                    </div>
                                @endif
                                <div class="card-body">
                                    <div class="d-flex align-items-start">
                                        <h1 class="me-2">{{ $project->title }}</h1>
                                        <span class="badge text-bg-warning">
                                            {{ $project->category ? $project->category->name : 'Uncategorized' }}
                                        </span>
                                    </div>
                                    <h3><a href="{{ $project->link }}">{{ $project->link }}</a></h3>
                                    <p>{{ $project->description }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <li>No projects</li>
                    @endforelse
                </div>


            </div>

        </div>


    </section>
@endsection

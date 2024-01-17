@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="card">
            @if ($project->image)
                <div>
                    <img class="card-img-top" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                </div>
            @endif
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <h1 class="me-2">{{ $project->title }}</h1>
                    <span class="badge {{ $project->category ? 'text-bg-warning' : 'text-bg-danger' }}">
                        {{ $project->category ? $project->category->name : 'Uncategorized' }}
                    </span>

                </div>

                <h3><a href="{{ $project->link }}">{{ $project->link }}</a></h3>
                <p>{{ $project->description }}</p>

                <div class="d-flex">
                    <div class="me-3">Technologies:</div>
                    @if ($project->technologies)
                        @forelse ($project->technologies as $technology)
                            <a href="{{ route('admin.technologies.show', $technology->slug) }}" class="text-white">
                                <span class="badge text-bg-success me-2">
                                    {{ $technology->name }}
                                </span>
                            </a>

                        @empty
                            <div>none</div>
                        @endforelse
                    @endif

                </div>

            </div>

        </div>


    </section>
@endsection

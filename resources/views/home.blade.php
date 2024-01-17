@extends('layouts.app')
@section('content')
    @guest

        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="card p-3">
                <div class="card-body d-flex flex-column align-items-center">
                    <h1 class="mb-3">Please login to access your portfolio dashboard</h1>
                    <div>
                        <button class="btn btn-success">
                            <a class="text-white" href="{{ route('login') }}">Go to Login page</a>
                        </button>
                    </div>

                </div>

            </div>

        </div>
    @else
        <div class="mb-3">
            <h1>Portfolio Dashboard</h1>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="row">
            <section id="all-projects" class="col-12 mb-4">
                {{-- all projects card  --}}
                <div class="card h-100">
                    <div class="card-header">
                        <div class="py-1">
                            <h2 class="mb-0">All projects</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table p-3">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th class="d-none d-xl-table-cell">Link</th>
                                    <th class="d-none d-lg-table-cell">Category</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projects as $project)
                                    <tr>
                                        <th>
                                            <a href="{{ route('admin.projects.show', $project->slug) }}">
                                                {{ $project->title }}
                                            </a>
                                        </th>
                                        <td class="d-none d-xl-table-cell">
                                            <a href="{{ $project->link }}">
                                                {{ $project->link }}
                                            </a>
                                        </td>
                                        <td class="d-none d-lg-table-cell">
                                            <span class="badge {{ $project->category ? 'text-bg-warning' : 'text-bg-danger' }}">
                                                {{ $project->category ? $project->category->name : 'Uncategorized' }}
                                            </span>
                                        </td>
                                        <td><a href="{{ route('admin.projects.edit', $project->slug) }}">
                                                <button class="btn btn-success rounded-3 border-0">
                                                    <i class="fa-solid fa-pen" style="font-size: 0.7rem"></i>
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger rounded-3 border-0 cancel-button"
                                                    data-item-title="{{ $project->title }}">
                                                    <i class="fa-solid fa-trash" style="font-size: 0.7rem"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div>No projects</div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <section id="all-categories" class="col-12 col-lg-6 mb-4">

                {{-- all categories card  --}}
                <div class="card h-100">
                    <div class="card-header">
                        <div class="py-1">
                            <h2 class="mb-0">All categories</h2>

                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table p-3">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <th>
                                            <a href="{{ route('admin.categories.show', $category->slug) }}">
                                                {{ $category->name }}
                                            </a>
                                        </th>
                                        <td><a href="{{ route('admin.categories.edit', $category->slug) }}">
                                                <button class="btn btn-success rounded-3 border-0">
                                                    <i class="fa-solid fa-pen" style="font-size: 0.7rem"></i>
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.categories.destroy', $category->slug) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger rounded-3 border-0 cancel-button"
                                                    data-item-title="{{ $category->name }}">
                                                    <i class="fa-solid fa-trash" style="font-size: 0.7rem"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div>No categories</div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <section id="all-technologies" class="col-12 col-lg-6 mb-4">

                {{-- all technologies card  --}}
                <div class="card h-100">
                    <div class="card-header">
                        <div class="py-1">
                            <h2 class="mb-0">All technologies</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table p-3">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($technologies as $technology)
                                    <tr>
                                        <th>
                                            <a href="{{ route('admin.technologies.show', $technology->slug) }}">
                                                {{ $technology->name }}
                                            </a>
                                        </th>
                                        <td><a href="{{ route('admin.technologies.edit', $technology->slug) }}">
                                                <button class="btn btn-success rounded-3 border-0">
                                                    <i class="fa-solid fa-pen" style="font-size: 0.7rem"></i>
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.technologies.destroy', $technology->slug) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger rounded-3 border-0 cancel-button"
                                                    data-item-title="{{ $technology->name }}">
                                                    <i class="fa-solid fa-trash" style="font-size: 0.7rem"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div>No technologies</div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>



    @endguest


    @include ('partials.modal_delete')
@endsection

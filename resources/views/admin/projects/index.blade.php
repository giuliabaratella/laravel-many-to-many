@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1 class="">Projects Dashboard</h1>

        <button class="btn btn-success">
            <a href="{{ route('admin.projects.create') }}" class="text-white"> Add
                project</a>
        </button>
    </div>

    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="row">
            <section id="all-projects" class="col-12 col-lg-8 mb-4">

                {{-- all projects card  --}}
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center py-1">
                            <h2 class="mb-0">All projects</h2>

                            <div class="d-flex justify-content-end">

                                <form action="{{ route('admin.projects.index') }}" method="GET">
                                    @csrf
                                    <div class="input-group">
                                        <input type="search" name="search" id="search" placeholder="Search by title"
                                            aria-label="Search" class="form-control">
                                        <button type="submit"
                                            class="btn btn-primary text-uppercase fw-bold ">Search</button>
                                    </div>
                                </form>
                            </div>

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

                                            <span
                                                class="badge {{ $project->category ? 'text-bg-warning' : 'text-bg-danger' }}">
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
                                            <form action="{{ route('admin.projects.destroy', $project->slug) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger rounded-3 border-0">
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

            <section class="col-12 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h2>Section 2</h2>
                    </div>
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos accusantium consequuntur corrupti,
                            fuga voluptatibus esse animi dignissimos, provident doloremque dolore adipisci nihil, molestiae
                            minus aut est fugit. Cupiditate nulla fugiat earum minus incidunt dolor vel quas adipisci,
                            voluptatibus repellat tempore eius mollitia odio doloremque aperiam odit illo! Pariatur voluptas
                            provident molestiae voluptates atque quo maiores sapiente reiciendis nobis doloribus repellendus
                            modi, eaque sit libero aspernatur dignissimos ipsam! Quo, aut velit modi hic perferendis
                            distinctio quos, suscipit maiores eos consequuntur facere delectus eveniet exercitationem
                            assumenda quasi est impedit obcaecati veniam dicta dolorem unde? Quae unde incidunt rem sequi,
                            beatae eum est.</p>
                    </div>
                </div>
            </section>

            <section class="col-12 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h2>Section 3</h2>
                    </div>
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos accusantium consequuntur corrupti,
                            fuga voluptatibus esse animi dignissimos, provident doloremque dolore adipisci nihil, molestiae
                            minus aut est fugit. Cupiditate nulla fugiat earum minus incidunt dolor vel quas adipisci,
                            voluptatibus repellat tempore eius mollitia odio doloremque aperiam odit illo! Pariatur voluptas
                            provident molestiae voluptates atque quo maiores sapiente reiciendis nobis doloribus repellendus
                            modi, eaque sit libero aspernatur dignissimos ipsam! Quo, aut velit modi hic perferendis
                            distinctio quos, suscipit maiores eos consequuntur facere delectus eveniet exercitationem
                            assumenda quasi est impedit obcaecati veniam dicta dolorem unde? Quae unde incidunt rem sequi,
                            beatae eum est.</p>
                    </div>
                </div>
            </section>

        </div>

    </div>
    </div>
@endsection

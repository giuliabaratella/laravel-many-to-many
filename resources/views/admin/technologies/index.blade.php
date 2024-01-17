@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1 class="">Technologies Dashboard</h1>

        <button class="btn btn-success">
            <a href="{{ route('admin.technologies.create') }}" class="text-white"> Add
                Technology</a>
        </button>
    </div>

    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="row">
            <section id="all-technologies" class="col-12 col-lg-8 mb-4">

                {{-- all technologies card  --}}
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center py-1">
                            <h2 class="mb-0">All technologies</h2>

                            <div class="d-flex justify-content-end">

                                <form action="{{ route('admin.technologies.index') }}" method="GET">
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
                                                <button type="submit" class="btn btn-danger rounded-3 border-0">
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

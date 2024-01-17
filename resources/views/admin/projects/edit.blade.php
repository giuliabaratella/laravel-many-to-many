@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Edit {{ $project->title }}</h1>
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
                            <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ $project->title }}" required maxlength="255"
                                        minlength="3">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="description" class="form-label" cols="30"
                                        rows="10">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        value="">
                                                {{ $project->description }}
                                            </textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex mb-3">
                                    @if ($project->image)
                                        <div class="media me-4">
                                            <img width="150" src="{{ asset('storage/' . $project->image) }}"
                                                alt="{{ $project->title }}">
                                        </div>
                                    @else
                                        <div class="me-4">
                                            <img id="uploadPreview" width="150" src="http://via.placeholder.com/300x200">
                                        </div>
                                    @endif
                                    <div>
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" id="image" name="image" value="{{ $project->image }}"
                                            class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="link" class="form-label">Project Link Url</label>

                                    <input type="text" id="link" name="link" value="{{ $project->link }}"
                                        class="form-control @error('link') is-invalid @enderror">
                                    @error('link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category</label>

                                    <select id="category_id" name="category_id"
                                        class="form-select @error('category_id') is-invalid @enderror">
                                        <option value="">Select a category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id', $project->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach

                                    </select>

                                    @error('category_id')
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

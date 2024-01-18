@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Add a project</h1>
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
                            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title') }}" required maxlength="255"
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
                                        {{ old('description') }}
                                    </textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex mb-3 column-gap-3 ">

                                    <div>
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" id="image" name="image" value="{{ old('image') }}"
                                            class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <img id="uploadPreview" width="150" src="http://via.placeholder.com/300x200">
                                    </div>

                                </div>

                                <div class="mb-3">
                                    <label for="link" class="form-label">Project Link Url</label>

                                    <input type="text" id="link" name="link" value="{{ old('link') }}"
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
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="form-group">
                                        <h6>Select Technologies</h6>
                                        @foreach ($technologies as $technology)
                                            <div class="form-check @error('technologies') is-invalid @enderror">
                                                <input type="checkbox" class="form-check-imput" name="technologies[]"
                                                    value="{{ $technology->id }}"
                                                    {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                                                <label for="form-check-label">{{ $technology->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('technologies')
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

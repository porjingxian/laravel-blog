@extends('components\layout')
@section('content')
    <section class="px-6 py-8">
        <form action="/admin/posts" method="post">
            @csrf
            <div class="mb-6 border border-gray-200 p-6 rounded-xl max-w-sm mx-auto">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                for="title">Title</label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title" value="{{old('title')}}" required>
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                <div class="mt-6">
                    <label for="category" class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>
                    <select name="category_id" id="category">
                        @php
                            $categories = \App\Models\Category::all();
                        @endphp

                        @foreach ($categories as $category)
                        <option 
                            value="{{$category->id}}" 
                            {{ old('category_id')==$category->id ? 'selected' : '' }}
                            >{{ucwords($category->name)}}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <center><span class="text-xs text-red-500">{{$message}}</span></center>
                    @enderror
                </div>
                
                <div class="mt-6">
                    <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">Slug</label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="slug" id="slug" value="{{old('slug')}}" required>
                    @error('slug')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">Excerpt</label>
                    <textarea name="excerpt" id="excerpt" class="border border-gray-400 p-2 w-full" required>{{old('excerpt')}}</textarea>
                    @error('excerpt')
                        <center><span class="text-xs text-red-500">{{$message}}</span></center>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">Body</label>
                    <textarea name="body" id="body" class="border border-gray-400 p-2 w-full" required>{{old('body')}}</textarea>
                    @error('body')
                        <center><span class="text-xs text-red-500">{{$message}}</span></center>
                    @enderror
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                        Publish
                    </button>
                </div>
            </div>
        </form>
    </section>
@endsection
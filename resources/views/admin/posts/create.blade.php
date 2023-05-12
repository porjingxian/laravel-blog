@extends('components\layout')
@section('content')

    <x-setting heading="Publish New Post">
    <form action="/admin/posts" method="post" enctype="multipart/form-data">
            @csrf
            <div class="border border-gray-200 p-6 rounded-xl">
                <x-form.input name="title"/>

                <div class="mb-6">
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
                
                <x-form.input name="slug"/>

                <x-form.input name="thumbnail" type="file"/>

                <div class="mb-6">
                    <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">Excerpt</label>
                    <textarea name="excerpt" id="excerpt" class="border border-gray-400 p-2 w-full" required>{{old('excerpt')}}</textarea>
                    @error('excerpt')
                        <center><span class="text-xs text-red-500">{{$message}}</span></center>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">Body</label>
                    <textarea name="body" id="body" class="border border-gray-400 p-2 w-full" required>{{old('body')}}</textarea>
                    @error('body')
                        <center><span class="text-xs text-red-500">{{$message}}</span></center>
                    @enderror
                </div>

                <div class="pb-6">
                    <button type="submit" class="w-full bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                        Publish
                    </button>
                </div>
            </div>
        </form>
    </x-setting>
@endsection
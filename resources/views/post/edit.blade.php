@extends('layouts.main')

@section('content')
    <div>
        <form action="{{ route('post.update',$post->id) }}" method="post">
            @csrf
            @method('patch')


            <div class="mb-3">
                <label for="title">Title</label>
                <input
                    name="title"
                    type="text"
                    class="form-control"
                    id="title"
                    placeholder="title"
                    value="{{$post->title}}"
                >

            </div>

            <div class="mb-3">
                <label for="content">Content</label>
                <textarea
                    name="content"
                    class="form-control"
                    id="content"
                    placeholder="Content"
                >{{$post->content}}</textarea>
            </div>

            <div class="mb-3">
                <label for="image">Image</label>
                <input
                    name="image"
                    type="text"
                    class="form-control"
                    id="image"
                    placeholder="image"
                    value="{{$post->image}}"
                >
            </div>
            <div><select class="form-select" id="category" name="category_id">
                    <option selected>Category</option>
                    @foreach ($categories as $category)
                        <option
                            {{$category->id === $post->category_id ? 'selected':''}}

                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="Tags">Tags</label>
                <select multiple class="form-control" id="tags" name="tags[]">
                    @foreach ($tags as $tag)
                        <option
                            @foreach ($post->tags as $postTag)
                                {{$tag->id === $postTag->id ? 'selected':''}}
                            @endforeach
                                value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">
                Update
            </button>
        </form>
    </div>
@endsection


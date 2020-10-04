<div class="form-group">
    <label for="title"> Title</label>
    <input type="text" name="title" value="{{ old('title' ) ?? $post->title }}" class="form-control">
    @error('title')
        <div class="mt-2 text-danger">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="category"> Category</label>
    <select name="category" class="form-control">
       <option disabled selected> Choose one!</option>
       @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach

    </select>
    @error('category')
        <div class="mt-2 text-danger">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="tags"> Tag</label>
    <select name="tags[]" class="form-control tag" multiple>
       @foreach($post->tags as $tag)
            <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
        @endforeach
       @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach

    </select>
    @error('tags')
        <div class="mt-2 text-danger">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="body"> Body </label>
    <textarea name="body" class="form-control">{{ old('body') ?? $post->body }}</textarea>
    @error('body')
        <div class="mt-3 text-danger">
            {{ $message }}
        </div>
    @enderror
</div>
<button type="submit" class="btn btn-success"> {{ $submit ?? 'Update'}} </button>

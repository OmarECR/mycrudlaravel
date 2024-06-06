<x-layout>
    <div class="mid-container">
        <h2>Update Blog</h2>
        <form action="{{ route('blog.update', $blog) }}" method="post" enctype="multipart/form-data">

            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ $blog->title }}" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" placeholder="Enter description">{{ $blog->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="banner_image">Banner Image:</label>
                <input type="file" id="banner_image" name="banner_image">
                @if (!empty($blog->banner_image))
                    <img style="height: 80px;" src="{{ asset('images/'.$blog->banner_image) }}" alt=""> 
                @else
                    Not available
                @endif
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status">
                    <option value="">-- Select --</option>
                    <option {{ $blog->status == 1 ? "selected":"" }} value="1">Active</option>
                    <option {{ $blog->status == 0 ? "selected":"" }} value="0">In Active</option>
                </select>
            </div>
    
            <button type="submit" class="form-btn">Update Blog</button>
        </form>
        <br>
        <a href="{{ route('blog.index') }}" class="action-link view-link">Back</a>
    </div>
</x-layout>
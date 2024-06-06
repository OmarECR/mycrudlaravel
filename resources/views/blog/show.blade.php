<x-layout>
    <div class="mid-container">
        <h2>Blog Details</h2>
        <div class="blog-details">
            <h3>Title:</h3>
            <p>{{ $blog->title }}</p>
        </div>
        <div class="blog-details">
            <h3>Description:</h3>
            <p>{{ $blog->description }}</p>
        </div>
        <div class="blog-details">
            <h3>Banner Image:</h3>
            <p>
                @if (!empty($blog->banner_image))
                    <img style="height: 80px;" src="{{ asset('images/'.$blog->banner_image) }}" alt=""> 
                @else
                    Not available
                @endif
            </p>
        </div>
        <div class="blog-details">
            <h3>Status:</h3>
            <p>{{ $blog->status == 1 ? "Active" : "In-active" }}</p>
        </div>
        <div class="blog-details">
            <h3>Created At:</h3>
            <p>{{ $blog->created_at }}</p>
        </div>
        <a href="{{ route('blog.index') }}" class="action-link view-link">Back</a>
        <a href="{{ route('blog.edit', $blog->id) }}" class="action-link edit-link">Edit</a>
    </div>
</x-layout>
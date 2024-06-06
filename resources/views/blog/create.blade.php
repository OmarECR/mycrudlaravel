<x-layout>
    <div class="mid-container">
        <h2>Create Blog</h2>

        {{-- @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        @endif --}}

        <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Enter title">
                @error('title')
                    <div class="app-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" placeholder="Enter description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="app-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="banner_image">Banner Image:</label>
                <input type="file" id="banner_image" name="banner_image">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status">
                    <option value="">-- Select --</option>
                    <option {{ old('status') == '1' ? 'selected':'' }} value="1">Active</option>
                    <option {{ old('status') == '0' ? 'selected':'' }} value="0">In Active</option>
                </select>
                @error('status')
                    <div class="app-error">{{ $message }}</div>
                @enderror
            </div>
    
            <button type="submit" class="form-btn">Create Blog</button>
        </form>
        <br>
        <a href="{{ route('blog.index') }}" class="action-link view-link">Back</a>
    </div>
    
</x-layout>
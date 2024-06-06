<x-layout>
    <div class="container">
        <a href="{{ route('blog.create') }}" class="create-blog-button">Create New Blog</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Banner Image</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>
                            @if (!empty($blog->banner_image))
                                <img style="height: 80px;" src="{{ asset('images/'.$blog->banner_image) }}" alt="">
                            @else
                                Not available
                            @endif
                        </td>
                        <td>
                            {{ $blog->status == 1 ? "Active":"in-Active" }}
                        </td>
                        <td>
                            {{ $blog->created_at }}
                        </td>
                        <td class="action-buttons">
                            <a href="{{ route('blog.show',$blog) }}" class="action-buttons"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('blog.edit', $blog) }}" class="action-buttons"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('blog.destroy', $blog) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure want to delete?')" class="action-buttons"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="pagination">
            {{ $blogs->links() }}
        </div>
    </div>    
</x-layout>
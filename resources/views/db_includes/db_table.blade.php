<link rel="stylesheet" href="{{ asset('css/db_table.css') }}">

<h3 class="tbl-ttl"><span>Blogs</span></h3>

<table class="table table-bordered table1">
    <thead class="table-head">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Category</th>
            <th>Description</th>
            <th>Location</th>
            <th>Thumbnail</th>
            <th>Images</th>
            <th>Content</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blogs as $index => $blog)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $blog->blog_title }}</td>
                <td>{{ $blog->blog_cat }}</td>
                <td>{{ Str::limit($blog->blog_description, 100) }}</td>
                <td>{{ $blog->blog_location }}</td>

                {{-- Thumbnail --}}
                <td>
                    @if ($blog->blog_thumbnail)
                        <img src="{{ asset('uploads/thumbnails/' . $blog->blog_thumbnail) }}" alt="Thumbnail"
                            width="80">
                    @else
                        No Image
                    @endif
                </td>

                {{-- Fav Images --}}
                <td>
                    <div class="d-flex gap-2">
                        <span>
                            @if ($blog->blog_favimg)
                                <img src="{{ asset('uploads/fav_img/' . $blog->blog_favimg) }}" alt="Fav Image"
                                    width="60">
                            @else
                                No Image
                            @endif
                        </span>
                        <span>
                            @if ($blog->blog_favimg1)
                                <img src="{{ asset('uploads/fav_img2/' . $blog->blog_favimg1) }}" alt="Fav Image"
                                    width="60">
                            @else
                                No Image
                            @endif
                        </span>
                    </div>

                    <div class="d-flex gap-2">
                        <span>
                            @if ($blog->blog_favimg2)
                                <img src="{{ asset('uploads/fav_img3/' . $blog->blog_favimg2) }}" alt="Fav Image"
                                    width="60">
                            @else
                                No Image
                            @endif
                        </span>
                        <span>
                            @if ($blog->blog_favimg3)
                                <img src="{{ asset('uploads/fav_img4/' . $blog->blog_favimg3) }}" alt="Fav Image"
                                    width="60">
                            @else
                                No Image
                            @endif
                        </span>
                    </div>
                </td>

                <td>{{ Str::limit($blog->blog_content, 200) }}</td>

                {{-- Action Buttons --}}
                <td class="d-flex gap-2">
                    <a href="{{ route('blogs.view', $blog->id) }}" class="btn-view"><i
                            class="fa-regular fa-eye"></i></a>
                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn-edit"><i
                            class="fa-solid fa-user-pen"></i></a>

                    <form action="{{ route('blogs.delete', $blog->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete"
                            onclick="return confirm('Are you sure you want to delete this blog?')"><i
                                class="fa-solid fa-trash"></i></button>
                    </form>

                </td>
            </tr>
        @endforeach


    </tbody>
</table>
{{ $blogs->links('pagination::bootstrap-5') }}

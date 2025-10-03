<link rel="stylesheet" href="{{ asset('css/db_table.css') }}">

<h3 class="tbl-ttl mt-5"><span>Header</span></h3>

<table class="table table-bordered table1">
    <thead class="table-head">
        <tr>
            <th>Id</th>
            <th>Logo</th>
            <th>Menu</th>
            <th>Menu Link</th>
            <th>Button</th>
            <th>Button Link</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($headers as $index => $header)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @if ($header->logo)
                        <img src="{{ Storage::url($header->logo) }}" alt="Thumbnail" width="80">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $header->menu_name }}</td>
                <td>{{ $header->menu_link }}</td>
                <td>{{ $header->button_name }}</td>
                <td>{{ $header->button_link }}</td>
                {{-- Action Buttons --}}
                <td class="d-flex gap-2">
                    <a href="{{ route('header.view', $header->id) }}" class="btn-view"><i
                            class="fa-regular fa-eye"></i></a>
                    <a href="{{ route('header.edit', $header->id) }}" class="btn-edit"><i
                            class="fa-solid fa-user-pen"></i></a>

                    <form action="{{ route('header.delete', $header->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete"
                            onclick="return confirm('Are you sure you want to delete this header Content?')"><i
                                class="fa-solid fa-trash"></i></button>
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

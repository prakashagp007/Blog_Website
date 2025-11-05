<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="container">

    <table class="table table-bordered table1">
        <thead>
            <tr>
                <th>Platform</th>
                <th>Icon</th>
                <th>URL</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($links as $link)
                <tr>
                    <td>{{ $link->platform_name }}</td>
                    <td><i class="{{ $link->icon_class }}"></i></td>
                    <td><a href="{{ $link->url }}" target="_blank">{{ $link->url }}</a></td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('social.edit', $link->id) }}" class="btn-edit"><i
                                class="fa-solid fa-user-pen"></i></a>
                        <a href="{{ route('social.view', $link->id) }}" class="btn-view"><i
                                class="fa-regular fa-eye"></i></a>
                        <form action="{{ route('social.destroy', $link->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete" onclick="return confirm('Delete this link?')"><i
                                    class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

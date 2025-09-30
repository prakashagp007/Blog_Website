<div class="container">

    <div class="card p-4">

        <h3>Header Section</h3>



<form action="{{ route('header.store') }}" method="POST" enctype="multipart/form-data">
    @csrf


    <div class="row">
        <div class="col-8">
            <label>Logo:</label>
        <input type="file" class="form-control" name="logo">

        </div>
    </div>

    <hr>
    <div>
        <label>Menu Name:</label>
        <input type="text" class="form-control" name="menu_name" required>
    </div>
    <div>
        <label>Menu Link:</label>
        <input type="text" class="form-control" name="menu_link" required>
    </div>
    <div>
        <label>Button Name:</label>
        <input type="text" class="form-control" name="button_name">
    </div>
    <div>
        <label>Button Link:</label>
        <input type="text" class="form-control" name="button_link">
    </div>
    <button type="submit">Save</button>
</form>
</div>
</div>

<style>
    .cd {
        background-color: whitesmoke;
        border: none;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }

    .crd {
        padding: 10px;
        height: fit-content;
        margin-top: 30px;
        border: none;
    }

    .upd-btn {
        margin: 20px auto;
        background: linear-gradient(90deg, rgb(5, 55, 95) 0%, rgb(108, 202, 232) 100%);
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 6px;
        font-family: "Keania One", sans-serif;
        font-weight: 400;
        font-style: normal;
    }
</style>

<div class="container">

    <div class="card cd p-4">



        <form action="{{ route('header.store') }}" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="row">
                <div class="col-4">
                    <div class="card crd">
                        <label>Logo:</label>
                        <input type="file" class="form-control" name="logo">
                    </div>
                </div>

                <div class="col-4">
                    <div class="card crd">
                        <div>
                            <label>Menu Name:</label>
                            <input type="text" class="form-control" name="menu_name" required>
                        </div>
                        <div>
                            <label>Menu Link:</label>
                            <input type="text" class="form-control" name="menu_link" required>
                        </div>
                    </div>
                </div>


                <div class="col-4">
                    <div class="card crd">
                        <div>
                            <label>Button Name:</label>
                            <input type="text" class="form-control" name="button_name">
                        </div>
                        <div>
                            <label>Button Link:</label>
                            <input type="text" class="form-control" name="button_link">
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="upd-btn" type="submit">Publish <i class="fa-solid fa-download"></i> </button>
            </div>
        </form>
    </div>
</div>

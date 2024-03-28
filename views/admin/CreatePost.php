<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="container mt-5" style = "width : 40%;">
                <div class="msg msg-false" role="alert">
                    <p class = "p5"><?= (isset($_SESSION['error_msg'])) ? $_SESSION['msg_admin_login'] : null ?></p>
                </div>
                <form action="<?= DOM ?>admin/Dashboard/createpost" method="post" class="form-horizontal">
                    <div class="flex justify-content-around ">
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control"/>
                        </div>
                    </div>
                    <div class="flex justify-content-around ">
                        <div class="mb-3">
                            <label for="" class="form-label">Text</label>
                            <input type="text" name="text" class="form-control">
                        </div>
                    </div>
                    <div class="flex justify-content-around ">
                        <div class="mb-3">
                            <a href="<?= DOM ?>admin/Dashboard" class="btn btn-dark">Back</a>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="createPost" class="form-control btn btn-primary">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
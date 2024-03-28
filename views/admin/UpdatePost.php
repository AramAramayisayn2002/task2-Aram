<div class="content-header">
    <div class="container mt-5" style = "width: 60%">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="container mt-5" style = "width : 80%;">
                        <div class="msg msg-false" role="alert">
                            <p class = "p5"><?= (isset($_SESSION['msg_update_login'])) ? $_SESSION['msg_admin_login'] : null ?></p>
                        </div>
                        <form action="<?= DOM ?>admin/dashboard/updatepost" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="flex justify-content-around ">
                                <div class="mb-3">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" value = "<?= (isset($data[0]['title'])) ? $data[0]['title'] : null; ?>"/>
                                    <input type="hidden" name="id" class="form-control" value = "<?= (isset($data[0]['id'])) ? $data[0]['id'] : null; ?>"/>
                                </div>
                            </div>
                            <div class="flex justify-content-around ">
                                <div class="mb-3">
                                    <label for="" class="form-label">Text</label>
                                    <input type="text" name="text" class="form-control" value = "<?= (isset($data[0]['text'])) ? $data[0]['text'] : null; ?>">
                                </div>
                            </div>
                            <div class="flex justify-content-around ">
                                <div class="mb-3">
                                    <a href="<?= DOM ?>admin/Dashboard" class="btn btn-dark">Back</a>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="updatePost" id="CreatePost" class="form-control btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
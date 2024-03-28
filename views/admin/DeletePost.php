<div class="content-header">
    <div class="container mt-5" style = "width: 60%">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-5"><?= ($data[0]['title']); ?></h1>
                    <p class="card-text mb-5"><?= ($data[0]['text']); ?></p>
                    <a href="<?= DOM ?>admin/Dashboard" class="btn btn-dark">Back</a>
                    <a href="<?= DOM . 'admin/dashboard/delete?' . $data[0]['id'] ?> " class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>

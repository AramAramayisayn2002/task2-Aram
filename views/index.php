<div class="content-header">
    <div class="container mt-5" style = "width: 60%">
        <?php
        foreach ($data as $key => $value) {
        ?>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-5"><?= ($data[$key]['title']); ?></h1>
                    <p class="card-text mb-5"><?= ($data[$key]['text']); ?></p>
                    <a href="<?= DOM ?>index/show?<?=($data[$key]['id']); ?>" class="btn btn-success">Show</a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
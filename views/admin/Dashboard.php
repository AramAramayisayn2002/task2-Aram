<div class="content-header">
    <div class="container mt-4" style = "width: 70%">
        <div>
            <h1>Blogs</h1>
        </div>
        <div class = "flex justify-content-between">
            <div class="mb-3">
                <a href="<?= DOM ?>admin/Dashboard/create" class="btn btn-success">Add Post</a>
            </div>
            <form action="<?= DOM ?>admin/admin/logout" method="post" class="form-horizontal">
                <button type="submit" name = "logout" class="btn btn-danger btn-action mb-2">Logout</button>
            </form>
        </div>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Text</th>
                <th>Settings</th>
            </tr>
            </thead>
            <tbody >
            <?php
            foreach ($data as $key => $value) {
                ?>
                <tr>
                    <td>
                        <span>
                          <?= $value['id'] ?>
                        </span>
                    </td>
                    <td>
                        <span>
                          <?= mb_substr($value['title'], 0, 15) . '...' ?>
                        </span>
                    </td>
                    <td>
                        <span>
                          <?= mb_substr($value['text'], 0, 80) . '...' ?>
                        </span>
                    </td>
                    <td style="width: 40px;">
                        <a href = "<?= DOM . 'admin/dashboard/view?' . $value['id'] ?> " class="btn btn-success mb-2">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="<?= DOM . 'admin/dashboard/deletePage?' . $value['id'] ?> " class="btn btn-danger mb-2">
                            <i class="fas fa-trash"></i>
                        </a>
                        <a href="<?= DOM . 'admin/dashboard/updatePage?' . $value['id'] ?> " class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <?php
    ?>
</div>

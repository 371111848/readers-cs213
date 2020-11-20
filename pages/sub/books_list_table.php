<?php if (!is_data_uploaded()) { ?>

<div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">I don't have the data yet.</h4>
    <p>To start, you need to upload your data. </p>
    <hr>
    <a class="btn btn-sm btn-secondary" href="/upload">Let's upload the data!</a>
</div>

<?php return; }?>
<div class="content row justify-content-md-center">
    <table class="table table-hover table-sort col-xl-8" data-sortlist="[[3,1]]">
        <thead>
            <tr>
                <th>#</th>
                <th class="text-center">Title</th>
                <th class="text-center">Category</th>
                <th class="text-center">No. Readers</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach (load_data("books") as $i): $book = get_book($i['id']);?>
        <tr>
            <th scope="row"><?=$book->id?></th>
            <td class="text-center"><?=$book->title?></td>
            <td class="text-center"><?=$book->category?></td>
            <td class="text-center"><?=$book->readers?></td>
        </tr>

        <?php endforeach; ?>
        </tbody>

    </table>
</div>
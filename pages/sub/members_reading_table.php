<?php if (!is_data_uploaded()) { ?>

    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">I don't have the data yet.</h4>
        <p>To start, you need to upload your data. </p>
        <hr>
        <a class="btn btn-sm btn-secondary" href="/upload">Let's upload the data!</a>
    </div>

<?php return; }?>
<div class="content row justify-content-md-center">
    <table class="table table-hover table-sort col-lg-10 col-xl-8" sort="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th class="text-center">Read Books</th>
                <th class="text-center">Read Pages</th>
            </tr>
        </thead>
        <tbody>

        <?php
        $total_read_books = 0;
        $total_read_pages = 0;
        foreach (load_data("members") as $i):
            $member = get_member($i['id']);
            $total_read_books += $member->read_books;
            $total_read_pages += $member->read_pages;
        ?>

        <tr class="<?php if(!$member->is_target_completed()) echo "table-warning";?>" >
            <th scope="row"><?=$member->id?></th>
            <td><?=$member->name?> <?php if(!$member->is_target_completed()) echo "<i class='fas fa-exclamation-triangle fa-sm' data-toggle='tooltip' data-placement='top' title=\"This member didn't complete the reading target.\"></i>";?></td>
            <td class="text-center"><?=$member->read_books?></td>
            <td class="text-center"><?=$member->read_pages?></td>
        </tr>

        <?php endforeach; ?>
        </tbody>
        <tr>
            <th></th>
            <th>Total</th>
            <th class="text-center"><?=$total_read_books?> Books</th>
            <th class="text-center"><?=$total_read_pages?> Pages</th>
        </tr>
    </table>
</div>
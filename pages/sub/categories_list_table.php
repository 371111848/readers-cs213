<?php if (!is_data_uploaded()) { ?>

<div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">I don't have the data yet.</h4>
    <p>To start, you need to upload your data. </p>
    <hr>
    <a class="btn btn-sm btn-secondary" href="/upload">Let's upload the data!</a>
</div>

<?php return; }?>
<div class="content row justify-content-md-center">
    <table class="table table-hover table-sort col-lg-8 col-xl-8" data-sortlist="[[3,1]]">
        <thead>
            <tr>
                
                <th class="text-center">Name</th>
                <th class="text-center">No. Books</th>
                <th class="text-center">No. Readers</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach (load_data("categories") as $i): $category = get_category($i['id']);?>
        <tr>
            
            <td class="text-center"><?=$category->name?></td>
            <td class="text-center"><?=$category->no_books?></td>
            <td class="text-center"><?=$category->readers?></td>
            
        </tr>

        <?php endforeach; ?>
        </tbody>

    </table>
</div>
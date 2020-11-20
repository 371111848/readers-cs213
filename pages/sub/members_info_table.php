<?php if (!is_data_uploaded()) { ?>

<div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">I don't have the data yet.</h4>
    <p>To start, you need to upload your data. </p>
    <hr>
    <a class="btn btn-sm btn-secondary" href="/upload">Let's upload the data!</a>
</div>

<?php return; }?>
<div class="content  row justify-content-md-center">
    <table class="table table-hover table-sort col-lg-10 col-xl-8" sort="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach (load_data("members") as $i): $member = get_member($i['id']);?>
        <tr>
            <th scope="row"><?=$member->id?></th>
            <td><?=$member->name?></td>
            <td><?=$member->phone?></td>
            <td><?=$member->email?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>

    </table>
</div>

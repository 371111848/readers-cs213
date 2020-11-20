<?php if (!is_data_uploaded()) { ?>

<div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">I don't have the data yet.</h4>
    <p>To start, you need to upload your data. </p>
    <hr>
    <a class="btn btn-sm btn-secondary" href="/upload">Let's upload the data!</a>
</div>

<?php return; }?>
<?php $books = load_data("books"); ?>


    <canvas class="col-md-6 col-xl-4" id="books_h" ></canvas>

    
<?php
$books = array(
    "names"   =>  array(),
    "reads"   =>  array()
);
foreach (load_data("books") as $i) {
    $book = get_book($i['id']);
    if($book->readers > 0) {
        $books['names'][] = $book->title;
        $books['reads'][] = $book->readers;
    }
}
array_multisort($books['reads'], SORT_DESC, $books['names']);
?>

<script>
canvas_books_h = 1;
canvas_labels = <?php echo json_encode($books['names']); ?>;
canvas_data = <?php echo json_encode($books['reads']); ?>;
canvas_datalabel = "Book Readers";
</script>

<?php if (!is_data_uploaded()) { ?>

<div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">I don't have the data yet.</h4>
    <p>To start, you need to upload your data. </p>
    <hr>
    <a class="btn btn-sm btn-secondary" href="/upload">Let's upload the data!</a>
</div>

<?php return; }?>
<div class="row justify-content-center">
    <div class="row col-lg-10 col-xl-8">
    <div class=" col-md-6 mb-4">
        <div class="card ">
            <div class="card-header text-center">No. Books Read</div>
            <span class="display-3 text-center"> <?=get_readings("books")?> </span>
        </div>
    </div>

    <div class=" col-md-6 mb-4">
        <div class="card ">
            <div class="card-header text-center">No. Pages Read</div>
            <span class="display-3 text-center"> <?=get_readings("pages")?> </span>
        </div>
    </div>
    
<?php // Most Read Books
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
    $books['reads'] = array_slice($books['reads'],0,10);
    $books['names'] = array_slice($books['names'],0,10);
    ?>
        <div class=" col-md-12 mb-4">
            <div class="card ">
                <div class="card-header">
                        <i class="fas fa-book  text-secondary mr-2"></i>
                        10 Most Read Books
                    <a class="mt-1 small float-right" href="/books">Go to Books</a>
                </div>
                <canvas class="" id="books_h" ></canvas>
            </div>
        </div>
        <script>
        var canvas_books_h = {
            labels: <?php echo json_encode($books['names']); ?>,
            data: <?php echo json_encode($books['reads']); ?>,
            datalabel: "Book Readers"
        }
        </script>

<?php // Most Read Categories
    $categories = array(
        "names"   =>  array(),
        "reads"   =>  array()
    );
    foreach (load_data("categories") as $i) {
        $category = get_category($i['id']);
        if($category->readers > 0) {
            $categories['names'][] = $category->name;
            $categories['reads'][] = $category->readers;
        }
    }
    array_multisort($categories['reads'], SORT_DESC, $categories['names']);
    $categories['reads'] = array_slice($categories['reads'],0,10);
    $categories['names'] = array_slice($categories['names'],0,10);
    ?>
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">
                <i class="fas fa-fire-alt text-secondary mr-2"></i>
                    Most Interesting Categories
                    <a class="mt-1 small float-right" href="/categories">Go to Categories</a>
                </div>
                <canvas class="" id="categories" ></canvas>
            </div>
        </div>

        <script>
            var canvas_categories = {
                labels: <?php echo json_encode($categories['names']); ?>,
                data: <?php echo json_encode($categories['reads']); ?>,
                datalabel: "Category Readers"
            }
        </script>
    

<?php // Most Book Reader 
    $members_books = array(
        "names"   =>  array(),
        "reads"   =>  array()
    );
    $members_pages = $members_books;
    foreach (load_data("members") as $i) {
        $member = get_member($i['id']);
        $members_books['names'][] = $member->name;
        $members_books['reads'][] = $member->read_books;
        $members_pages['names'][] = $member->name;
        $members_pages['reads'][] = $member->read_pages*-1;
    }
    array_multisort($members_books['reads'], SORT_DESC, $members_books['names']);
    array_multisort($members_pages['reads'], SORT_ASC, $members_pages['names']);
    // $members['reads'] = array_slice($categories['reads'],0,10);
    // $members['names'] = array_slice($categories['names'],0,10);
    ?>
        <div class="col-md-12 col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-book-reader text-secondary mr-1"></i>
                    Top Readers (Books)
                    <a class="mt-1 small float-right" href="/members">Go to Members</a>
                </div>
                <canvas class="" id="members_books"></canvas>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">
                <i class="fas fa-book-reader text-secondary mr-1"></i>
                    Top Readers (Pages)
                    <a class="mt-1 small float-right" href="/members">Go to Members</a>
                </div>
                <canvas class="" id="members_pages"></canvas>
            </div>
        </div>

        <script>
            var canvas_members_books = {
                labels: <?php echo json_encode($members_books['names']); ?>,
                data: <?php echo json_encode($members_books['reads']); ?>,
                datalabel: "Books Read"
            }
            var canvas_members_pages = {
                labels: <?php echo json_encode($members_pages['names']); ?>,
                data: <?php echo json_encode($members_pages['reads']); ?>,
                datalabel: "Pages Read"
            }
        </script>

<?php
include_once "templates/footer.php";
?>


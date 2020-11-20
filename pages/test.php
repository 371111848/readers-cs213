<?php


if (!isset($_GET['p']) OR empty($_GET['p'])) $_GET['p'] = 'home';
if (!isset($_GET['id'])) $_GET['id'] = FALSE;
if (!isset($_GET['tab'])) $_GET['tab'] = FALSE;


// print_r(load_data('categories'));

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
print_r(get_readings("pages"));
?>
<table class="table">
    <tbody>
        <td><pre>
        <?php //print_r($books);?> 
        </pre></td>
        <td><pre>
        <?php  //print_r($books);?> 
        </td></pre>
    </tbody>
</table>




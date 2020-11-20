<?php
$page['title']='Upload Data';
if(isset($_POST["submitDataUpload"])) {

    $target_dir = "uploads/";
    $upload_members = 1;
    $upload_books = 1;
    $upload_readings = 1;


    $members_file = $target_dir . "membersData.csv";
    $books_file = $target_dir . "booksData.csv";
    $readings_file = $target_dir . "readingsData.csv";

    $members_file_type = strtolower(pathinfo($members_file,PATHINFO_EXTENSION));
    $books_file_type = strtolower(pathinfo($books_file,PATHINFO_EXTENSION));
    $readings_file_type = strtolower(pathinfo($readings_file,PATHINFO_EXTENSION));


    if (($members_file_type != "csv") OR ($books_file_type != "csv") OR ($readings_file_type != "csv")) {
        add_alert("One of your file has a file type that is not allowed. (File type allowed: .csv)","danger");
        $upload_members = 0;
        $upload_books = 0;
        $upload_readings = 0; 
    }

    if ( ($_FILES["membersData"]["size"] > 5000000) OR ($_FILES["booksData"]["size"] > 5000000) OR ($_FILES["readingsData"]["size"] > 5000000) ) {
        add_alert("One of your files is too large. (Maximum size allowed: 5MB)","danger");
        $upload_members = 0;
        $upload_books = 0;
        $upload_readings = 0; 
    }
    
    if ($upload_members && $upload_books && $upload_readings) {

        if (!count_attr($_FILES["membersData"]["tmp_name"],4)){
            add_alert("Members data file was not uploaded or it has wrong number of attributes. Therefore, It was not updated.","danger");
            $upload_members = 0;
        }

        if (!count_attr($_FILES["booksData"]["tmp_name"],4)){
            add_alert("Books data file was not uploaded or it has wrong number of attributes. Therefore, It was not updated.","danger");
            $upload_books = 0;
        }

        if (!count_attr($_FILES["readingsData"]["tmp_name"],2)){
            add_alert("Readings data file was not uploaded or it has wrong number of attributes. Therefore, It was not updated.","danger");
            $upload_readings = 0; 
        }

    }

    $uploaded = "";
    if ($upload_members) {
        if(file_exists($members_file)) {
            unlink($members_file); //remove the file
        }
        move_uploaded_file($_FILES["membersData"]["tmp_name"], $members_file);
        $uploaded = "Members Data";
    }

    if ($upload_books) {
        if(file_exists($books_file)) {
            unlink($books_file); //remove the file
        }
        move_uploaded_file($_FILES["booksData"]["tmp_name"], $books_file);
        if ($uploaded == "") $uploaded .= "Books Data"; else $uploaded .= " - Books Data";
    }

    if ($upload_readings) {
        if(file_exists($readings_file)) {
            unlink($readings_file); //remove the file
        }
        move_uploaded_file($_FILES["readingsData"]["tmp_name"], $readings_file);
        if ($uploaded == "") $uploaded .= "Readings Data"; else $uploaded .= " - Readings Data";
    }
        
    if ($uploaded != "") add_alert("Your data has been uploaded successfully! (Updated: ".$uploaded.")","success");

}

include_once "templates/header.php";

?>


    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="display-4 light text-center">Upload Data</h1>
    </div>
    <div class="content row justify-content-center">
    <div class="col-lg-6 col-sm-8">
    <?php if (ini_get("file_uploads")): ?>
        
        <?php if (is_data_uploaded()): ?>
        <div class="alert alert-info" role="alert">
            <h4 class="alert-heading">Your data is already present!</h4>
            <p>There's no required work in this page.</p>
        </div>
        <?php elseif( is_data_uploaded("members") OR is_data_uploaded("books") OR is_data_uploaded("readings") ): ?>
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Missing Data</h4>
            <p>Upload the missing data to continue using the service.</p>
            <p> Missing Data:
                <ul>
                <?php if(!is_data_uploaded("members")):?> <li>Members Data</li> <?php endif; ?>
                <?php if(!is_data_uploaded("books")):?> <li>Books Data</li> <?php endif; ?>
                <?php if(!is_data_uploaded("readings")):?> <li>Readings Data</li> <?php endif; ?>
                </ul>
            </p>
        </div>
        <?php endif; ?>

        <div class="alert alert-secondary" role="alert">
        <?php if (!is_data_uploaded()): ?>
            <h4 class="alert-heading">Upload data!</h4>
            <p>You need to upload 3 CSV files (Comma-separated values): 
                <ul>
                    <li><b>Members Data File</b> | Attributes: (id, name, phone, email)</li>
                    <li><b>Books Data</b> | Attributes: (id, title, pages, category)</li>
                    <li><b>Reading Data</b> | Attributes: (member_id, book_id)
                </ul>
            </p>
            <hr>
        <?php else:  ?>
            <h4 class="alert-heading">Need to update the data?</h4>
            <p>Incase you want to update or replace the data go ahead and upload the new files. Otherwise, you don't need to do anything here.</p>
        <?php endif; ?>
            <form action="/upload" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="membersData">Members Data File: <?php if(is_data_uploaded("members")) echo "(Uploaded)"; ?></label>
                    <input class="form-control-file" accept=".csv" type="file" name="membersData" id="membersData"/>
                    <small class="text-muted "><em>CSV file with Attributes: (id, name, phone, email)</em></small>
                </div>
                <div class="form-group">
                    <label for="booksData">Books Data File: <?php if(is_data_uploaded("books")) echo "(Uploaded)"; ?></label>
                    <input class="form-control-file" accept=".csv" type="file" name="booksData" id="booksData"/>
                    <small class="text-muted "><em>CSV file with Attributes: (id, title, pages, category)</em></small>
                </div>
                <div class="form-group">
                    <label for="readingsData">Readings Data File: <?php if(is_data_uploaded("readings")) echo "(Uploaded)"; ?></label>
                    <input class="form-control-file" accept=".csv" type="file" name="readingsData" id="readingsData"/>
                    <small class="text-muted "><em>CSV file with Attributes: (member_id, book_id)</em></small>
                </div>
                <input class="btn btn-primary float-right" type="submit" value="Upload Data" name="submitDataUpload">
            </form>
        </div>



    <?php else: ?>
        <div class="alert alert-danger" role="alert">
            <b>Error: file_uploads php setting is set to (0)</b> Please active this setting in php.ini file to be able to upload data.
        </div>
        
    <?php endif;?>
    </div>
    </div>
    </div>
<?php
include_once "templates/footer.php";
?>
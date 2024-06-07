 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Advance Search</title>

     <link rel="stylesheet" href="bootstrap.css" />
     <link rel="stylesheet" href="bootstrap.js" />
     <link rel="icon" href="resource/img/icon1.svg"/>
 </head>

 <body>

     <?php include "connection.php" ?>

     <div class="container-fluid border border-dark rounded-4 mt-4 p-5 col-10 offset-1">
    <div class="row">
        <div class="col-md-5 offset-md-1 mb-3">
            <label for="cat" class="form-label">Category</label>
            <select name="category" class="form-select bg-info" id="cat">
                <option value="0">Select Category</option>
                <?php
                $rs2 = Database::search("SELECT * FROM `category`");
                while ($d2 = $rs2->fetch_assoc()) {
                    echo "<option value='{$d2['cat_id']}'>{$d2['category_name']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="col-md-5 mb-3"> 
            <label for="size" class="form-label">Type</label>
            <select name="size" class="form-select bg-info" id="size">
                <option value="0">Select Type</option>
                <?php
                $rs4 = Database::search("SELECT * FROM `size`");
                while ($d4 = $rs4->fetch_assoc()) {
                    echo "<option value='{$d4['size_id']}'>{$d4['size']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="row">
            <div class="col-md-5 offset-md-1 mb-3">
                <label for="min" class="form-label">Min Price</label>
                <input type="number" class="form-control" placeholder="Min Price" id="min">
            </div>

            <div class="col-md-5 mb-3">
                <label for="max" class="form-label">Max Price</label>
                <input type="number" class="form-control" placeholder="Max Price" id="max">
            </div>
        </div>

        <div class="col-md-10 offset-md-1"> 
            <button class="btn btn-outline-info col-12" onclick="advSearchProduct(0);">Search</button>
        </div>
    </div>
</div>

     <!--load Product-->

     <div class="row col-10 offset-1" style="cursor: pointer;" id="pid">


     </div>
     <!--load Product-->




     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
     <script src="script.js"></script>

 </body>

 </html>
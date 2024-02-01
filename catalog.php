<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css_files/main.css">
    <link rel="stylesheet" href="css_files/catalog.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/catalog.js"></script>
</head>

<body>
    <!-- NAVIGATION BAR -->
    <?php include "header.php"; ?>

    <!-- BODY SECTION -->
    <section>
        <div id="header-cloth">
            <h1>Our products</h1>
            <h2>Upgrade your wardrobe with your favorite prints on our high quality basics</h2>
        </div>
    </section>

    <section id='content'>
        <div id='cloth-container'>
            <div class='cloth-rows'>
            
            <?php
            require_once "includes/clothing-functions.php"; // Include the file containing the getCategories() function

            // Get the categories from the database
            $categories = getCategories();

            // Output the categories in HTML format
            foreach ($categories as $category) {
                $category_name = $category['category_name'];
                $category_img = $category['img'];
                $cat_id = $category['category_id'];

            // Display category HTML markup
                echo "
                <a style='text-decoration:none' class='cloth' href='clothing-template.php?cat=$cat_id'>
                     <div class='img-here'>
                        <img src='$category_img'>
                    </div>
                    <div class='name-container'>
                        <h2 class='name'>$category_name</h2>
                    </div>
                  </a>";
            };
?>
            </div>
        </div>        
    </section>
   
    <!-- FOOTER -->
    <?php include "footer.php"; ?>
    
</body>

</html>

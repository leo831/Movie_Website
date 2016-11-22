<?php session_start(); ?>
<?php include 'head.php'; ?>
<?php include 'header.php';?>

<section class="jumbotron text-xs-center">
    <div class="container">
        <h1 class="jumbotron-heading">Movie Catalog Website Project</h1>
        <form method="get" action="searchPage.php" class="form-inline float-xs-right">
            <input class="form-control form-control-lg" type="text" name="search" placeholder="Search">
            <button class="btn btn-outline-success btn-lg" name="submit" type="submit" value="search">Search</button>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
    </div>
</section>
<div id="wrapper">
    <div class="album text-muted">
        <div class="container">
            <div class="row" id="masonry"> </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
<script>
    window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    function getInfo() {
        $.ajax({
            url: "retrive.php",
            type: "GET",
            dataType: "json",
            success: function(data) {
                $.each(data, function(i, item) {
                    var Id = item.Id;
                    var rating = item.rating;
                    var director = item.director;
                    var year = item.year;
                    var category = item.category;
                    var description = $("<p class='card-text'>").append(item.description);
                    if (item.image.length != 0) {
                        var image = $("<img class='card-img-top'>").attr("src", "img/posters/" + item.image);
                    }
                    var post_id = $("<a class='btn btn-outline-success'>").attr("href", "description.php?post=" + Id).append("More Details");
                    var tittle = $("<h4 class='card-title'>").append(item.tittle);
                    var card = $("<div class='card-block'>").append(tittle, description, post_id);
                    var item = $("<div class='card'>").append(image, card);
                    // var post = $("<div class='card'>").append(img).append("<strong>Title:</strong> " + tittle + "<br>", "<strong>Director:</strong> " + director + "<br>", "<strong>Year:</strong> " + year + "<br>", "<strong>Rating:</strong> " + rating + "<br>", "<strong>Category:</strong> " + category + "<br>").append(post_id);
                    $(".row").append(item);
                });
            },
            error: function(data) {
                alert("fail");
            }
        });
    }
    getInfo();
    function deleteInput() {
        $.ajax({
            url: "http://hosting.otterlabs.org/laraleobardo/cst336/final_project/retrive.php",
            type: "GET",
            dataType: "json",
            success: function(data) {
                alert("helo");
            },
            error: function(data) {
                alert("fail");
            }
        });
    }
</script>
 <footer class="text-muted">
      <div class="container">
      <p>© Copyright  by lara4947</p>
        <p class="float-xs-right">
          <a href="#">Back to top</a>
        </p>
      </div>
    </footer>
<script src="js/imagesloaded.pkgd.js"></script>
<script src="js/masonry.pkgd.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      var $container = $('.row');
       $container.imagesLoaded( function() {
        $(".row").masonry();
         });       
    });
</script>
</body>
</html>
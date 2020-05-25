<?php 

session_start();

if(!isset($_SESSION['username'])){
    header ('location: index.php');
}
?>

<title>Ajouter un appartement</title>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Immobil</title>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.slim.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script src="https://kit.fontawesome.com/c8b7417c93.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php 
        include ("menu.php")
    ?>

    <section class="container-fluid bg">
        <section class="row justify-content-center">
            <section class="col-12 col-md-10 col-sm-10 col-lg-10 ">
                <form class="form form-container" role="form" method="post" action="ajout.php" enctype="multipart/form-data">
                    <fieldset>


                        <h2 class="text-center text-black-70">Ajouter un appartement</h2>

                        <div class="form-group">
                            <label class="col-12 control-label" for="textinput">Localisation</label>
                            <div class="col-12">
                                <input id="textinput" name="localisation" type="text" placeholder="Localisation (ex: Foto)"
                                    class="form-control form-control-sm input-md" required="">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-12 control-label" for="piece">Nombre de pièces</label>
                            <div class="col-12">
                                <select id="piece" name="piece" class="form-control form-control-sm">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-12 control-label" for="prix">Prix (en FcFA)</label>
                            <div class="col-12">
                                <input type="text" id="prix" name="prix" class="form-control form-control-sm" required="required">
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-12 control-label" for="bain">Salle(s) de bain</label>
                            <div class="col-12">
                                <select id="bain" name="bain" class="form-control form-control-sm">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-12 control-label" for="chambre">Chambres</label>
                            <div class="col-12">
                                <select id="chambre" name="chambre" class="form-control form-control-sm">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-12 control-label" for="image">Photos</label>
                            <div class="col-12">
                                <input id="image" name="image[]" multiple accept=".jpg, .png, .gif, .jpeg" class="input-file"
                                    type="file">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-12 control-label" for="ajouter"></label>
                            <div class="col-12">
                                <button id="ajouter" name="ajouter" class="btn btn-primary btn-block">Ajouter</button>
                            </div>
                        </div>




                    </fieldset>
                </form>
            </section>
        </section>
    </section>

</body>
<script>
$(document).ready(function(){
    $('#ajouter').click(function(){
        var image_name=$('#image').val();
        if(image_name== '')
        {
            alert("Please Select Image(s)");
            return false;
        }
        else 
        {
            var extension=$('#image').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['gif','png','jpg', 'jpeg'])== -1)
            {
                alert('Image Invalide!');
                $('#image').val('');
                return false;
            }
        }
    });
});
</script>
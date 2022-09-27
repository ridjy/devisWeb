<?php
try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=720','root','') ;
  }
  catch ( Exception $e)
  {
    die( ' Erreur : ' . $e->getMessage( ) ) ;
  }
  $res1 = $bdd->query("SELECT libelle,prix$ FROM options");
  $res2 = $bdd->query("SELECT designation,produit_id FROM produits");

$total=0;
?>

<!DOCTYPE html>

<html>
  
  <head>
    <title>Prix produits pour lagence720</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <link href="style1formulaire.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
   

  <script type="text/javascript" src="jquery/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="jquery/jquery-1.10.2.min.js"></script>
  <link rel="stylesheet" href="/css/jquery.sbscroller.css" />  
  </head>
  
  <body>
    <!--<center>-->
        <div class="row">
          <div class="col-xs-12 col-md-8 sidebar-offcanvas">
          <div id="aaaa" class="well sidebar-nav" >   
           <h2 onmouseover="this.style.color='gray'" onmouseout="this.style.color='black' ">Nos offres</h2>
            <form method="POST" , action="2cols.php">
              
              <?php 
               $a=1;   
  while ($produits = $res2->fetch() )
  {
    echo "<h3>".$produits['designation']."</h3>";
    echo "<br/>";
    $requete="SELECT libelle,prix$,produit_id FROM options where produit_id=$produits[produit_id]";
    $resultat=$bdd->query($requete);
    while( $options= $resultat->fetch() )
    {
      ?><input type="checkbox" name=<?php echo "chk".$a ?> value=<?php echo $a ?>><?php
      echo " ".$options['libelle'];
      $tab[$a]=$produits['designation'];
                    $t[$a]=$options['libelle'];
                    $p[$a]=$options['prix$'];

      $a++;
      echo "</br>";
    }
  } 
  ?>
               
                 
              <!--listedesproduits-->
              
              <input type="submit" value="valider mes choix">
              <br/><br/><br/><br/>
            </div> 


            </form>
          </div>   
                     
             

            <!--2m colonne-->

             <div  id="laselection" class="col-xs-6 col-md-3 sidebar-offcanvas" style="display: block;">
              	<div class="well sidebar-nav" style="positon: fixed;">
              		<h3>Vos selections</h3>
                  <hr width=85% size=5>
                  <center>
                  <?php
                  for($a=1;$a<count($t);$a++)
                  {
                    if (isset($_POST['chk'.$a]))
                      {
                        //if ($tab[$a-1]!=$tab[$a])
                        //{
                        ?>  
                        <span><?php echo $tab[$a]; ?></span>
                        <?php
                        //$tt= $tab[$a];
                        //} 
                        //$c[$a]=$tab[$a];
                        echo "<br/>"; ?>
                        <span><?php echo $t[$a]; ?></span> <?php
                        
                        //$ch[]=$t[$a];
                        $total+=$p[$a];
                        echo "<br/>"."<br/>";
                         
                      }
                      }
                      echo "Total hors taxe =".$total." dollars";
                  ?>
                </center>
                  <!--laselection-->
          
                  <hr width=85% size=5>
                  <br/>
                  
                  <p BODY TEXT="#FF0000">Veuillez renseigner les champs ci-apr&egraves pour voir votre proforma</p>
                  
                  <!--formulaire pour facture-->
                  
                  <form  name="general" ,class="form-style1formulaire", method="POST" , action="essaipdftete.php" >
                   <?php 
                   for($a=1;$a<count($t);$a++)
                    {
                      if (isset($_POST['chk'.$a]))
                        { ?> 
                        
                        <input type="hidden" readonly="readonly" value=<?php echo $t[$a] ?> name=<?php echo"chk".$a ?> > 
                      <?php
                        }
                    }
                    
                      ?>

                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom ou pr&eacute;nom" >
                    <input type="text" class="form-control" id="societe" name="societe" placeholder="Votre soci&eacute;t&eacute">
                    <input type="text" class="form-control" id="mail" name="mail" class="form-control" placeholder="Adresse Email" autofocus>
                    <input type="text" name="tel" id="tel" class="form-control" placeholder="T&eacute;l&eacute;phone" >
                    
                   <?php 
                   //$total=$total ?>

                   <input type="button" onclick="checkMe()"  class="btn btn-lg btn-primary btn-block" name="ok" value="valider">
                </div>  
            </div>
          </form>


</div>



<!--pieds de page-->
<div class="navbar navbar-fixed-bottom navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-footer">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->
  </center>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script>
var x;
$(document).ready(function(){
  for (x=1;x<63;x++){
    $('#'+x).hide();}

});


</script>
<script>
$(document).ready(function(){
    var x;
    for (x=1;x<63;x++)
      {
        $('.li'+x).click()
        {
          //alert('rrrrrrrrr');
          if($('#'+x).is(':visible'))
          {
          $('#'+x).slideUp();
          }
          else
          {
          $('#'+x).slideDown(); 
          }
          return false;
        });
      }
    
  });

</script>

<script>
     function checkMe() {

    var form = document.general;
    var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
    //alert(form);                       
    if ((form.nom.value == '') || (form.nom.value == 'Nom ou prénom')) 
    { 
      alert("Vous n'avez pas saisi de nom");
      return false;
    } 
    else if ((form.societe.value == '') || (form.tel.value == 'Votre sociéte')) 
      {
        alert("Veuillez donner le nom de votre societe");
        return false;
      } 
      else if ((form.mail.value == '') || (form.mail.value == 'Adresse Email'))
      {
        alert("Vous n'avez pas saisi d'email");
        return false;
      } else if (form.tel.value.length < 7)
      {
        alert("Votre numero de telephone ne contient pas assez de chiffre. Merci de le corriger.");  
        return false;
      }
      else if (reg.test(form.mail.value)==false)
      {
        alert("Votre adresse email n'est pas valide. Merci de la corriger.");  
        return false;
      }
      //else { alert(form);}
        form.submit();
    }
 </script>
  <script>


 /* function affiche(categorie,forcer){
                             //Cas d'affichage celon l'�tat'
                             
                             if (forcer==""){
                                 if (($("#"+categorie+" .commandeOptions").css("display")=="none")){
                                    $("#"+categorie+" .commandeOptions").slideDown("slow");
                                    //$("#"+categorie+" .commandeOptions").queue(function() {
                                         //calculHauteur();
                                        //$(this).dequeue();
                                    };
                                    //$("#affiche_"+categorie).text("(Cacher options ↑ )");
                                }else {
                                    $("#"+categorie+" .commandeOptions").slideUp("slow");
                                    //$("#"+categorie+" .commandeOptions").queue(function() {
                                         //calculHauteur();
                                        //$(this).dequeue();
                                    });
                                    //$("#affiche_"+categorie).text("(Voir options ↓ )");
                                }                         
                            
                            
                            //On controle que le client � choisi au moins un produit.
                            /*var commandeProduit = false;
                            $(".commun").each(function(){
                                var court = $(this).attr('id').split('_');
                                if (court[1]== "categ" ){
                                        var rechercher = court[2];
                                        if ($("#S_C_"+rechercher).val()!=0){
                                            commandeProduit = true;
                                    }
                                }else {
                                        var rechercher = court[1];
                                        if ($("#S_O_"+rechercher).val()!=0){
                                            commandeProduit = true;    
                                    }

                                    }
                                });
                                    if (commandeProduit==false){
                                        alert("Vous devez sélectionner un produit avant de valider votre demande de devis.");
                                        return false;
                                    }
                                */    

                        


</script>



</body>
</html>
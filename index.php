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

 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0056)http://www.creads.org/component/annonceur/?task=show_new -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr-fr" lang="fr-fr" dir="ltr">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>lagence720|commander</title>
    

<script id="facebook-jssdk" src="js/all.js"></script>
<script type="text/javascript" async="" src="js/tagv7.pkmin.js"></script>
<script type="text/javascript" async="" src="js/ga.js"></script>
<script charset="utf-8" type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 

<link rel="stylesheet" type="text/css" href="css/styles.css"> 


<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
<script type="text/javascript" src="js/function.js"></script>


<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/jquery.ui.totop.js"></script>

<script type="text/javascript" src="js/conversion.js"></script>
<script id="json_id" type="text/javascript" src="js/jsonObject.pkmin.js"></script>
<script type="text/javascript" src="js/tagv7child.pkmin.js"></script>
<script type="text/javascript" src="./Creads - Creads_files/trackerv7.php"></script>
</head>

<body>

<!-- page -->
<div id="page" class="pages">
  
  <!-- inside -->
  <div class="inside">
  
    <!-- header -->
    <div id="header">                                                                
             <a href="http://www.lagence720.com/" title="lagence720" class="logo">
       
             <img src="image/logo720.jpg"  width="190" height="60" alt="logo 720">
      
             </a>
       
              <div class="zonemenu">
                
        <div class="fright">
                <h2 class="orange_linkf">Faites votre devis </h2>
                </div>
                

                
                </div>
          <div class="breaker soulign"></div>
    </div>
    <!-- fin header -->     
    
    
    <!-- conteneur -->
         
    <script type="text/javascript">

    function calculHauteur(){
           
        window.onscroll = function()
            {
      if( window.XMLHttpRequest ) { 
      
      if ($.browser.webkit){     
  var hscroll=document.body.scrollTop;
        }else {
        var hscroll=document.documentElement.scrollTop;
        }
      //  var ua = $.browser.webkit;
      

        hauteurDebutFooter = parseFloat($(document).height())-parseFloat($('#footer').height())-85;
  hauteurReel = parseFloat($('#commandeSelection').height()+parseFloat(hscroll));
        difference=parseFloat(hauteurReel)-parseFloat(hauteurDebutFooter);
        
    if ((hscroll > 175) && (parseFloat(hauteurReel)<parseFloat(hauteurDebutFooter))) {
      $('#commandeSelection').css('position','fixed'); 
      $('#commandeSelection').css('top','0');
    }else if ((parseFloat(hscroll) > 175) && (parseFloat(hauteurReel)>parseFloat(hauteurDebutFooter))) {
                        $('#commandeSelection').css('top','-'+parseFloat(difference)+'px');
                } else {
      $('#commandeSelection').css('position','absolute'); 
      $('#commandeSelection').css('top','auto');
    }
             //   $('#commandeSelection').html(+'pouet 1-'+parseFloat(document.documentElement.scrollTop)+'---v2--'+document.body.scrollTop+'-'+ua+'-');
        }      
      }
}
      
    $(window).load(function()
    {
        calculHauteur();
    });
    </script>


       <div id="conteneur"> 
    <!-- contenu --> 
    <div id="commandeNew"> 
                    
    <!-- col 1 --> 
                  <form action="essaipdftete.php" method="post" id="general" name="general">
                        
                  <div id="boxProduits">
                  <p class="titre_produit">Nos offres :</p> 
                  <div class="separateur_long"></div> 

 <?php 
              $a=1;$b=1;  
              while ($produits=$res2->fetch())
              {
                ?>
                <div id="<?php echo $b ?>" class="boxPdr">
                <h2><img src="image/picto.png" class="picto_categ">
                <label id="<?php echo "lab".$b ?>">
                <!--<input type="checkbox" id="chk_categ_<?php //echo $b ?>" name="<?php //echo "chk_categ_".$b ?>" class="checkGauche">--> 
                <?php
                echo "<strong>".$produits['designation']."</strong>";?></label>
                <span id="<?php echo"affiche_".$b ?>"  class="affiche_cache" onclick="afficheOptions(<?php echo $b ?>,&quot;&quot;);">(Voir options ↓ )</span>
                <img src="image/info_off.png" align="right" class="picto_expli" id="info_2">
                <?php 
                $requete="SELECT libelle,prix$,produit_id FROM options where produit_id=$produits[produit_id]";
                $resultat=$bdd->query($requete);
                while($options=$resultat->fetch())
                  {
                    ?>
                    <div id="<?php echo "options".$b."_".$a ?> " class="commandeOptions">
                    <label>  
                    <input type="checkbox"  id="chk<?php echo $a ?>" name="<?php echo"chk".$a ?>" class="checkGauche<?php echo $a ?>"><?php
                    echo " ".$options['libelle'];?> </label> 
                    <img src="image/info_off.png" align="right" class="picto_expli opts" id="info_146"></div></h2>


                    <?php
                    $tab[$a]=$produits['designation'];
                    $t[$a]=$options['libelle'];
                    $p[$a]=$options['prix$'];
                    $a++;
                   
                  } $b++; ?>
                </div><?php         
              } 
              ?> 
              <div id="<?php echo $b ?>" class="boxPdr"> <h2><img src="image/picto.png" class="picto_categ">

                <label id="<?php echo "lab".$b ?>"  onclick="afficheOptions(<?php echo $b ?>,&quot;&quot;);"><strong>Autres</strong></label>
                <span id="<?php echo"affiche_".$b ?>"  class="affiche_cache" onclick="afficheOptions(<?php echo $b ?>,3);"> (Ecrire ↓ ) </span>
                <img src="image/info_off.png" align="right" class="picto_expli" id="info_2">
                   <div id="<?php echo "options".$b."_".$a ?> " class="commandeOptions">
                    <textarea rows="2" cols="70"  style="border:solid 1px black; font-family:tahoma;" placeholder= "mettez la description de ce que vous voulez ici!" ></textarea> 
                    <img src="image/info_off.png" align="right" class="picto_expli opts" id="info_146"></div></h2> 

              </div>
              
                  <div class="breaker"></div> 
               </div>              
              
              
              <!-- fin col 1 --> 
      <!-- col 2 - BOX DE SELECTION CLIENT --> 
                        

                        <div id="contientSelection">
      <div id="commandeSelection" class="fixe" style="display: block;"> 
        <h2>Votre sélection</h2>   
            <div class="separateur"></div>
                <div id="listeVide"> 
                      <p>Votre sélection est vide</p>
                      
                  </div>

    <div id="listeProduit" style="display: none;">
      <!--la selection-->
               
         <center>
                  <br/>
                  <?php
                  for($a=1;$a<count($t)+1;$a++)
                  {
                    //if (isset($_POST['chk'.$a]))
                      //{
                        //if ($tab[$a-1]!=$tab[$a])
                        //{
                        ?>
                        <div id="choix<?php echo $a ?>" style="display:none;">  
                        <span><?php echo $tab[$a]." - "; ?></span>
                        <?php
                        //$tt= $tab[$a];
                        //} 
                        //$c[$a]=$tab[$a];
                        //echo "<br/>"; ?>
                        <span><?php echo $t[$a]; ?></span> <?php
                        
                        //$ch[]=$t[$a];
                        //$total+=$p[$a];
                        echo "<br/>"."<br/>";
                        echo "</div>"; 
                      //}
                      }
                      //echo "Total hors taxe =".$total." dollars";
                  ?>
                </center>
                  <!--laselection-->  
          
          </form>
        </div>      
      
            

          <div class="separateur_20"></div>  
          
      <div id="laisseCoordonnees"><p>Veuillez renseigner les champs ci-après pour calculer instantanément votre devis.</p> 
                                         
        
          <div class="breaker20"></div>
           <?php 
                   for($a=1;$a<count($t)+1;$a++)
                    {
                      if (isset($_POST['chk'.$a]))
                        { ?> 
                        
                        <input type="hidden" readonly="readonly" value=<?php echo $t[$a] ?> name=<?php echo"chk".$a ?> > 
                      <?php
                        }
                    }
                    
                      ?>

                    <fieldset> <input type="text"  id="nom" name="nom" placeholder="Nom / soci&eacute;t&eacute" ></fieldset>         
          <fieldset><input type="text"  id="societe" name="societe" placeholder="Adresse (soci&eacute;t&eacute)"></fieldset>
          <fieldset><input type="text"  id="mail" name="mail"  placeholder="Adresse Email"></fieldset>
          <fieldset><input type="text" name="tel" id="tel" class="form-control" placeholder="T&eacute;l&eacute;phone" ></fieldset>
        
                   <?php 
                   //$total=$total ?>
                    <div class="continuer">
                   <input type="button" onclick="checkMe()" name="ok" value="valider mes choix">
                   </div>
          <div class="breaker"></div> 
        
        </div> 
            </div>

                                 <div class="breaker"></div> 
               </div></form><!-- fin col 2 --> 
      <div class="breaker"></div> 
                            
      <!-- fin contenu --> 
            
        
        
        
    <!-- fin conteneur -->
        
    
    
  </div>
  <!-- fin inside -->
  <script>               
                                        
                                        function afficheOptions(categorie,forcer){
                             //Cas d'affichage celon l'�tat'
                             
                             if (forcer==""){
                                 if (($("#"+categorie+" .commandeOptions").css("display")=="none")){
                                    $("#"+categorie+" .commandeOptions").slideDown("slow");
                                    $("#"+categorie+" .commandeOptions").queue(function() {
                                         calculHauteur();
                                        $(this).dequeue();
                                    });
                                    $("#affiche_"+categorie).text("(Cacher options ↑ )");
                                }else {
                                    $("#"+categorie+" .commandeOptions").slideUp("slow");
                                    $("#"+categorie+" .commandeOptions").queue(function() {
                                         calculHauteur();
                                        $(this).dequeue();
                                    });
                                    $("#affiche_"+categorie).text("(Voir options ↓ )");
                                }
                             }else if(forcer==1){
                                 //Cas ou l'on force l'afffichage
                                 $("#"+categorie+" .commandeOptions").slideDown("slow");
                                 $("#"+categorie+" .commandeOptions").queue(function() {
                                         calculHauteur();
                                        $(this).dequeue();
                                    });
                                 $("#affiche_"+categorie).text("(Cacher options ↑ )");
                                 
                             }else if(forcer==0){
                                 //Cas ou l'on force le masque
                                 $("#"+categorie+" .commandeOptions").slideUp("slow");
                                 $("#"+categorie+" .commandeOptions").queue(function() {
                                         calculHauteur();
                                        $(this).dequeue();
                                    });
                                 $("#affiche_"+categorie).text("(Voir options ↓ )");
                             }else if (forcer==3){
                                 if (($("#"+categorie+" .commandeOptions").css("display")=="none")){
                                    $("#"+categorie+" .commandeOptions").slideDown("slow");
                                    $("#"+categorie+" .commandeOptions").queue(function() {
                                         calculHauteur();
                                        $(this).dequeue();
                                    });
                                    $("#affiche_"+categorie).text("(Cacher ↑ )");
                                }else {
                                    $("#"+categorie+" .commandeOptions").slideUp("slow");
                                    $("#"+categorie+" .commandeOptions").queue(function() {
                                         calculHauteur();
                                        $(this).dequeue();
                                    });
                                    $("#affiche_"+categorie).text("(Decrire ↓ )");
                                }
                             }
                             //calculHauteur();
                        }
 </script>       
<script>        
                <?php  for ($a=1;$a<count($t)+1;$a++) { ?>

                $(".checkGauche"+<?php echo $a ?>).click(function(){
                           //On masque la selection vide
                           $("#listeVide").hide();
                           $('#listeProduit').show();
                           if ($("#choix"+<?php echo $a ?>).css("display")=="none") {
                                   $("#choix"+<?php echo $a ?>).show();
                                   //$("#1").attr('checked', true);
                               }else{$("#choix"+<?php echo $a ?>).hide(); }
                           if ( $('#listeProduit').css("display")=="none")
                           { $("#listeVide").show();}    
                      });
              
               <?php } ?> 
              
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


  <!-- footer -->
  <div id="footer">
    
       <br/> <br/> <br/> <br/> <br/> <br/>        
      
            
            
            
            
            
            
            
      
        <div class="breaker"></div>
          
    <p>© L'agence720 | Tous droits réservés</p>  
        
        
    </div>
        
    <div class="breaker"></div>
  <br/> <br/> <br/> <br/> <br/> <br/>      

  </div>
  <!-- fin footer -->
  

</div>
<!-- fin page -->


</body></html>
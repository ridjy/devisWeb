<?php

try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=720','root','') ;
  }
  catch ( Exception $e)
  {
    die( ' Erreur : ' . $e->getMessage( ) ) ;
  }
  $resultat1 = $bdd->query("SELECT libelle,prix$ FROM options");
  $resultat2 = $bdd->query("SELECT designation,produit_id FROM produits");    

require('fpdf.php');
require('chiffre en lettres.php');

class PDF extends FPDF
{ 
    
// En-tête
function Header()
{
    // Logo
    //$this->Image('logo720.jpg',130,8,70);
    $this->Ln(7);
}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    //$this->SetY(-15);
    // Police Arial italique 8
    //$this->SetFont('Arial','I',8);
    // Numéro de page
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

}

$nom=$_POST['nom'];
$societe=$_POST['societe'];
$mail=$_POST['mail'];
$tel=$_POST['tel'];
$date=getdate();    
$pdf = new PDF();
$pdf->AddPage();

$pdf->ln(15);
$pdf->Image('logo720.jpg',130,8,70);

$pdf->SetFont('Arial','b',14);
$pdf->Cell(60,60,'PRESTATION n    '.'FA0'.$date['mday'].'/'.$date['year']);
$pdf->ln(1);
$pdf->SetFont('Arial','u',12);
$pdf->Cell(15,80,'date:');
$pdf->SetFont('Arial','i',12);
$pdf->cell(90,80,$date['mday'].' '.$date['month'].' '.$date['year']);
$pdf->SetFont('Arial','u',12);
$pdf->Cell(40,80,'CLIENT :');
$pdf->SetFont('Arial','i',12);
$pdf->cell(10,80,$nom);
$pdf->SetFont('Arial','u',12);
$pdf->ln(7);
$pdf->cell(105,80,'');
$pdf->cell(40,80,'ADRESSE :');
$pdf->SetFont('Arial','i',12);
$pdf->cell(10,80,$societe);
$pdf->ln(55);

//le tableau
$q="Qté";
$q=utf8_decode($q);
$header = array('Description',$q,'Total');
$pdf->SetFont('Arial','',13);
// Couleurs, épaisseur du trait et police grasse
$pdf->SetFillColor(0,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.2);
$pdf->SetFont('','B');
    // En-tête
$w = array(125, 15, 25);
for($i=0;$i<count($header);$i++)
$pdf->Cell($w[$i],7,$header[$i],1,0,'LR',true);
    //$this->Ln();
    // Restauration des couleurs et de la police
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$pdf->Ln(7);

$a=1;   
while ($produits=$resultat2->fetch())
{
    $requete="SELECT libelle,prix$,produit_id FROM options where produit_id=$produits[produit_id]";
    $resultat=$bdd->query($requete);
    while($options=$resultat->fetch())
        {
            $tab[$a]=$produits['designation'];
            $t[$a]=$options['libelle'];
            $p[$a]=$options['prix$'];
            // Calcul de la largeur et positionnement   
            $b[$a] = $pdf->GetStringWidth($tab[$a]);
            $c[$a] = $pdf->GetStringWidth($t[$a]);
            $a++;
        }  
    }
    
 $total=0;
 $tab[0]='mask';
 $e=0;   
 $w = array( 125, 15, 25);
for($a=1;$a<count($tab)+1;$a++)
    {
        if (isset($_POST['chk'.$a]))
            {
                if ( $tab[$e] == $tab[$a] )
                {
                $pdf->SetFont('Arial','',11);
                $pdf->Cell($w[0],6,'        - '.$t[$a],'LR');
                $pdf->Cell($w[1],6,'1','LR','LR','C');
                $pdf->Cell($w[2],6,$p[$a],'LR','LR','R');
                $total+=$p[$a];
                $pdf->Ln();
                }
                else{
                $pdf->SetFont('Arial','B',11);
                $pdf->Cell($w[0],6,$tab[$a],'LR');
                $pdf->SetFont('Arial','',11);
                $pdf->Cell($w[1],6,'','LR');  
                $pdf->Cell($w[2],6,'','LR'); 
                $pdf->Ln();
                $pdf->Cell($w[0],6,'        - '.$t[$a],'LR');
                $pdf->Cell($w[1],6,'1','LR','LR','C');
                $pdf->SetFont('Arial','',12);
                $pdf->Cell($w[2],6,$p[$a],'LR','LR','R');
                $total+=$p[$a];
                $pdf->Ln();
                $e=$a;

            }
            }
    }     
           
         
//mettons le footer du tableau
    //$pdf->Setcol(0);
    $pdf->SetFont('Arial','b',14);
    $pdf->Cell(125,7,'Total',1,0,'LR',false);
    $pdf->Cell(15,7,'',1,0,'LR',false);
    //$pdf->Cell(45,7,'',1,0,'LR',false);
    $pdf->Cell(25,7,$total,1,0,'R',false);
    $pdf->Ln();

    // Trait de terminaison
    $pdf->Cell(array_sum($w),0,'','T');


//montant en chiffre
$pdf->ln(20);
$pdf->SetFont('Arial','',12);
$str= 'Arrêtée, la présente facture à la somme de :';
$str = utf8_decode($str);
$pdf->cell(0,10,$str);
$pdf->ln(0);
$lettre=int2str($total);
$pdf->SetFont('Arial','b',10);
$pdf->cell(275,10,$lettre.' DOLLARS',0,0,'C');


$pdf->Output();
?>
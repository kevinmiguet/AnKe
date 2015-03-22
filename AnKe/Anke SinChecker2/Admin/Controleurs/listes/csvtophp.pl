use strict;
use LWP::Simple;
use utf8;

#Variables
my $fichierI; 													#lien vers le fichier en lecture (In)
my $fichierO;													#lien vers le fichier en écriture (Out)
my $listeUnique="oui";
my @champs=('key','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','DIV');
my $key = 0;
my @champsDiv=('dans la liste');
my $nomliste="boen70";
my $output="<?php\n\$champs=array(\"num\","; 
my $print=1;

#Programme
open (OUT,">","$nomliste.php");
#Initialisation de la variable $champs
 for (my $i=0;$i<=$#champs;$i++){
		 if ( ($champs[$i] ne'NULL') && ($champs[$i] ne'key') &&($champs[$i] ne'DIV')) {
		 $output.= "\"$champs[$i]\",";
		 }
	}
chop($output);
$output.=");\n\$champsDiv=array(";
#Initialisation de la variable $champsDiv
for (my $i=0;$i<=$#champsDiv;$i++){
		 
		 $output.= "\"$champsDiv[$i]\",";
		 }
	
chop($output);
$output.=");\n";



#Initialisation de l'array contenant les infos

open(IN,"<","$nomliste.csv");
$output .= "\$dataList=array(";
print OUT $output;
my $sinos;
my %sin;
while (<IN>){
	$print=0;
	$output="";
	my $line = lc($_) ;
	my @words = split /,/, $line;
	
	
	
	$output.="\n\"$words[$key]\"=>(array(";
 
	# Création du numero d'identification du caractère
	my $num;
	for (my $i=0;$i<=$#champs;$i++){
	
		if($champs[$i] eq 'DIV'){

			if ($words[$i]=~/\d\d/) {$num.="$words[$i]";}
			
			else{
				$num.="0$words[$i]";}
		}
	}
	chomp($num);
	
	if ($num=~/\d{2,}/){
		$print=1;
	}
	#~ $sinos=$words[$key];
	#~ if (exists($sin{"$sinos"})){$print=0;}
	#~ $sin{$sinos}=1;
	
	#~ else{
		 if ($listeUnique eq "oui") {$num= " ";}
	$output.="\"$num\",";
	#~ }
	for (my $i=0;$i<=$#champs;$i++){
		 if ( ($champs[$i] ne'NULL') && ($champs[$i] ne'key') && ($champs[$i] ne'DIV') ) {
			$output.= "\"$words[$i]\",";
		 }
	}

# On enlève la dernière virgule 
	chop($output);
	$output.=")),";
	if ($print ==1) {print OUT $output;}
}
$output="";
$output.=");";
$output.='$'.$nomliste.' = new liste;
$'.$nomliste.'->feedList($dataList,$champs,$champsDiv);
$'.$nomliste.'->champs = $champs;
$'.$nomliste.'->champsDiv=$champsDiv;\n?>';

close IN;
print OUT $output;
close OUT;
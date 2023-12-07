<?php session_start(); 



// ------ FUNCTION QUI GENERE NUMBER


$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}

// ------ FUNCTION QUI GENERE NUMBER





if(isset($_POST['nom1'])){
	

		// --------------------- DATE SETTING
		// DATE SELECTED
		// $dateSelected   = date_create($_POST['date1']);
		// $dateSelected2  = date_format($dateSelected ,"d-m-Y");
		// DATE SELECTED    
	
		// $dateOk          = $dateSelected2;
		// $dateToday       =  date('d-m-Y');
		// $dateToday_plus1 =  date("d-m-Y", strtotime($dateToday.'+ 1 days'));
		// $dateToday_plus2 =  date("d-m-Y", strtotime($dateToday.'+ 2 days'));
		// $dateToday_plus3 =  date("d-m-Y", strtotime($dateToday.'+ 3 days'));
		// $dateToday_plus4 =  date("d-m-Y", strtotime($dateToday.'+ 4 days'));
		// $dateToday_plus5 =  date("d-m-Y", strtotime($dateToday.'+ 5 days'));
	
		/* 

		if($dateSelected2 == $dateToday){
			$dateOk = "aujourd'hui (".$dateSelected2.")";
		}
		if($dateSelected2 == $dateToday_plus1){
			$dateOk = "Demain (".$dateSelected2.")";
		}
	
		if($dateSelected2 == $dateToday_plus2){
			$dateOk = "Dans 2 jours (".$dateSelected2.")";
		}
	
		if($dateSelected2 == $dateToday_plus3){
			$dateOk = "Dans 3 jours (".$dateSelected2.")";
		}
	
	
		if($dateSelected2 == $dateToday_plus4){
			$dateOk = "Dans 4 jours (".$dateSelected2.")";
		}
	
	
		if($dateSelected2 == $dateToday_plus5){
			$dateOk = "Dans 5 jours (".$dateSelected2.")";
		}
		
		*/

		// --------------------- END DATE SETTING
	



	$idResa_OK 				= 	generate_string($permitted_chars, 7);

	// $destination 			=  	$_POST['destination'];
	// $heure					=  	$_POST['heure'];

	//$nb_personne			=  	$_POST['nb-pers'];

	// $adress1				=  	htmlspecialchars($_POST['adress1'],ENT_QUOTES, 'UTF-8');
	//$adress2				=  	htmlspecialchars($_POST['adress2'],ENT_QUOTES, 'UTF-8');


	$sujetDemande 				=  	htmlspecialchars($_POST['sujetDemande'],ENT_QUOTES, 'UTF-8');

	$nom1 						=  	htmlspecialchars($_POST['nom1'],ENT_QUOTES, 'UTF-8');

	$telephone1 				=  	htmlspecialchars($_POST['telephone1'],ENT_QUOTES, 'UTF-8');

	$email1 					=  	htmlspecialchars($_POST['email1'],ENT_QUOTES, 'UTF-8');

	$message1 					=  	htmlspecialchars($_POST['message1'],ENT_QUOTES, 'UTF-8');





	$domaineName3 = $_SERVER['SERVER_NAME'] ;

	// ____SEARCH WWW

	$str1           = $domaineName3;
	$pattern1       = "/www/i";
	$result1        = preg_match($pattern1, $str1);

	if($result1 ==1){
		$str2           = $domaineName3;
		$pattern2       = '/www/i';
		$namePage =  preg_replace($pattern2, '', $str2);
	}
	// ____SEARCH WWW


	// ____SEARCH FR

	$str3           = $domaineName3;
	$pattern3       = "/fr/i";
	$result3        = preg_match($pattern3, $str3);

	if($result3 ==1){
		$str4           = $domaineName3;
		$pattern4       = '/fr/i';
		$namePage       =  preg_replace($pattern4, '', $str4);
	}


			$bcc 		= 'noahvaldacci@gmail.com';
			$to 		= $email1;
			$from		= "contact@eeva-photographie.fr/";


			ini_set("SMTP","smtp.gmail.com");
			$JOUR 		= date("Y-m-d");
			$HEURE 		= date("H:i");
			$subject 	= 'Nouvelle demande d\' infos | Eeva Photographie ';

	   		$mail_Data = "";
	   		$mail_Data .= "<html> \n";
	   		$mail_Data .= "<head> \n";
	   		$mail_Data .= "<title> K.com</title> \n";
	   		$mail_Data .= "</head> \n";
	   		$mail_Data .= "<body> \n";
		
			
	
			// Infos destination
			//$mail_Data .="<p>"."<b>"."Destination : "."</b>".$destination."</p>";

	
			// Date de départ
			// $mail_Data .="<p>"."<b>"."Date de départ : "."</b>".$dateOk ."</p>";


			// Heure de départ
			// $mail_Data .="<p>"."<b>"."Heure de départ : "."</b>".$heure."</p>";

			
			// Nombre de pers.
			// $mail_Data .="<p>"."<b>"."Nombre pers. : "."</b>".$nb_personne."</p>";

			

			// Adresse 1
			// $mail_Data .="<p>"."<b>"."Adresse de départ : "."</b>".$adress1."</p>";


			// Adresse 2
			// $mail_Data .="<p>"."<b>"."Adresse d'arrivé : "."</b>".$adress2."</p>";



			// Sujet demande
			$mail_Data .="<p>"."<b>"."Sujet : "."</b>".$sujetDemande."</p>";


			// Infos personnes

	   		$mail_Data .="<p>"."<b>"."Nom & prénom : "."</b>".$nom1."</p>";
	   		$mail_Data .="<p>"."<b>"."Téléphone : "."</b>".$telephone1 ."</p>";     		
	   		$mail_Data .="<p>"."<b>"."Email : "."</b>".$email1."</p>"; 		


	   		// Num. réservation

	   		$mail_Data .="<p>"."<b>"."Demande # : </b> id-".$idResa_OK ."</p>";



	   		// Message

	   		$mail_Data .="<p>"."<b>"."Message  : "."</b>".$message1."</p>";


			$mail_Data .='<p>Envoyé depuis le site <a href="https://www.eeva-photographie.fr/">Eeva Photographie</a></p>';				
	   		$mail_Data .= "<br> \n";
	   		$mail_Data .= "</body> \n";
	   		$mail_Data .= "</HTML> \n";

	   		$headers  = "MIME-Version: 1.0\r\n";
	   		$headers .= "Content-type: text/html; charset=iso-8859-1 \n";
	   		$headers .= 'Content-Transfer-Encoding: 8bit'."\r\n";
	   		$headers .= "From: $from  \n";
			$headers .= "Bcc: $bcc  \n";

	   		$headers .= "Disposition-Notification-To: $from  \n";

	   // Message de Priorité haute

	   // -------------------------

	   $headers .= "X-Priority: 1  \n";
	   $headers .= "X-MSMail-Priority: High \n";
	   $CR_Mail = TRUE;
	   $CR_Mail = @mail ($to,utf8_decode($subject), utf8_decode($mail_Data), $headers);
	   $message = "";


	   $_SESSION['idResa'] = $idResa_OK ;


	   header('location:confirmation-envoi.html');

}


?>
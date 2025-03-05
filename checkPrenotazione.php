
<?php
	require 'phpmailer/includes/PHPMailer.php';
	require 'phpmailer/includes/SMTP.php';
	require 'phpmailer/includes/Exception.php';
  
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	$mail = new PHPMailer();

	$mail->isHTML(true);

if(isset($_POST['action'])) {

    switch($_POST['action']) {
      case 'prenota' :
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sito";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            echo '
            <script type="text/JavaScript"> 
            swal("Errore Database","Connessione al database fallita", "error");
            </script>     
';
        die("Connection failed: " . mysqli_connect_error());
        }


        $cognome = $_POST['cognome'];
        $phone = $_POST['phone'];
        $email =$_POST['email'];
        $persone =  $_POST['persone'];
        $n_persone = $persone;
        $orario =  $_POST['ora'];
        $cognome=ucfirst($cognome);

        $mail->Body = '
  
        <html>
    <head>
    </head>
    <body>

    <h1>Prenotazione Ricevuta!</h1>
    <h2>Il ristorante ha riservato un tavolo per '.$n_persone.' persone a nome '.$cognome.', alle ore '.$orario.'.</h2>
    <p>Cordiali Saluti | MammaSandra & Staff</p>

    </body>
</html>
      

        
        ';

        if (empty($_POST["cognome"]) and empty($_POST["phone"]) and empty($_POST["persone"]) and empty($_POST["orario"])){
            echo "<script type='text/javascript'>
                Swal.fire(
                'Controlla i dati! 🤓',
                'Senza dati non puoi prenotare',
                'warning'
              )</script>";
            break;
        }
        if (empty($_POST["cognome"])){
            echo "<script type='text/javascript'>
            Swal.fire(
            'Controlla i dati! 🤓',
            'Il campo Cognome non può essere vuoto',
            'warning'
          )</script>";
            break;
        }
        
        if (empty($_POST["phone"])){
            echo "<script type='text/javascript'>
            Swal.fire(
            'Controlla i dati! 🤓',
            'Il campo Telefono non può essere vuoto',
            'warning'
          )</script>";
            break;
        }
        
        if (empty($_POST["persone"])){
            echo "<script type='text/javascript'>
            Swal.fire(
            'Controlla i dati! 🤓',
            'Il campo Posti non può essere vuoto',
            'warning'
          )</script>";
            break;
        }
        

        $query="SELECT * FROM prenotazioni WHERE cognome='$cognome' and telefono='$phone' and orario='$orario'";
        $result = mysqli_query($conn, $query); 
        if(!($result->num_rows === 0))
        {
            echo "<script type='text/javascript'>
            Swal.fire(
            'Prenotazione Esistente! 🤔',
            'Hai già prenotato con questi dati alle ore: ".$orario."',
            'warning'
          )</script>";

            mysqli_close($conn);
            break;
        }

        $query="SELECT sum(posti) as 'sum' FROM prenotazioni WHERE orario='$orario'";
        $result_posti = mysqli_query($conn, $query); 
        $sum = $result_posti->fetch_assoc();
        $query="SELECT count(*) as 'count' FROM prenotazioni WHERE orario='$orario'";
        $result_tavoli = mysqli_query($conn, $query); 
        $count = $result_tavoli->fetch_assoc();  
        if ($sum['sum']==40 || $count['count'] == 10){
            
            echo 
            "<script type='text/javascript'>
            Swal.fire(
            'Siamo pieni! 😭',
            'Posti terminati alle ore: ".$orario."',
            'error'
          )</script>";
            

        

        mysqli_close($conn);
        break;

        }
        elseif ($persone <= 40-$sum['sum']){
         
        $tavolo=10;
        $n = $persone/4;
        $whole = floor($n);   //2   
        $fraction = $n - $whole; //.25
        

        if ($fraction > 0){

            $whole=$whole+1;

        }

        $tavolo=$tavolo-$count['count'];
        


        try {
            
            for ($x = 0; $x<$whole; $x++){
               
             
                if ($persone < 4 || 4 == $persone){

                    $sql = "INSERT INTO prenotazioni VALUES ('$cognome','$phone','$persone','$orario','$tavolo','0')";
                    mysqli_query($conn, $sql);
                    $tavolo=$tavolo-1;

                }

                else{
                
                $sql = "INSERT INTO prenotazioni VALUES ('$cognome','$phone','4','$orario','$tavolo','0')";
                mysqli_query($conn, $sql);
                $tavolo=$tavolo-1;
                $persone=$persone-4;
                
            }}

            echo
            "<script type='text/javascript'>
            Swal.fire(
            'Prenotazione Effettuata! 😍',
            '".$cognome." alle ".$orario." per ".$n_persone." persone ',
            'success'
          )</script>";

        ;
        $mail->addAddress($email);
        $mail->send();
        $mail->smtpClose();
        mysqli_close($conn);
        break;

        }
        catch (mysqli_sql_exception $e) {

            
                
                echo '
                <script type="text/JavaScript"> 
                swal("Errore Database","'.$e.'", "error");
                </script>     
';

                mysqli_close($conn);
                break;

            
            

        }

        mysqli_close($conn);
        break;
        }

        else{


            echo '<script type="text/javascript">
            swal("Siamo pieni! 😭","Posti terminati alle ore: '.$orario.'", "error");
            </script>';

        
        mysqli_close($conn);
        break;

        }
        

    }

}
?>

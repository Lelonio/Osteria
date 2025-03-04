
<?php
//Include required PHPMailer files
	require 'phpmailer/includes/PHPMailer.php';
	require 'phpmailer/includes/SMTP.php';
	require 'phpmailer/includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Port = "587";
	$mail->Username = "ristorantemammasandra@gmail.com";
	$mail->Password = "MammaSandra275";
	
	$mail->setFrom('ristorantemammasandra@gmail.com');
	$mail->isHTML(true);


if(isset($_POST['action'])) {

    switch($_POST['action']) {
      case 'prenota' :
        $servername = "localhost";
        $username = "root";
        $password = "emanuele00";
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


        $nome = $_POST['nome-riv'];
        $nomeacq = $_POST['nome-acq'];
        $phone = $_POST['phone'];
        $email =$_POST['email'];
        $menu = $_POST['menu'];
        $persone =  $_POST['persone'];
        $n_persone = $persone;
        $nome=ucfirst($nome);
        $nomeacq=ucfirst($nomeacq);
        $voucher = strtoupper(uniqid());
        $mail->addAddress($email);
        $mail->Subject = "Experience in regalo per te $nome!";
        if($persone > 1){
        $mail->Body = '
  
        <html>
    <head>
    </head>
    <body>


    <h1>Experience Al MammaSandra!</h1>
    <h2>Ciao '.$nome.'!</h2>
    <h3>'.$nomeacq.' ti ha regalato l\'esperienza "'.$menu.'", per '.$n_persone.' persone, da riscattare quando vuoi!</h3>
    <p>Ti basta presentare questo voucher all\'arrivo per iniziare il tuo viaggio nella cucina romana: <span style="text-transform: uppercase; font-size: 20px; font-weight: bold;
    ">'.$voucher.'</span>  </p>


    </body>
</html>
      

        
        ';}

        else{

          $mail->Body = '
  
          <html>
      <head>
      </head>
      <body>
  
  
      <h1>Experience Al MammaSandra!</h1>
      <h2>'.$nomeacq.' ti ha regalato l\'esperienza "'.$menu.'", per '.$n_persone.' persona, da riscattare quando vuoi!</h2>
      <p>Ti basta presentare questo voucher all\'arrivo per iniziare il tuo viaggio nella cucina romana: <span style="text-transform: uppercase; font-size: 20px; font-weight: bold;
      ">'.$voucher.'</span>  </p>
  
  
      </body>
  </html>
        
  
          
          ';


        }

        if (empty($_POST["nome-acq"]) and empty($_POST["nome-riv"]) and empty($_POST["email"]) and empty($_POST["phone"]) and empty($_POST["persone"])){
            echo "<script type='text/javascript'>
                Swal.fire(
                'Controlla i dati! 🤓',
                'Senza dati non puoi prenotare',
                'warning'
              )</script>";
            break;
        }
        if (empty($_POST["nome-acq"])){
            echo "<script type='text/javascript'>
            Swal.fire(
            'Controlla i dati! 🤓',
            'Il campo Nome Acquirente non può essere vuoto',
            'warning'
          )</script>";
            break;
        }

        if (empty($_POST["nome-riv"])){
          echo "<script type='text/javascript'>
          Swal.fire(
          'Controlla i dati! 🤓',
          'Il campo Nome Ricevente non può essere vuoto',
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

        if (empty($_POST["email"])){
          echo "<script type='text/javascript'>
          Swal.fire(
          'Controlla i dati! 🤓',
          'Il campo Email non può essere vuoto',
          'warning'
        )</script>";
          break;
      }



        try {
          

            $sql = "INSERT INTO experience VALUES ('$nome','$phone','$persone','$voucher','$menu')";
            mysqli_query($conn, $sql);

           
            if($persone > 1){
            echo
            "<script type='text/javascript'>
            Swal.fire({
              icon: 'success',
              title: 'Experience Prenotata! 😍',
              text: 'Hai regalato l\'esperienza \"".$menu."\", per ".$n_persone." persone, a ".$nome."! ',
              footer: '".$nome." riceverà un voucher da utilizzare in qualsiasi momento',
              
              confirmButtonColor: '#be6440'
            });
            </script>";}
            else{
              echo
              "<script type='text/javascript'>
              Swal.fire({
                icon: 'success',
                title: 'Experience Prenotata! 😍',
                text: 'Hai regalato l\'esperienza \"".$menu."\", per ".$n_persone." persona, a ".$nome."! ',
                footer: '".$nome." riceverà un voucher da utilizzare in qualsiasi momento',
                confirmButtonColor: '#be6440'
              });
              </script>";

            }

            
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

        }

        

    }


?>

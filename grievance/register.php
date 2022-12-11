<?php
@session_start();
$err = "";
$succ = "";
if(!empty($_POST['username']) && !empty($_POST['role']) && !empty($_POST['gender']) && !empty($_POST['college']) && !empty($_POST['email']) && !empty($_POST['phnum']) && !empty($_POST['pwd'])){
    require_once("register.class.php");
	$obj = new Register();
    $res=$obj->checkRegister($_POST["username"],$_POST['email'],$_POST['phnum']);
    if($res==1){
        $succ = "Your Account Already Existed.";
    }
    else{
        $res1=$obj->registerUser($_POST["username"],$_POST['role'],$_POST['gender'],$_POST['college'],$_POST['email'],$_POST['phnum'],$_POST["pwd"]);
    if($res1==1){
        $succ = "Your Account has been Created.";
    }
    else{
        $err = "Please try again";
    }
    }
}
require_once('header.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reg Form</title>
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.5/css/mdb.min.css" rel="stylesheet">


</head>


<body>
    <!-- Material form register -->
    <div class="">
        <br>
        <div class="row"> 
<div class="col-md-4">
</div>
<div class="col-md-4">
        <!-- Default form register -->
<form class="text-center border border-light p-5" action="register.php" method="POST" onsubmit="validate()">

    <p class="h4 mb-4">Sign up</p>

        <div class="form-row mb-4">
        <div class="col">
            <!--  roll -->
            <input type="text" id="username" class="form-control" placeholder="Roll No/ Username" name="username" required>
        </div>
       
    </div>
     <div class="form-row mb-4">
        <div class="col">
            <select name="role" class="form-control" required>
            	 <option value="" disabled selected>Select your role</option>	
                  <option value="student">Student</option>
                 <option value="staff">Faculty</option>	
                 <option value="parent">Parent</option>
                 <option value="alumni">Alumni</option>
                 <option value="non-teaching staff">Non-teaching Staff</option>
            </select>
    </div>
    </div>
    <div class="form-row mb-4">
        <div class="col">
            <select name="gender" class="form-control" required>
            	 <option value="" disabled selected>Select your gender</option>	
                  <option value="male">Male</option>
                 <option value="female">Female</option>	
            </select>
    </div>
    </div>
    <div class="form-row mb-4">
        <div class="col">
            <input class="form-control" list="datalistOptions" name="college" placeholder="Type to search college...">
<datalist id="datalistOptions" class="form-control-lg"><!--Enter College details here-->
  <option value='0-JNTUA College Of Engineering(Autonomous)-JNTUACEA
  Ananthapuramu District
  Pincode:515 002'>
  <option value='9-Rajeev Gandhi Memorial College of Engineering -NH - 18
  Nandyal
  Ananthapuramu District
  Pincode:518 501'>
  <option value='0A-JNTU Anantapur -JNTUA
  Anantapur
  Ananthapuramu District
  Pincode:515 002'>
  <option value='12-Sree Vidyanikethan Engineering College (Autonomous) -Sree Sainath Nagar, A.Rangampet
  Chandragiri Mandal, Near Tirupati
  Chittoor District
  Pincode:517 102'>
  <option value='19-JNTU College of Engineering Pulivendula -Pulivendula
  Kadapa
  Y S R District
  Pincode:516 390'>
  <option value='2F-Akshaya Bharathi Institute of Technology -R S Nagar, Siddavatam (P&M)
  Kadapa
  Y S R District
  Pincode:516 237'>
  <option value='2G-Anantha Lakshmi Institute of Technology & Science -Near SK University
  Itikalapalli (V)
  Ananthapuramu District
  Pincode:515 271'>
  <option value='2H-Audisankara Institute of Technology -NH - 5, By Pass Road
  Aravinda Nagar  East Gudur (M)
  SPSR Nellore District
  Pincode:524 101'>
  <option value='2J-AVR & SVR Engineering College -Nannur (V)
  Orvakal (M)
  Kurnool District
  Pincode:518 002'>
  <option value='2K-Bheema Institute of Technology & Science -Alur Road
  Adoni (M)
  Kurnool District
  Pincode:518 301'>
  <option value='2M-Brahmaiah College of Engineering -NH - 5, North Rajupalem (V)
  Kodavalur (M)
  SPSR Nellore District
  Pincode:524 366'>
  <option value='2N-Brindavan Institute of Technology & Science -NH - 7
  Peddatekur
  Kurnool District
  Pincode:518 218'>
  <option value='2P-Chaitanya Bharathi Institute of Technology -Vidyanagar, Pallavolu
  Proddatur, Kadapa
  Y S R District
  Pincode:516 360'>
  <option value='2Q-Chadalawada Venkata Subbaiah College of Engineering -Chadalawada Nagar
  Renigunta Road, Tirupathi
  Chittoor District
  Pincode:517 506'>
  <option value='2R-Chiranjeevi Reddy Institute of Engg & Tech-Bellary Road
  Rachana Palli (V)
  Ananthapuramu District
  Pincode:515 004'>
  <option value='2T-Dr  K V  Subba Reddy College of Engg for Women -Opp Dupadu, Railway Station
  NH - 7, Laxmipuram Post Kallur
  Kurnool District
  Pincode:518 218'>
  <option value='2U-Geethanjali Institute of Science & Technology -3rd Mile, Bombay Highway
  Gangavaram (V&P), Kovur (M)
  SPSR Nellore District
  Pincode:524 137'>
  <option value='38-Sri Kalahastheeswara Institute of Technology -Bypass Road, Panagal
  Srikalahasthi 
  Chittoor District
  Pincode:517 640'>
  <option value='3A-Global College of Engineering & Technology -Chinnamachupalli (P), Near Satellite City
  Chennur (M), Kadapa 
  Y S R District
  Pincode:516 162'>
  <option value='3C-Indira Priyadarshini College of Engg & Tech for Women-Indira Priyadarshini College of Engineering & Technology for Women 
  Nannur (V)
  Oravakal (M), NH - 18
  Kurnool District
  Pincode:518 002'>
  <option value="3D-J B  Women's Engineering College -Daminedu (V), Renigunta Road
  Tirupathi 
  Chittoor District
  Pincode:517 506">
  <option value="3E-Jagan's College of Engineering & Technology -Choutapalem
  Venkatachalam (M)
  SPSR Nellore District
  Pincode:524 320">
  <option value='3F-K K C  Institute of Technology & Engineering - KKC Nagar
  Parameswara Mangalam (V), Puttur 
  Chittoor District
  Pincode:517 583'>
  <option value='3G-KMM Institute of Technology & Science -Ramireddipalle
  Tirupati
  Chittoor District
  Pincode:517 102'>
  <option value='3H-K L M C E W , Kadapa-Kandula Lakshumma Memorial College of Engineering for Women 
  Thadigotla (V)
  C K Dinne (M)
  Y S R District
  Pincode:516 003'>
  <option value='3J-Kottam Karunakara Reddy Institute of Technology -Chinnatekuru (V)
  Kallur (M)
  Kurnool District
  Pincode:518 218'>
  <option value='3K-Balaji Inst  of Engg and Management Studies -Near Ramanna Palem
  Kodavaluru(M)
  SPSR Nellore District
  Pincode:524 366'>
  <option value='3M-Modugula Kalavathamma Institute of Tech for Women -New Boyanapalli
  Rajampet
  Y S R District
  Pincode:516 126'>
  <option value='3N-PVKK Institute of Technology -Alamur (P), Sanapa Road
  Rudrampet
  Ananthapuramu District
  Pincode:515 001'>
  <option value='3P-Priyadarshini Institute of Technology -C Ramachadrapuram
  Tirupathi
  Chittoor District
  Pincode:517 561'>
  <option value='3Q-Rajoli Veera Reddy Padmaja Engg College for Women -Pulivendula Road, Tadigotla (V)
  C K Dinne (M)
  Y S R District
  Pincode:516 003'>
  <option value='3R-Rami Reddy Subbarami Reddy Engineering College -NH - 5, Kadanuthala (V)
   Bogole(M), Kavali
  SPSR Nellore District
  Pincode:524 142'>
  <option value='3T-Ravindra College of Engineering for Women -Pasupula (V), Nandikotkur Road
  Near Venkayapalli
  Kurnool District
  Pincode:518 452'>
  <option value='3U-Seshachala Institute of Technology -Tirupathi - Chennai High Way
  Kanakampalam (V), Puttur 
  Chittoor District
  Pincode:517 583'>
  <option value='42-Sri Padmavathi School of Pharmacy -Mohan Garden Vaishnavi Nagar
  Tiruchanoor(P) Tirupathi 
  Chittoor District
  Pincode:517 503'>
  <option value='44- P Rami Reddy Memorial College of Pharmacy -1-35, Prakruthi Nagar
  Kadapa
  Y S R District
  Pincode:516 003'>
  <option value='4A-Shree Institute of Technical Education -Krishna Puram (V)
  Renigunta (M)
  Chittoor District
  Pincode:517 619'>
  <option value='4C-Sree Rama Engineering College -Rami Reddy Nagar, Karakambaadi Road
  Tirupathi
  Chittoor District
  Pincode:517 507'>
  <option value='4D-Shri Sai Institute of Engineering & Technology -NH - 44, Vadiyampeta (P), Podaralla (V)
  Bukkarayasamudram (M)
  Ananthapuramu District
  Pincode:515 731'>
  <option value='4E-Siddhartha Institute of Science and Technology -Siddhartha Nagar, Narayanavanam Road
  Puttur
  Chittoor District
  Pincode:517 583'>
  <option value='4F-Sri Raghavendra Institute of Science & Technology -Kavali-Udayagir Road
  Vinjamur (M)
  SPSR Nellore District
  Pincode:524 228'>
  <option value='4G-Srinivasa Ramanujan Institute of Technology -Rotarypuram (V)
  B K  Samudram(M)
  Ananthapuramu District
  Pincode:515 701'>
  <option value='4H-Sri Chaitanya Institute of Engineering & Technology -NH - 44, Loluru (V)
  Singinamala (M)
  Ananthapuramu District
  Pincode:515 731'>
  <option value='4J-Swetha Institute of Technology & Science -C Ramapuram
  Ramachandra puram
  Chittoor District
  Pincode:517 561'>
  <option value='4K-Syamaladevi Institute of Technology for Women -Opp   Santhiram General Hosiptal
  Nandyal
  Kurnool District
  Pincode:518 501'>
  <option value='4M-Vemu Institute of Technology -P Kotha kota
  (Near Pakala)
  Chittoor District
  Pincode:517 112'>
  <option value='4N-Visvodaya Engineering College -Visvodaya Campus
  Udayagiri Road, Kavali
  SPSR Nellore District
  Pincode:524 201'>
  <option value='4P-Yogananda Institute of Technology & Science -Mohan Reddy Nagar, Elamandyam (V)
   Renigunta (M), Tirupati
  Chittoor District
  Pincode:517 520'>
  <option value='4Q-Narayana Pharmacy College -Chinthareddypalem
  Nellore
  SPSR Nellore District
  Pincode:524 003'>
  <option value='4R-Prabhath Institute of Pharmacy -Parnapally (V) Bandi Atmakur (M)
  Nandyal
  Kurnool District
  Pincode:518 523'>
  <option value='4T-Sri Lakshmi Venkateswara Inst  of Pharma  Sciences -Sri Lakshmi Venkateswara Institute of Pharmaceutical Sciences 
  Peddasettypalli 
  Proddatur
  Y S R District
  Pincode:516 361'>
  <option value='4U-Vasavi Institute of Pharmaceutical Sciences -Vasavi Nagar Peddapalli (V)
  Near Bhakarapet Railway Station Sidhout (M), Kadapa
  Y S R District
  Pincode:516 247'>
  <option value='5K-Bharath College of Engg & Tech for Women -Buggaletipalli (V&P), C K Dinne (M)
  Royachoty Road
  Y S R District
  Pincode:516 003'>
  <option value='5M-Fathima Institute of Technology & Management -Ramarajupalli, Pulivendual Road
  Kadapa 
  Y S R District
  Pincode:516 003'>
  <option value='5N-Annamacharya P G  College of Computer Studies -New Boyanapalli
  Rajampet (M)
  Y S R District
  Pincode:516 126'>
  <option value='5P-Annamacharya P G  College of Management Studies -New Boyanapalli
  Rajampet (M)
  Y S R District
  Pincode:516 126'>
  <option value='69-Madanapalle Institute of Technology & Science -P B No  14, Angallu Village
  Madanapalle
  Chittoor District
  Pincode:517 325'>
  <option value='70-Annamacharya Inst  of Tech & Sciences (Autonomous)-Tallapaka Panchayath, New Boyanapalli
  Rajampet (M)
  Y S R District
  Pincode:516 125'>
  <option value='71-Narayana Engineering College -AK Nagar (P), Narayana Avenue
  Muthukur Road
  SPSR Nellore District
  Pincode:524 004'>
  <option value='72-Madina Engineering College -Near Air Port
  Kamalapuram Road, Kadapa
  Y S R District
  Pincode:516 003'>
  <option value='73-PBR Visvodaya Institute of Technology & Science -Visvodaya Campus
  Udayagiri Road, Kavali 
  SPSR Nellore District
  Pincode:524 201'>
  <option value='74-Intell Engineering College -Akkampally Cross Road
  Kalyan Durg Road
  Ananthapuramu District
  Pincode:515 004'>
  <option value='75-SITAMS (Autonomous), Chittoor-Sreenivasa Institute of Technology & Management Studies (Autonomous)
  Dr  Visweswaraiah Road, (Bangalore -Tirupathi By - pass Road)
  Murukambattu (P)
  Chittoor District
  Pincode:517 127'>
  <option value='78-Sri Venkateswara College of Engg & Tech(Autonomous)-Sri Venkateswara College of Engineering & Technology(Autonomous)
  RVS Nagar
  Chittoor
  Chittoor District
  Pincode:517 127'>
  <option value='8P-Aditya College of Engineering -Punganur Road, Valasapalli (PO)
  Madanapalle
  Chittoor District
  Pincode:517 325'>
  <option value='8Q-Acharya College of Engineering -D Agraharam (V), B Mattam (M)
   Badvel, Kadapa
  Y S R District
  Pincode:516 502'>
  <option value='8R-Balaji Institute of Technology & Science -Balaji Nagar, Lingapuram, Thallamapuram Road
  Khaderabad Post, Proddatur
  Y S R District
  Pincode:516 362'>
  <option value='8T-Damisetty Bala Suresh Institute of Technology -NH - 5, D S  Naidu Nagar, Near Industrial Estate, Maddurupadu (V)
  Kavali (M)
  SPSR Nellore District
  Pincode:524 203'>
  <option value='8U-Goutami Institute of Tech & Management for Women -Sai Nagar, Peddasettypalli (P)
  Proddatur (M)
  Y S R District
  Pincode:516 360'>
  <option value='8W-KSN Institute of Technology -Kovur (V)
  Kovur (M)
  SPSR Nellore District
  Pincode:524 137'>
  <option value='8X-M J R  College of Engineering & Technology -Diguvapokalavaripalli
  Pulicherla (M)
  Chittoor District
  Pincode:517 113'>
  <option value='8Y-Narayanadri Institute of Science & Technology -Venkatapalli Road, Near Govt  Degree College
  Rajampet
  Y S R District
  Pincode:516 113'>
  <option value='8Z-Priyadarshini Institute of Technology -AK Nagar Post
  Nellore
  SPSR Nellore District
  Pincode:524 004'>
  <option value='9A-Shri Shirdi Sai Institute of Science & Engineering -NH - 44, Vadiyampeta (P), Podaralla (V)
  Bukkarayasamudram (M)
  Ananthapuramu District
  Pincode:515 731'>
  <option value='9B-Sir C V  Raman Institute of Technology & Sciences -Behind Bharat Petroleum Bunk
  Anantapur Road, Tadipatri
  Ananthapuramu District
  Pincode:515 411'>
  <option value='9C-SKR College of Engineering & Technology -# NH - 5, Konduru Satram (V)
  Manubolu (M)
  SPSR Nellore District
  Pincode:524 405'>
  <option value='9D-Sri Padmavathi Engineering College -Musunur (V)
  Kavali (M)
  SPSR Nellore District
  Pincode:524 201'>
  <option value='9E-Sri Venkateswara Engineering College for women -Karakambadi Road
  Tirupati
  Chittoor District
  Pincode:517 507'>
  <option value='9F-Sri Venkateswara Institute of Technology -NH - 44, Hampapuram (V)
  Rapthadu (M)
  Ananthapuramu District
  Pincode:515 722'>
  <option value='9G-Sreenivasa College of Engineering & Technology -Bangalore Highway, NH - 44
  Near Sakshi Office, Lakshmi Puram
  Kurnool District
  Pincode:518 218'>
  <option value='9H-Srinivasa Institute of Technology & Science -Chennai - Hyderabad Bypass Road
  Ukkayapalli (V)
  Y S R District
  Pincode:516 002'>
  <option value='9J-Vaishnavi Institute of Technology for women -Kuntrapakam (V&P)
  Tirupathi 
  Chittoor District
  Pincode:517 561'>
  <option value='9K-Vignana Bharathi Institute of Technology -Vidyanagar
  Proddatur
  Y S R District
  Pincode:516 360'>
  <option value='9L-Siddartha Educational Academy Group of Institutions -Chinthagunta (V), Near C  Gollapallli
  Tirupati
  Chittoor District
  Pincode:517 505'>
  <option value="9M-Bharath Educational Society's Group of Institutions -NH - 205, Angallu Post
  Madanapalle
  Chittoor District
  Pincode:517 325">
  <option value='9N-Swathi College of Pharmacy -Near Nellore Toll Plaza
  Venkatachalam (PO) & (M)
  SPSR Nellore District 
  Pincode: 524 320'>
  <option value='9P-Sun Institue of Pharmaceutical Education & Research -Kakupalli (V)
  Nellore Rural (M)
  SPSR Nellore District
  Pincode:524 346'>
  <option value='9Q-Audisankara College of P G  Studies  -Nh-5 Bypass Road, Aravinda Nagar
  Gudur (M)
  SPSR Nellore District
  Pincode:524 101'>
  <option value='9R-Balaji Institute of I T & Management  -Opp  To Old Bypass Road
  Chinnachowk
  Y S R District
  Pincode:516 002'>
  <option value='9T-Madhura Sai Institute of It & Management -Peddasetti (V)
  Proddatur (M)
  Y S R District
  Pincode:516 360'>
  <option value='9U-Sri Srinivasa Institute of Management  -Ravivenkatam Palli (V)
  Tadipatri
  Ananthapuramu District
  Pincode:515 411'>
  <option value='9W-Vasavi Institute of Management & Computer Sciences -Vasavi Nagar, Peddapalli (V)
  Near Bhakarapet Railway Station, Sidhout (M)
  Y S R District
  Pincode:516 247'>
  <option value='9X-G Pulla Reddy Engineering College (Autonomous)-Pulla Reddy Nagar
  Nandyal Road
  Kurnool District
  Pincode:518 007'>
  <option value='9Y-K S R M College of Engineering -Yerramasupalli (V)
  Chintakomma Dinne (M)
  Y S R District
  Pincode:516 003'>
  <option value='AF-Krishnateja Pharmacy College -Chadalawada Nagar
  Renigunta Road Tirupati
  Chittoor District
  Pincode:517 506'>
  <option value='AK-Annamacharya Institute of Technology & Sciences -Venkatapuram (V), Karkambadi (P)
  Renigunta (M), Tirupathi
  Chittoor District
  Pincode:517 520'>
  <option value='AM-AVR & SVR College of Engineering & Technology -Ayyalur (V)
  Nandyal (M)
  Kurnool District
  Pincode:518 502'>
  <option value='AT-G Pullaiah College of Engineering & Technology -Pasupala (V)
  Nandikotkur Road
  Kurnool District
  Pincode:518 452'>
  <option value='BC-Kandula Obul Reddy Memorial College of Engineering -Tadigotla (V)
  Chintakomma Dinne (M)
  Y S R District
  Pincode:516 003'>
  <option value='BF-Sri Venkateswara College of Engineering -Karakambadi Road
  Tirupathi
  Chittoor District
  Pincode:517 507'>
  <option value='BG-Sri Venkateswara Institute of Science & Technology -Pulivendula Road, Tadigotla (V)
  C K Dinne (M)
  Y S R District
  Pincode:516 003'>
  <option value='BM-Stanely Stephen College of Engineering & Technology -Panchalingala (V)
  Kurnool
  Kurnool District
  Pincode:518 004'>
  <option value='BP-Vaishnavi Institute of Technology -Tanapalli (V), Kuntrapakam (Post)
  Tirupathi
  Chittoor District
  Pincode:517 561'>
  <option value='CN-S Chaavan College of Pharmacy -Jangalakandriga (V) 
  Muthukur (M)
  SPSR Nellore District
  Pincode:524 346'>
  <option value='CP-Seshachala College of Pharmacy -Tirupati-Chennai Highway,
  Puttur
  Chittoor District 
  Pincode: 517 583'>
  <option value='CQ-Seven Hills College of Pharmacy -Venkataramapuram (V) Tanapalli 
  Ramachandrapuram (M)
  Chittoor District
  Pincode:517 561'>
  <option value='DC-Srinivasa Institute of Pharmaceutical Sciences -Sri Chowdeswari Nagar
  Peddasettypalli Proddatur 
  Y S R District
  Pincode: 516 361'>
  <option value='DJ-Sasikanth Reddy College of Pharmacy -North Rajupalem 
  Kodavalur (M)
  SPSR Nellore District
  Pincode: 524 316'>
  <option value='DK-Saastra College of Pharma  Edu  & Research -Varigoda (V)
  Totapali Gudur (M)
  SPSR Nellore District
  Pincode:524 311'>
  <option value='DM-Ratnam Institute of Pharmacy -Pidathapolur (V & P)
  Muthukur (M)
  SPSR Nellore District
  Pincode:524 346'>
  <option value='E8-Alfa College of Engineering & Technology -NH - 18, Kandukuri Metta
  Allagadda
  Kurnool District
  Pincode:518 543'>
  <option value='EA-St  John"s College of Pharmaceutical Sciences -Yerrakota (V&P)
  Yemmiganur (M)
  Kurnool District
  Pincode:518 360'>
  <option value='EH-Kottam College of Engineering -Chinnatekuru (V)
  Kalluru (M)
  Kurnool District
  Pincode:518 218'>
  <option value='ER-Dr K V Subba Reddy Institute of Pharmacy -Opp  Dupadu Railway Station NH - 7
  Laxmipuram (P) Kallur (M)
  Kurnool District
  Pincode:518 218'>
  <option value='F1-Narayana Engineering College -Durjati Nagar
  Gudur
  SPSR Nellore District
  Pincode:524 101'>
  <option value='F2-Gates Institute of Technology -NH - 44, Gooty Ananthapuramu (V)
  Peddavadugur (P), Gooty
  Ananthapuramu District
  Pincode:515 401'>
  <option value='F3-BIT Institute of Technology -Survey No  284/1
   BIT (B O ), Hindupur
  Ananthapuramu District
  Pincode:515 201'>
  <option value='F4-Kuppam Engineering College -K E S  Nagar
  Pedda Banga Natham (V), Kuppam
  Chittoor District
  Pincode:517 425'>
  <option value='F5-Intellectual Institute of Technology -Gotkur (V), Kuderu (M)
  Bellary Road
  Ananthapuramu District
  Pincode:515 711'>
  <option value='F6-Siddharath Institute of Engineering & Technology -Siddharth Nagar, Narayanavanam Road
  Puttur
  Chittoor District
  Pincode:517 583'>
  <option value='F7-Sri Sai Institute of Technology & Science -Gollapalli (V), Masapeta
  Rayachoti
  Y S R District
  Pincode:516 270'>
  <option value='F8-Gokula Krishna College of Engineering -Behind RTC Depot
  Sullurpet
  SPSR Nellore District
  Pincode:524 121'>
  <option value='FH-Dr  K V  Subba Reddy Institute of Technology -Opp Dupadu Railway Station
  Lakshmipuram (P)
  Kurnool District
  Pincode:518 218'>
  <option value='FN-Fathima Institute of Pharmacy -Ramarajupalli 
  Pulivendula Road, Kadapa
  Y S R District
  Pincode:516 003'>
  <option value='G0-Sri Venkatesa Perumal College of Engg & Tech -RVS Nagar, Chinnaraja Kuppam
  K N  Road, Puttur 
  Chittoor District
  Pincode:517 583'>
  <option value='G1-Priyadarshini College of Engineering -Akkampeta
  Sullurpet
  SPSR Nellore District
  Pincode:524 121'>
  <option value='G2-Audishankara College of Engg & Tech (Autonomous) -Aravinda Nagar, NH - 5
  By-pass Road, Gudur (M)
  SPSR Nellore District
  Pincode:524 101'>
  <option value="G3-St  John's College of Engineering and Technology -Yerrakota
  Yemmiganur
  Kurnool District
  Pincode:518 360">
  <option value='G4-Oil Technological Research Institute -Jawaharlal Nehru Technological University Anantapur
  Near Collectorate
  Ananthapuramu District
  Pincode:515 001'>
  <option value='G8-Sri Krishna Devaraya Engineering College -NH - 44, Gootyananthapuramu (V)
  Peddavaduguru (M)
  Ananthapuramu District
  Pincode:515 401'>
  <option value='G9-Nirmala College of Pharmacy -DNo3/166-A Madras Road 
  Putlampalli(V)
  Y S R District
  Pincode:516 002'>
  <option value='GT-Sree Venkateswara College of Pharmacy -RVS Nagar
  Tirupathi Road
  Chittoor District
  Pincode:517 127'>
  <option value='H0-AVS College of Engineering & Technology -AVS Nagar, Verannakanupur (V)
  Venkatachalam (M)
  SPSR Nellore District
  Pincode:524 320'>
  <option value='HC-Santhiram College of Pharmacy -NH - 18 Panyam Post
  Nandyal
  Kurnool District
  Pincode:518 112'>
  <option value='HD-Sri Sai College of It & Management -Buddayapalli
  Kadapa
  Y S R District
  Pincode:516 002'>
  <option value='HE-Sharada Post-Grad  Inst  of Research & Tech Sciences-D No  95/35, Dattapuri, Near Industrial Estate
  Rims Road
  Y S R District
  Pincode:516 004'>
  <option value='HF-Noble College of Computer Sciences -Sy No 812/1a,1b, Musunur (V)
  Kavali (M)
  SPSR Nellore District
  Pincode:524 202'>
  <option value='HG-Master Institute of Management Science & Technology -Santhinagar
  Kavali
  SPSR Nellore District
  Pincode:524 201'>
  <option value='HH-Sri Datta Sai College of MCA -Kopparthi, C K Dinne (M)
  Kadapa
  Y S R District
  Pincode:516 003'>
  <option value='HJ-Sri Rama Krishna Institute of Technology -# 7/321-A
  Mochampet
  Y S R District
  Pincode:516 001'>
  <option value='HK-K S R M College of Management Studies -Tadigotla (V)
  Chintakommadinne (M)
  Y S R District
  Pincode:516 003'>
  <option value='HL-KSRM College of Engineering -Thadigotla (V)
  C K  Dinne (M)
  Y S R District
  Pincode:516 003'>
  <option value='HM-Annamacharya Institute of Technology & Sciences -Behind R office, Utukur (P)
  Chintakomma Dinne (V&M), Kadapa
  Y S R District
  Pincode:516 003'>
  <option value='HN-Atmakur Engineering College -Nellorepalem (V)
  Atmakur (M)
  SPSR Nellore District
  Pincode:524 322'>
  <option value='HP-Audisankara College of Engineering for Women -Potu Palame, NH - 5, Bypass Road
  Aravinda Nagar, Gudur (M)
  SPSR Nellore District
  Pincode:524 101'>
  <option value='HQ-Dr  Y S  Rajasekhar Reddy Inst  of Engg & Tech -Chennur Road
  Chinnamachupalli (V), Kadapa 
  Y S R District
  Pincode:516 162'>
  <option value='HR-Mother Theresa Institute of Engineering & Technology -Melumoi (V & P), Gangavaram (M)
  Palamaner
  Chittoor District
  Pincode:517 408'>
  <option value='HT-Sai Sakthi Engineering College -Maharajapuram(V), Kanakammachatram (PO)
  Vijayapuram (M), via Nagari
  Chittoor District
  Pincode:631 204'>
  <option value='HU-Tadipatri Engineering College -Veerapuram (V), Kadapa Road
  Tadipatri
  Ananthapuramu District
  Pincode:515 411'>
  <option value='HW-Mahathi College of Pharmacy -Madanapalle Road Railway Station
  CTM X Roads, Madanapalle 
  Chittoor District
  Pincode:517 319'>
  <option value='HX-Sanskrithi School of Business -Behind Super Speciality Hosiptal, Beedupalli Road
  Prasanthi Gram, Puttaparthi
  Ananthapuramu District
  Pincode:515 134'>
  <option value='HY-Sree Vyshnavi MBA College -Near Kalwa Gadda Anjaneya Swamy Temple
  Gooty
  Ananthapuramu District
  Pincode:515 401'>
  <option value='HZ-Sumourya Institute of Management -B  Thandrapadu
  Nandyal Road
  Kurnool District
  Pincode:518 002'>
  <option value='JA-Seshachala Venkata Subbaiah PG College -Nagari Road
  Puttur
  Chittoor District
  Pincode:517 583'>
  <option value='JB-Vignanasudha Institute of Management & Technology -#22-977/3, Muruganipalli Road
  Kattamanchi
  Chittoor District
  Pincode:517 001'>
  <option value='JC-Bheemi Reddy Institute of Management Science -Mandigiri (V), Alur Road
  Adoni 
  Kurnool District
  Pincode:518 301'>
  <option value='JD-St Mark Educational Inst  Society Group of Inst -Rachanapalli
   Bellary Road
  Ananthapuramu District
  Pincode:515 001'>
  <option value='JE-Sree Rama Educational Society Group of Institutions -Ramiressy Nagar, Karakambadi Road
  Tirupati Urban Mandal, Tirupati
  Chittoor District
  Pincode:517 507'>
  <option value='JF-St  Mark Educational Inst  Society Group of Inst -Bellary Road
  Rachana Palli
  Ananthapuramu District
  Pincode:515 004'>
  <option value='JG-Sri Venkateswara College of Computer Sciences -RVS Nagar
  Tirupathi Road
  Chittoor District
  Pincode:517 127'>
  <option value='JH-Dr  K  V  Subba Reddy Institute of Management -Opp: Dupadu Railway Station, NH - 44
  Lakshmi Puram (P)
  Kurnool District
  Pincode:518 218'>
  <option value='JJ-Dr  K  V  Subba Reddy Institute of MCA  -Opp: Dupadu Railway Station, NH - 44
  Lakshmi Puram (P)
  Kurnool District
  Pincode:518 218'>
  <option value='JK-Global Institute of Technology & Management Sciences -Rayachoti Road
  Kadapa
  Y S R District
  Pincode:516 003'>
  <option value='JL-S V  PG College -# 45/150-15
  Balaji Nagar
  Y S R District
  Pincode:516 003'>
  <option value='JM-Seshachala Institute of Engineering & Technology -SVS Nagar, Vadamalapet
  Tirupati 
  Chittoor District
  Pincode:517 551'>
  <option value='JN-Sree Venkateswara College of Engineering -Golden Nagar, NH - 5, Bypass Road, North Rajupalem
  Kodavalur (V&M) 
  SPSR Nellore District
  Pincode:524 316'>
  <option value='JQ-AVR & SVR School of Business Management -Ayyalur (V)
  Nandyal
  Kurnool District
  Pincode:518 503'>
  <option value='JR-Ssk Institute of Business Management -Sai Vihar
  Vontimitta (V&M)
  Y S R District
  Pincode:516 213'>
  <option value='JT-Prabath Institute of Business Management -Paranapalli (V)
  Nandyal
  Kurnool District
  Pincode:518 501'>
  <option value='JU-Prabath Institute of Computer Sciences -Paranapalli (V)
  Nandyal
  Kurnool District
  Pincode:518 501'>
  <option value='JW-Dr  Jyothiramayi Degree College (MBA)-Ramajala Road
  Adoni 
  Kurnool District
  Pincode:518 302'>
  <option value='JX-Sri Balaji P G  College -Rudrampeta
  Alamuru (P)
  Ananthapuramu District
  Pincode:515 002'>
  <option value='JY-Sri Balaji P G  College -Rudrampeta
  Alamuru (P)
  Ananthapuramu District
  Pincode:515 001'>
  <option value='JZ-Sri Datta Sai School of Business -Prakasamapalli (V), Kopparthi (P)
  C K  Dinne (M)
  Y S R District
  Pincode:516 003'>
  <option value='K2-Quba College of Engineering & Technology -Kanpur BIT
  Venkatachalam (P)
  SPSR Nellore District
  Pincode:524 320'>
  <option value='K5-Safa College of Engineering & Technology -B Thandrapadu
  Nandyal Road
  Kurnool District
  Pincode:518 002'>
  <option value='KA-JNTUA College of Engineering -Kalikiri
  Chittoor
  Chittoor District
  Pincode:517 234'>
  <option value='KB-N B K R  Institute of Science & Tech(Autonomous)-Vidyanagar
  Kota (M)
  SPSR Nellore District
  Pincode:524 413'>
  <option value='KC-MJR Institute of Business Management -Diguvapokulavari Palli(V)
  Pulicherla (M)
  Chittoor District
  Pincode:517 113'>
  <option value='KD-Arpitha Srinivas College of Pharmacy -Ippathangale (V) 
  Puttur 
  Chittoor District
  Pincode:517 584 '>
  <option value='KE-Sir C V Raman Institute of Management Studies -Anantapur Road
  Tadipatri
  Ananthapuramu District
  Pincode:515 411'>
  <option value='KG-RAGHAVENDRA INSTITUITE OF MNG STUDIES-krishnam reddy palli cross,
  chiyyedu,anantapuramu'>
  <option value='L2-Vaagdevi Institute of Technology & Science -Peddasettipalli (V)
  Proddatur (M)
  Y S R District
  Pincode:516 360'>
  <option value='L4-Mekapati Rajamohan Reddy Inst  of Tech & Science -Udayagiri
  Nellore
  SPSR Nellore District
  Pincode:524 266'>
  <option value='L8-R I P E R, Anantapur-Raghavendra Institute of Pharmaceutical Education & Research 
  Krishnam Reddy Palli Cross
  Chiyyedu Post, Anantapur
  Ananthapuramu District
  Pincode:515 721'>
  <option value='M7-Annamacharya College of Pharmacy -New Boyanapalli(P) Thallapaka (P)
  Rajampet
  Y S R District
  Pincode:516 126'>
  <option value='P1-Chadalawada Ramanamma Engineering College -Chadalawada nagar, Renigunta Road
  Tirupati 
  Chitoor District
  Pincode:517 506'>
  <option value="P2-Rao's College of Pharmacy -Chemudugunta (P)
  Venkatachalm (M)
  SPSR Nellore District 
  Pincode:524 320">
  <option value='P9-Sree Vidyaniketan College of Pharmacy -Sree Sainath Nagr
  A Rangampet Chandragiri
  Chittoor District
  Pincode:517 102 '>
  <option value='Q0-Sri Krishna Chaithanya College of Pharmacy -Gangannagaripalle Nimmanapalle Road
  Madanapalle
  Chittoor District
  Pincode:517 325'>
  <option value='Q1-Sri Lakshmi Narasimha College of Pharmacy -SF-316 Chitoor - Vellore Highway
  Palluru 
  Chittoor District
  Pincode:517 132'>
  <option value='Q2-Safa College of Pharmacy -B Tandrapadu
  Nandyal Road
  Kurnool District
  Pincode:518 002'>
  <option value='Q3-Vagdevi College of Pharmacy & Research Centre -Brahmadevam Village
  Muthukur Mandal
  SPSR Nellore District
  Pincode:524 346'>
  <option value='R6-Priyadarshini College of Engineering and Technology -Kanuparthipadu
  AK Nagar Post
  SPSR Nellore District
  Pincode:524 004'>
  <option value='T1-Balaji College of Pharmacy -Rudrampeta
  Almuru Post
  Ananthapuramu District
  Pincode:515 002'>
  <option value='W5-Sir Vishveshwaraiah Inst  of Science & Tech-Angallu
  Madanapalli
  Chitoor District
  Pincode:517 325'>
  <option value='X5-Santhiram Engineering College -NH - 18
  Nandyal
  Kurnool District
  Pincode:518 501'>
  <option value="Y0-Creative Educational Society's College of Pharmacy -NH - 7
  Chinnatekur
  Kurnool District
  Pincode: 518 218 ">
  <option value="Y1-Jagan's College of Pharmacy -Jangala Kandriga (V)
  Muthukur (M) 
  SPSR Nellore District
  Pincode:524 346">
  <option value='Z7-Gokula Krishna College of Pharmacy -Behind RTC Depot
  Sullurpet 
  SPSR Nellore District
  Pincode:524 121'>
</datalist><!--Datalist functionality, add any new colleges to the above list-->

            	 
         
            </div>
    </div>

    <!-- E-mail -->
    <input type="email" id="email" class="form-control mb-4" placeholder="E-mail" name="email" required>
    <input type="number" id="phnum" class="form-control mb-4" placeholder="Mobile Number" name="phnum" required>

    <!-- Password -->
    <input type="password" id="pwd" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="pwd" required>
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        At least 8 characters and 1 digit
    </small>
	
	<!-- Conform Password -->
    <input type="password" id="pwd" class="form-control" placeholder="Conform Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="pwd" required>
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        
    </small>

    

    

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Sign Up</button>

   


    <!-- Terms of service -->
    <p>By clicking
        <em>Sign up</em> you agree to our
        <a href="terms.html" target="_blank">terms of service</a>

    <hr>
<p>Already a member?
        <a href="./">Login</a>
    </p>
</form>
<?php
	if(!empty($err)){
		echo '<div class="alert alert-danger">'.$err.'</div>';
	}
	if(!empty($succ)){
		echo '<div class="alert alert-success">'.$succ.'</div>';
	}			
?>	
<br>
<br>
<br>
<br>
</div>
</div>

<div class="col-md-4">
</div>
<script src="./js/script.js"></script>
<?php
require_once("footer.php");
?>
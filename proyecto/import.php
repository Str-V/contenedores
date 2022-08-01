<?php

include('conexion.php');

$fileContacts = $_FILES['fileContacts']; 
$fileContacts = file_get_contents($fileContacts['tmp_name']); 

$fileContacts = explode("\n", $fileContacts);
$fileContacts = array_filter($fileContacts); 

// preparar contactos (convertirlos en array)
foreach ($fileContacts as $contact) 
{   
	$contactList[] = explode(';', $contact);
}



//$fileContacts = explode(",", $fileContacts);
// insertar contactos
foreach ($contactList as $contactData) 
{
	$sql="INSERT INTO contacts 
						(contact_given_name,
						 contact_last_name,
						 contact_phone,
						 contact_email,
						 contact_zip_code)
						 VALUES

						 ('{$contactData[0]}',
						  '{$contactData[1]}', 
						  '{$contactData[2]}',
						  '{$contactData[3]}',
						  {$contactData[4]}
						   )"; 

    $query= mysqli_query($conexion,$sql);
}




?>
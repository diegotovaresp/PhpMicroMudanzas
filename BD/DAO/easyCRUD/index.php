<?php 
// Require the person class file
   require("Persona.class.php");
	
// Instantiate the person class
   $persona  = new Persona();

// Create new person
//   $person->Firstname = "Kona";
//   $person->Age  = "20";
//   $person->Sex = "F";
//   $creation = $person->Create();

// Update Person Info
//   $person->id = "4";	
//   $person->Age = "32";
//   $saved = $person->Save(); 

// Find person
   $persona->IdPersona = 4;		
   $persona->Find();

//   d($persona->Nombre, "Persona->Nombre");
//   d($persona->ApPaterno, "Persona->ApPaterno");
echo $persona->Nombre;
// Delete person
//   $person->id = "17";	
//   $delete = $person->Delete();

 // Get all persons
//   $persons = $person->all();  

   // Aggregates methods 
//   d($person->max('age'), "Max person age");
//   d($person->min('age'), "Min person age");
//   d($person->sum('age'), "Sum persons age");
//   d($person->avg('age'), "Average persons age");
//   d($person->count('id'), "Count persons");

   function d($v, $t = "") 
   {
      echo '<pre>';
      echo '<h1>' . $t. '</h1>';
      var_dump($v);
      echo '</pre>';
   }

?>

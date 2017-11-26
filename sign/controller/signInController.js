// Cette fonction gère le CSS des champs selon si la validation au blur retourne true ou false
function surligne(champ, erreur)
{
   if(erreur){
      champ.classList.remove("is-valid");
      champ.classList.add("is-invalid");
    }
   else{
      champ.classList.remove("is-invalid");
      champ.classList.add("is-valid");
    }
}
// Vérification pour le mail
function verifMail(champ)
{
   // Teste la validité du mail avec une regex
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}

// Vérification pour le mdp
function verifPass(champ)
{ 
   // Si la longueur du mot de passe est inférieure à 5 carractères    
   if(champ.value.length < 5)
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}


// Vérification générale lors de a soumission du formulaire
function verifForm(f)
{
   var mailOK = verifMail(f.mail);
   var passOK = verifPass(f.pass);
   // Si toutes les fonctions de vérification retournent true
   if(mailOK && passOK) {
      return true;
     }
   // Si au moins une des fonctions de vérification retourne false
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}

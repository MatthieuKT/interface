$(document).ready(function(){
  var input = $('#valider');
  var $nom = $('#nom'),
      $prenom = $('#prenom'),
      $passwordCheck = $('#passwordCheck'),
      $passwordCheck2 = $('#passwordCheck2'),
      $mail = $('#mail');

// Il devra vérifier qu'il ne contient que des lettres
  $nom.blur(function() {
    if($(this).val().length < 2 || $(this).val().length > 25 ) {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    }
    else {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
    }
  }) 
// Il devra vérifier qu'il ne contient que des lettres
  $prenom.blur(function() {
    if($(this).val().length < 2 || $(this).val().length > 25 ) {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    }
    else {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
    }
  }) 

  $mail.blur(function() {
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    // On utilise la méthode test(str) de l'objet RegExp pour la vérification
    if(!regex.test($(this).val())) {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    }
    else {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
    }
  })
  // Si la longueur du mot de passe est inférieur à 5 carractères
  $passwordCheck.blur(function() {
    if($(this).val().length < 5) {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    }
    else {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
    }
  }) 
 // Si lors de la confirmation, le premier MDP n'ets pas identique au second
/* if ($passwordCheck.val() !== $passwordCheck2.val()) {
      $passwordCheck2.removeClass('is-valid');
      $passwordCheck2.addClass('is-invalid');
 }
 else {
      $passwordCheck2.removeClass('is-invalid');
      $passwordCheck2.addClass('is-valid');
 }*/

});
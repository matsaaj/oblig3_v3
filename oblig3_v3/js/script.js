$(function() {

  // Registration form validation
  $('#register_form').validate({
    onkeyup: function(element) { // Turn off onKeyUp validation for specific fields
      var element_id = jQuery(element).attr('id');
      if (this.settings.rules[element_id].onKeyUp !== false) {
        jQuery.validator.defaults.onkeyup.apply(this, arguments);
      }
    },
    // Add bootstrap success/error styling to inputs
    highlight: function(element) {
      $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
      $(element).removeClass('form-control-success').addClass('form-control-danger');
    },
    unhighlight: function(element) {
      $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
      $(element).removeClass('form-control-danger').addClass('form-control-success');
    },
    errorClass: 'form-control-feedback',
    errorElement: 'div',
    rules: {
      firstname: 'required',
      surname: 'required',
      email: {
        required: true,
        email: true,
        onKeyUp: false,
        remote: { // Checks if email already exists in database
          url: 'check-email.php',
          type: 'post'
        },
      },
      password: {
        required: true,
        minlength: 5
      },
      passwordCheck: {
        required: true,
        onKeyUp: false,
        equalTo: '#password'
      },
    },
    messages: {
      firstname: 'Vennligst fyll inn fornavnet ditt',
      surname: 'Vennligst fyll inn etternavnet ditt',
      email: {
        required: 'Vennligst fyll inn emailen din',
        email: 'Vennligst fyll inn en gyldig email adresse',
        remote: 'E-mail er allerede i bruk'
      },
      password: {
        required: 'Vennligst fyll inn et passord',
        minlength: 'Passordet må bestå av minst 5 tegn'
      },
      passwordCheck: {
        required: 'Vennligst fyll inn et passord',
        equalTo: 'Vennligst fyll inn samme passord i begge feltene'
      },
    },
    submitHandler: registerUser
  });

  // Registration Ajax function
  function registerUser() {
    var data = $('#register_form').serialize();

    $.ajax({
      type: 'POST',
      url: 'backend.php',
      data: data,
      success: function() {
        console.log("success");
        $('#registerModal #register_form').append('<div class="alert alert-success"><strong>Registrering fullført!</strong> Lukk vindu for å logge inn.</div>');
        $('#registerFormBtn').attr('disabled', true);
        $('#login_form input[name="email"]').focus();
      }
    });
    return false;
  }

  // Submit registration form (fix for submit-button outside form tag)
  $('#registerFormBtn').click(function() {
    $('#register_form').submit();
  });



  // Login form validate
  $('#login_form').validate({
    errorPlacement: function(error, element) {
      // Do nothing (overrides default function)
    },
    highlight: function(element) {
      // Show red outline on invalid(empty) input field
      $(element).closest('.form-group').addClass('has-danger');
      $('#loginErr').html('');
    },
    unhighlight: function(element) {
      $(element).closest('.form-group').removeClass('has-danger');
    },
    onkeyup: false,
    onfocusout: false,
    rules: {
      email: 'required',
      password: 'required',
    },
    submitHandler: login
  });

  // Login Ajax function
  function login() {
    var data = $('#login_form').serialize();

    $.ajax({
      type: 'POST',
      url: 'backend.php',
      data: data,
      dataType: 'json',
      success: function(response) {
        if(response == true) {
          // Refresh if login credentials are correct
          window.location='index.php';
        } else {
          // Show error message if login credentials are incorrect
          $('#login_form .form-group').addClass('has-danger');
          $('#loginErr').html('E-mail eller passord er feil');
        }
      }
    });
    return false;
  }

  // Publish item validation
  $('#add_item').validate({
    // Add bootstrap error styling to inputs
    highlight: function(element) {
      $(element).closest('.form-group').addClass('has-danger');
    },
    unhighlight: function(element) {
      $(element).closest('.form-group').removeClass('has-danger');
    },
    errorClass: 'form-control-feedback',
    errorElement: 'div',
    rules: {
      item_title: {
        required: true,
        minlength: 3
      },
      category: 'required',
      description: {
        required: true,
        minlength: 5
      },
    },
    messages: {
      item_title: {
        required: 'Vennligst fyll inn en overskrift',
        minlength: 'Overskrift må inneholde mer enn 3 tegn'
      },
      category: 'Vennligst velg en kategori',
      description: {
        required: 'Vennligst fyll inn en beskrivelse',
        minlength: 'Beskrivelse må inneholde mer enn 5 tegn'
      },
    },
    submitHandler: publish_item
  });


  // Add new item Ajax function
  function publish_item() {
    var data = $('#add_item').serialize();

    $.ajax({
      type: 'POST',
      url: 'backend.php',
      data: data,
      dataType: 'json',
      success: function(response) {
        if(response == true) {
          // Show success message
          $('<div class="alert alert-success"><strong>Publisert! </strong><a href="#" class="alert-link">Klikk her for å gå til annonsen.</a></div>').insertAfter($('.form-group').last());
          $('#createItem').attr('disabled', true);
        }
      }
    });
    return false;
  }

});

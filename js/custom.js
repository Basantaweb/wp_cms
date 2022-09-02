jQuery(document).ready(function(){

  $(document).on('submit','#entry_form', function(e) {
    e.preventDefault();
    $('.wqmessage').html('');
    $('.wqsubmit_message').html('');

    var digi_email = $('#digi_email').val();
    var digi_fname = $('#digi_fname').val();
    var digi_lname = $('#digi_lname').val();
    var digi_pnumber = $('#digi_pnumber').val();


    if(digi_email=='') {
      $('#digi_email_message').html('Email is Required');
    }
    if(digi_fname=='') {
      $('#digi_fname_message').html('First Name Required');
    }
    if(digi_lname=='') {
      $('#digi_lname_message').html('Last Name Required');
    }
    if(digi_pnumber=='') {
      $('#digi_pno_message').html('Phone Number Required');
    }

    if(digi_email!='' && digi_fname!='' && digi_lname!='' && digi_pnumber!='') {
      var fd = new FormData(this);
      var action = 'wqnew_entry';
      fd.append("action", action);

      $.ajax({
        data: fd,
        type: 'POST',
        url: ajax_var.ajaxurl,
        contentType: false,
			  cache: false,
			  processData:false,
        success: function(response) {
          var res = JSON.parse(response);
          $('.wqsubmit_message').html(res.message);
          if(res.rescode!='404') {
            $('#entry_form')[0].reset();
            $('.wqsubmit_message').css('color','green');
          } else {
            $('.wqsubmit_message').css('color','red');
          }
        }
      });
    } else {
      return false;
    }
  });

  $(document).on('submit','#update_form', function(e) {
    e.preventDefault();
    $('.wqmessage').html('');
    $('.wqsubmit_message').html('');

    var digi_email = $('#digi_email').val();
    var digi_fname = $('#digi_fname').val();
    var digi_lname = $('#digi_lname').val();
    var digi_pnumber = $('#digi_pnumber').val();


    if(digi_email=='') {
      $('#digi_email_message').html('Email is Required');
    }
    if(digi_fname=='') {
      $('#digi_fname_message').html('First Name Required');
    }
    if(digi_lname=='') {
      $('#digi_lname_message').html('Last Name Required');
    }
    if(digi_pnumber=='') {
      $('#digi_pno_message').html('Phone Number Required');
    }

    if(digi_email!='' && digi_fname!='' && digi_lname!='' && digi_pnumber!='') {
      var fd = new FormData(this);
      var action = 'wqedit_entry';
      fd.append("action", action);

      $.ajax({
        data: fd,
        type: 'POST',
        url: ajax_var.ajaxurl,
        contentType: false,
			  cache: false,
			  processData:false,
        success: function(response) {
          var res = JSON.parse(response);
          $('.wqsubmit_message').html(res.message);
          if(res.rescode!='404') {
            $('.wqsubmit_message').css('color','green');
          } else {
            $('.wqsubmit_message').css('color','red');
          }
        }
      });
    } else {
      return false;
    }
  });

});

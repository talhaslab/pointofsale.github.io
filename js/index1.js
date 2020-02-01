$(document).ready(function() {
  $('#contact_form').bootstrapValidator({
      // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
      feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
          sup_name: {
              validators: {
                      stringLength: {
                      min: 2,
                      max:40,
                      message:'Please Enter alleast 12 characters'
                  },
                      notEmpty: {
                      message: 'Please enter  supplier name'
                  }
              }
          },
          //email
          sup_email: {
              validators: {
                  emailAddress: {
                      message: 'Please enter a valid Email Address'
                  }
              }
          },
          //contact_no
          sup_AC: {
              validators: {
                numeric: {

                       message:'Please Enter  numeric number'
                     }
              }
          },
          sup_payment: {
              validators: {
                numeric: {

                       message:'Please Enter  numeric number'
                     }
                                  }
          },
          sup_contact: {
              validators: {
                numeric: {

                       message:'Please Enter  numeric number'
                     },
                    notEmpty: {
                      message: 'Please enter supplier  Contact.'
                   }
              }
          },

          sup_address: {
              validators: {
                      stringLength: {
                      min: 20,
                      max:100,
                      message:'Please Enter alleast minimum 20 characters'
                  }
              }
          },

           //last field





          contact_no: {
              validators: {
                stringLength: {
                      min: 12,
                      max: 12,
                               }
          }

              }
          }
      })
      .on('success.form.bv', function(e) {
          $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
              $('#contact_form').data('bootstrapValidator').resetForm();

          // Prevent form submission
          e.preventDefault();

          // Get the form instance
          var $form = $(e.target);

          // Get the BootstrapValidator instance
          var bv = $form.data('bootstrapValidator');

          // Use Ajax to submit form data
          $.post($form.attr('action'), $form.serialize(), function(result) {
              console.log(result);
          }, 'json');
      });
});

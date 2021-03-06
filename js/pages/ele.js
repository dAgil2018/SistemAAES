var Ele = function() {
	 
	 // Function for switching form views (login, reminder and register forms)
    var switchView = function(viewHide, viewShow, viewHash){
        viewHide.slideUp(250);
        viewShow.slideDown(250, function(){
            $('input').placeholder();
        });

        if ( viewHash ) {
            window.location = '#' + viewHash;
        } else {
            window.location = '#';
        }
    };

	return {
        init: function() {
            /* Switch Login, Reminder and Register form views */
            var formLogin       = $('#registro');

            

           
            $('#registro').validate({
                errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block').remove();
                },
                success: function(e) {
                    e.closest('.form-group').removeClass('has-success has-error');
                    e.closest('.help-block').remove();
                },
                rules: {
                    'nombre1': {
                        required: true
                    },

                    'telefono': {
                        required: true
                    },
                    'direccion': {
                        required: true,
                        minlength: 10
                    },
                     'email': {
                        required: true,
                        email: true
                    },
                    'contra': {
                        required: true,
                        minlength: 5,   
                    },
                    'recontra': {
                        required: true,
                       	minlength: 5,
                       	equalTo : "#contra"
                    },
                    'usuario': {
                        required: true,
                       	minlength: 5,
                    }
	            },
                messages: {
                    'nombre1': 'Por favor ingrese el nombre de la persona',
                    'telefono': {
                        required: 'Por favor ingrese el teléfono del usuario',
                        
                    },
                    'direccion': {
                        required: 'Por favor ingrese una dirección',
                        minlength: 'Debe de ser mayor a 5 caracteres'
                    },
                    'contra': {
                        required: 'Por favor ingrese su contraseña',
                        minlength: 'Su contraseña debe tener al menos 5 caracteres de largo'
                    },
                    'usuario': {
                        required: 'Por favor ingrese su nombre de usuario',
                        minlength: 'Su nombre de usuario debe tener al menos 5 caracteres de largo'
                    },
                    'recontra': {
                        required: 'Por favor repita su contraseña',
                        minlength: 'Su contraseña debe tener al menos 5 caracteres de largo',
                        equalTo: "La contraseña ingresada no coincide"

                    },
                    'email': 'Por favor ingrese el correo electrónico de la cuenta',

                }
            });
            $.mask.definitions['~']='[267]';
            $('#telefono').mask('~999-9999')


            
        }



    };
}();
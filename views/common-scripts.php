
<!-- Modernizr Plugin -->
<script src="dist/js/modernizr.custom.97074.js"></script>

<!-- Bootstrap Plugins -->
<script src="dist/js/bootstrap.min.js"></script>

<!-- Retina Plugin -->
<!--<script src="dist/js//retina-1.1.0.min.js"></script>-->

<!-- Superslides Plugin -->
<script src="dist/js/jquery.easing.1.3.min.js"></script>
<script src="dist/js/jquery.animate-enhanced.min.js"></script>
<script src="dist/js/jquery.superslides.min.js"></script>

<!-- Owl Carousel Plugin -->
<script src="dist/js/owl.carousel.js"></script>

<!-- Direction-aware Hover Effect Plugin -->
<script src="dist/js/jquery.hoverdir.js"></script>

<!-- Fancybox Plugin -->
<script src="dist/js/jquery.fancybox.js"></script>

<!-- Contact form processing plugin -->
<!--<script src="dist/js/magic.js"></script>-->

<!-- jQuery Settings -->
<script src="dist/js/settings.min.js"></script>

<meta itemprop="url" content="https://www.cognitivo.cl/"></span>

<script>

    $(document).ready(function() {

        $('#contact form').submit(function(event){
            $('.form-group').removeClass('has-error');
            $('.help-block').remove();
            var formData = {
                'inputName':$('input[name=inputName]').val(),
                'inputEmail':$('input[name=inputEmail]').val(),
                'inputPhone':$('input[name=inputPhone]').val(),
                'inputMessage':$('textarea[name=inputMessage]').val()
            };

            $.ajax({
                type: 'POST',
                url: 'contact/contactpage/',
                data: formData,
                dataType:'json',
                encode:true,
                beforeSend: function () {
                    $('#ContactSendBtn').prop('disabled', true);
                },
                success: function (data) {

                    console.log(data);
                    if(!data.success){
                        if(data.errors.name){
                            $('#name-group').addClass('has-error');
                            $('#name-group').append('<span class="help-block">'+data.errors.name+'</span>');
                        }
                        if(data.errors.email){
                            $('#email-group').addClass('has-error');
                            $('#email-group').append('<span class="help-block">'+data.errors.email+'</span>');
                        }
                        if(data.errors.subject){
                            $('#phone-group').addClass('has-error');
                            $('#phone-group').append('<span class="help-block">'+data.errors.subject+'</span>');
                        }
                        if(data.errors.message){
                            $('#message-group').addClass('has-error');
                            $('#message-group').append('<span class="help-block">'+data.errors.message+'</span>');
                        }
                        $('#ContactSendBtn').prop('disabled', false);
                    }
                    else{
                        $('#contact form').append('<div class="alert alert-success">'+data.message+'</div>');
                    }
                },
                error: function (data) {
                    console.log(data);
                    $('#contact form').append('<div class="alert alert-danger">'+data.message+'</div>');
                    $('#ContactSendBtn').prop('disabled', false);
                }
            });

            event.preventDefault();
        });


    });

</script>
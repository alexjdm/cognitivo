$(document).ready(function(){
    $('#contact form').submit(function(event){
        $('.form-group').removeClass('has-error');
        $('.help-block').remove();
        var formData={
            'inputName':$('input[name=inputName]').val(),
            'inputEmail':$('input[name=inputEmail]').val(),
            'inputPhone':$('input[name=inputPhone]').val(),
            'inputMessage':$('textarea[name=inputMessage]').val()
        };
        //debugger;
        $.ajax({
            type:'POST',
            url:'contact/contactpage/',
            data:formData,
            dataType:'json',
            encode:true
        }).done(function(data){
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
            }
            else{
                $('#contact form').append('<div class="alert alert-success">'+data.message+'</div>');
            }
        }).fail(function(data){
            console.log(data);
        });
        event.preventDefault();
    });
});
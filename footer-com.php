
<?php wp_footer(); ?>
<script>
    var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};
var updated = getUrlParameter('updated');
console.log('updated');
if(updated == 'true'){
    setTimeout(function(){
        window.location.href = "https://board.afpa.digital/communication/";
    }, 2000);
}
$('#inform').on('click', function(e){
    e.preventDefault();
    var title = 'AFPA Digital - Mise à jour du board Communication';
    var recipients = 'thomas.delalbre@gmail.com, vincent-pierre.gaillard2@afpa.fr, vincent-pierre.gaillard@externe.afpa.fr';
    var content = 'Le board communication a été mis à jour!';
    jQuery.ajax({
            type: "POST",
            url: "https://board.afpa.digital/wp-admin/admin-ajax.php",
            data: {
                action: 'send_mail_communication',
                title: title,
                content: content,
                recipients: recipients
            },
            done:function(data) {
                console.log(data);
                console.log(recipients);
            },
            success: function(data) {
                console.log(data);
                //$form.hide();
                console.log(recipients);
                
                $('#inform').hide();
                alert('Le mail a bien été envoyé à : '.recipients);
                //$('#modals').hide();
            },
            error: function(xhr, ajaxOptions, thrownError){
                        alert(xhr.status);
                    }
    });
});
</script>
<script>

$('.form_validation_com input').css("opacity", '0.1');

$('.lock-it').on('click', function(){
   $(this).toggleClass('lock-it unlocked');
    $(this).find('svg').toggleClass('fa-lock fa-lock-open');
    form = $(this).parent();
    $(form).find('input').prop("disabled", false);
    $(form).find('input').css('opacity', '1');
});

$('.form_validation_com input').on('click', function( e ) {
    var el = $(this).parent().parent().parent();
    console.log(el)
    if($(el).find('svg').hasClass('fa-lock') ){
        e.preventDefault();
    }else{
        $(el).find('svg').removeClass('fa-lock-open').addClass('fa-save');
        var validationState = $(this).val();
        validationId = el.attr('data-form');
        console.log(validationState);
        console.log(validationId);
        if(validationState == 0){
            validationClass = "en-attente"
        }else if(validationState == 2){
            validationClass = "en-modif"
        }else if(validationState == 1){
            validationClass = "en-valid"
        }else if(validationState == 3){
            validationClass = "en-refus"
        }
        $('.unlocked').on('click', function(){   
            jQuery.ajax({
                type: "POST",
                url: "https://board.afpa.digital/wp-admin/admin-ajax.php",
                data: {
                    action: 'edit_element_com',
                    id: validationId,
                    validation: validationState
                },
                done:function(data) {
                    console.log(data);
                    console.log('data');
                },
                success: function(data) {
                    console.log('ok');
                    el.parent().parent().removeClass().addClass(validationClass);
                    $('#inform').show();
                    $(el).find('svg').toggleClass('fa-save fa-lock');
                    $(el).find('input').css("opacity", '0.1');
                    $(this).toggleClass('lock-it unlocked');
                },
                error: function(xhr, ajaxOptions, thrownError){
                            alert(xhr.status);
                }
            });
        });
    }
});
$('#inform').hide();
$('.saveme').hide();
$('.form_validation_com_2 textarea').keyup(function (e){
    $(this).parent().find('.saveme').show();
});
$('.form_validation_com_2 .saveme').on('click', function( ) {
    var el = $(this).parent();
    var validationComment = el.parent().find('.past-comment').html();
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    today = dd + '/' + mm + '/' + yyyy;
    var validationComment = validationComment + '<br>' + today + ' - ' + el.parent().attr('data-user')+' : '+el.find('textarea').val();
    validationId = el.attr('data-form');
    el.parent().find('.past-comment').html(validationComment);
    el.find('textarea').html('');
    console.log(validationId);
    console.log(validationComment);
    jQuery.ajax({
        type: "POST",
        url: "https://board.afpa.digital/wp-admin/admin-ajax.php",
        data: {
            action: 'edit_element_com_commentaire',
            id: validationId,
            commentaire: validationComment
        },
        done:function(data) {
            console.log(data);
            console.log('data');
        },
        success: function(data) {
            console.log('ok');
            //el.removeClass().addClass(validationClass);
            $('#inform').show();
            $('.saveme').hide();
           // alert('Le mail a bien été envoyé à : '.recipients);
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert(xhr.status);
        }
    });
});



</script>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <p>Easy Cards - The Project Companion </p>
            </div>
            <div class="col-md-4 text-center">
                <p>Institutionnal 6 months plan</p>
            </div>
            <div class="col-md-4 text-right">
                <p>Tous droits réservés ©️ | 2019 - 2021 | DG Consulting</p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>

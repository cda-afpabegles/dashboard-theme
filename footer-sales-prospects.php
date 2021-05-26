
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
    var title = 'AFPA Digital - Nouveau Prospect';
    var recipients = 'thomas.delalbre@gmail.com, vincent-pierre.gaillard2@afpa.fr, valerie.leroy2@afpa.fr, vincent-pierre.gaillard@externe.afpa.fr';
    var content = 'Un nouveau prospect a été ajouté.';

    jQuery.ajax({
            type: "POST",
            url: "https://board.afpa.digital/wp-admin/admin-ajax.php",
            data: {
                action: 'send_mail_prospects',
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
                $form.hide();
                console.log(recipients);
                $('#modals').hide();
            },
            error: function(xhr, ajaxOptions, thrownError){
                        alert(xhr.status);
                    }

    });


    setTimeout(function(){
        window.location.href = "https://board.afpa.digital/sales/";
        // window.location.href = "https://prospects.afpa.digital/";
    }, 2000);
}
</script>
<?php
    if ( current_user_can( 'administrator' ) ) {
?>
<script>

</script>
<?php
}
?>
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


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
        window.location.href = "https://board.afpa.digital/sales/";
        // window.location.href = "https://prospects.afpa.digital/";;
    }, 2000);
}
</script>
<script>
    $('.comments-row').slideToggle();

    $('.zoom-in-comment').on('click', function(){
        console.log($(this).parent());
        console.log($(this).parent().next());
        $(this).parent().next('.comments-row').slideToggle();
    })
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

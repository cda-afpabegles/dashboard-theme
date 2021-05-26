
<?php wp_footer(); ?>
<script>
    
$('.gantt li').on('click', function(){
    id = $(this).attr('data-card');
    $('.global_modal_card').hide();
    $('#modal-'+id).show();
    $('#modals').show();
});

$('.close_modal').on('click', function(){
    $(this).parent().parent().hide();
    $('#modals').hide();
});
$('.global_modal_card .close_modal').on('click', function(){
    $(this).parent().hide();
    $('#modals').hide();
});



$('#user_select').change(function(){
    var val = $(this).val();
    if(val == "card-holder"){
        $('.modal-link').each(function() {   
            $('.card-holder').show();
            $("#cat_select").val("card-holder");
            $("#filter2").val("");
        });
    }else{
        $('.modal-link').each(function() {    
            $('.card-holder').hide();
            $('.card-holder.'+val).show();
            $("#cat_select").val("card-holder");
            $("#filter2").val("");
        });
    }
});
$('#cat_select').change(function(){
    var val = $(this).val();
    if(val == "card-holder"){
        $('.modal-link').each(function() {   
            $('.card-holder').show();
            $("#user_select").val("card-holder");
            $("#filter2").val("");
        });
    }else{
        $('.modal-link').each(function() {    
            $('.card-holder').hide();
            $('.card-holder.'+val).show();
            $("#user_select").val("card-holder");
            $("#filter2").val("");
        });
    }
});


$('.look').on('click', function(){
    link = $(this).attr('data-look');
    window.location.href = link;
}); 

$("#filter2").keyup(function() {
    var filter = $(this).val(),
    count = 0;
    $('.card-holder').each(function() {
        console.log($(this).find('h3').text())
        if ($(this).find('h3').text().search(new RegExp(filter, "i")) < 0) {
            $(this).hide();
        } else {
            $(this).show();
            count++;
        }
    });
    $("#cat_select, #user_select").val("card-holder");
});
$('.content_card p').slideToggle();
var slim = true;
$('#slim_version').on('click', function(){
    console.log(slim);
    if(slim == false){
        $('.content_card p').slideToggle();
        $(this).text('Version Étendue');
        slim = true;
    }else{
        $('.content_card p').slideToggle();
        $(this).text('Version Simplifiée');
    }
});
</script>
<?php
    if ( current_user_can( 'administrator' ) ) {
?>
<script>
  /*       $("#filter").keyup(function() {

// Retrieve the input field text and reset the count to zero
var filter = $(this).val(),
  count = 0;

// Loop through the comment list
$('.modal-link').each(function() {
 console.log($(this).find('.tags').text())
 // If the list item does not contain the text phrase fade it out
 if ($(this).find('.tags').text().search(new RegExp(filter, "i")) < 0) {
     
     $(this).hide();

 // Show the list item if the phrase matches and increase the count by 1
 } else {
     $(this).show();
     count++;
 }

}); 

});
*/

$('.sendmail').on('click', function(){
    id = $(this).attr('data-sendmail');
    $('#modal-'+id).show();
    $('#modals').show();
});
$('.close_modal').on('click', function(){
    $(this).parent().parent().hide();
    $('#modals').hide();
});















var containers = $('.dragdrop_container').toArray();
dragula(containers)
.on('drag', function (el) {
    el.className = el.className.replace('ex-moved', '');
  })
.on('drop', function (el, container) {
        
    console.log($(el).attr('data-card'));
    console.log($(container).attr('data-column'))
    
    
       jQuery.ajax({
        type: "POST",
        url: "https://board.afpa.digital/wp-admin/admin-ajax.php",
        data: {
            action: 'edit_etat',
            id: $(el).attr('data-card'),
            etat: $(container).attr('data-column')
        },
        done:function(data) {
            console.log(data);
            console.log('data');
        },
        success: function(data) {
            console.log('ok');
        },
        error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                }

    });


    el.className += ' ex-moved';
  }).on('over', function (el, container) {
        console.log($(el).attr('data-card'));
        console.log($(container).attr('data-column'))



  }).on('out', function (el, container) {
    container.className = container.className.replace('ex-over', '');
  });





/* 
  var checkboxes = $('.modal_mail_form').find($(".image-checkbox") );
   console.log(checkboxes);
   var myArray = new Array(checkboxes.length);
   var recipients = new Array();
   if (myArray.lenght !== 1){
    for ( var j = 0; j < myArray.length; j++) { 
        if($('.image-checkbox-'+j).hasClass('image-checkbox-checked')){
            recipients.push($('.image-checkbox-'+j).attr('data-email'));
        // Alert Current Selection //
        console.log(recipients );
        }else{

        }
    } 
    recipients = recipients.join(', ')
   }else{
        recipients = $('.image-checkbox-checked').attr('data-email');
    recipients = recipients.join(', ')
   }
      
    console.log(recipients);
 */
  jQuery(function ($) {
        // init the state from the input
        $(".image-checkbox").each(function () {
            if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
                $(this).addClass('image-checkbox-checked');
            }
            else {
                $(this).removeClass('image-checkbox-checked');
            }
        });

        // sync the state to the input
        $(".image-checkbox").on("click", function (e) {
            if ($(this).hasClass('image-checkbox-checked')) {
                $(this).removeClass('image-checkbox-checked');
                $(this).find('input[type="checkbox"]').first().removeAttr("checked");
            }
            else {
                $(this).addClass('image-checkbox-checked');
                $(this).find('input[type="checkbox"]').first().attr("checked", "checked");
            }

            e.preventDefault();
        });
    });









  $('.send-mail-button').on('click', function(){
    $("#modals").show();
    $("#modal-"+$(this).attr('data-modal')).show();
  });


$('.modal_mail_form').submit(function( event ) {
 event.preventDefault();
 var $form = $( this ),
   
   title = $form.find( "input[name='title']" ).val(),
   content = $form.find( "input[name='message']" ).val()
   var checkboxes = $form.find($(".image-checkbox") );
   console.log(checkboxes);
   var myArray = new Array(checkboxes.length);
   var recipients = new Array();
   if (myArray.lenght !== 1){
    for ( var j = 0; j < myArray.length; j++) { 
        if($form.find('.image-checkbox-'+j).hasClass('image-checkbox-checked')){
            recipients.push($form.find('.image-checkbox-'+j).attr('data-email'));
        // Alert Current Selection //
        console.log(recipients );
        }else{

        }
    } 
    recipients = recipients.join(', ')
   }else{
        recipients = $('.image-checkbox-checked').attr('data-email');
    recipients = recipients.join(', ')
   }
      
    console.log(recipients);
    if(recipients !== ""){
        // recipients += ", tho.mas.delalbre@gmail.com";
    
        if(content == undefined){
            content = "Mise à jour de la fiche!";
        }    
        
        console.log(content);
        jQuery.ajax({
            type: "POST",
            url: "https://board.afpa.digital/wp-admin/admin-ajax.php",
            data: {
                action: 'send_mail_modal',
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
    }else{
        alert('Pas de destinataire selectionné! ');
    }
});
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

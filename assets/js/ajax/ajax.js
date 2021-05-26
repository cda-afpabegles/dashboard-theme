/* dragula([document.querySelector('#column-drag-4'), document.querySelector('#column-drag-3'), document.querySelector('#column-drag-2'), document.querySelector('#column-drag-1')])
.on('drag', function (el) {
    el.className = el.className.replace('ex-moved', '');
  }).on('drop', function (el) {
    el.className += ' ex-moved';
  }).on('over', function (el, container) {
    container.className += ' ex-over';
    console.log('moved2!');

console.log($(el).attr('data-card'));
console.log($(container).attr('data-column'))
   /*  var data = {
    action: 'update_etat',
    id: jQuery('section#single article input:last-of-type').attr('value'), 
            cote: 'like'
    };
    jQuery.post(ajax_url, data, function(response) {
        console.log('état updated!')
    });

    jQuery.ajax({
        type: "POST",
        url: "https://board.afpa.digital/wp-admin/admin-ajax.php",
        data: {
            action: 'edit_etat',
            id: $(el).attr('data-card'),
            etat: $(container).attr('data-column')
        },
        success: function(data) {
            console.log('ok');
        },
        error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                }

    });





  }).on('out', function (el, container) {
    container.className = container.className.replace('ex-over', '');
  }); */
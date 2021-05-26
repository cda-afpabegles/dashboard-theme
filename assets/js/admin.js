
 jQuery(document).ready(function(){



     jQuery('.components-button').on('click', function(){
         setTimeout(redirectHome(), 1000);
         console.log('test');
        }); 
        
        console.log('Hello la Team ...');
        jQuery('.components-snackbar-list').on('hover', function(e){     console.log('test');
            e.preventDefault();
            redirectHome();
        })
/*         document.querySelector('.components-button').addEventListener('click', function(e) {
            setTimeout(redirectHome(), 1000);
        }, false); */

        function redirectHome(){
            window.location.href= "https://board.afpa.digital";
            console.log('test');
        }
    });
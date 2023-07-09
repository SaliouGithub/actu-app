$(function(){
    
    $('#monForm').on('submit', function(e) {
        e.preventDefault();
        $('.loaderMessage').addClass('is-active');     
        $.ajax({
            type: "POST",
            url: "php/controller/categorie.php", //process to mail
            data: $(this).serialize(),
            success: function(msg){
                if(parseInt(msg)==1){
                    swal({ title: "Bravo !", text: "La categorie a été ajoutée avec succès", imageUrl: 'images/icones/success.png', html: true});
                    $(document).click(function(){
                        window.location.href = "categorie_liste";
                    });
                }else if(parseInt(msg)==2){ 
                    swal({ title: "Erreur", text: "Ce nom de categorie est déjà utilisé ", imageUrl: 'images/icones/error.png', html: true});
                }else{ 
                    swal({ title: "Désolé", text: "Une erreur est survenue lors de la connexion &agrave; la base de données, veuillez réessayer plus tard", imageUrl: 'images/icones/errorDb.png', html: true});
                }
               // alert(msg);
               $('.loaderMessage').removeClass('is-active');
            },
            error: function(){
                $('.loaderMessage').removeClass('is-active');
                swal({ title: "Désolé", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'images/icones/error.png', html: true});
            }
        });
    });

$('#monFormMod').on('submit', function(e) {
    e.preventDefault();
    $('.loaderMessage').addClass('is-active');     
    $.ajax({
        type: "POST",
        url: "php/controller/categorie.php", //process to mail
        data: $(this).serialize(),
        success: function(msg){
            if(parseInt(msg)==1){
                swal({ title: "Bravo !", text: "Cette categorie a été modifiée avec succès", imageUrl: 'images/icones/success.png', html: true});
                $(document).click(function(){
                    window.location.href = "categorie_liste";
                });
            }else if(parseInt(msg)==2){ 
                swal({ title: "Erreur", text: "Ce nom de categorie est déj&agrave; utilisé par une autre personne", imageUrl: 'images/icones/error.png', html: true});
            }else{ 
                swal({ title: "Désolé", text: "Une erreur est survenue lors de la connexion &agrave; la base de données, veuillez réessayer plus tard", imageUrl: 'images/icones/errorDb.png', html: true});
            }
           // alert(msg);
           $('.loaderMessage').removeClass('is-active');
        },
        error: function(){
            $('.loaderMessage').removeClass('is-active');
            swal({ title: "Désolé", text: "Une erreur est survenue veuillez contacter l'administrateur", imageUrl: 'images/icones/error.png', html: true});
        }
    });
});
    
});


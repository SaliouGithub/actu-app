$(function(){

    $('#monForm').on('submit', function(e) {
        e.preventDefault(); 
            $('.loaderMessage').addClass('is-active');
            if($("#motDePasse").val() == $("#cmotDePasse").val()){
            $.ajax({
                type: "POST",
                url: "php/controller/utilisateur.php", //process to mail
                data: $(this).serialize(),
                success: function(msg){
                    if(parseInt(msg)==1){
                        swal({ title: "Bravo !", text: "L'utilisateur a été ajouté avec succès", imageUrl: 'images/icones/success.png', html: true});
                        $(document).click(function(){
                            window.location.href = "utilisateur_liste";
                        });
                        $('#exampleModal').modal('hide');
                    }else if(parseInt(msg)==11){
                        swal({ title: "Bravo !", text: "L'utilisateur a été modifié avec succès", imageUrl: 'images/icones/success.png', html: true});
                        $(document).click(function(){
                            window.location.href = "utilisateur_liste";
                        });
                        $('#exampleModal').modal('hide');
                    }else if(parseInt(msg)==2){ 
                        swal({ title: "Erreur", text: "Ce nom d'utilisateur est déjà utilisé par une autre personne", imageUrl: 'images/icones/error.png', html: true});
                    }else if(parseInt(msg)==3){ 
                        swal({ title: "Erreur", text: "Cette adresse email est déjà utilisée par une autre personne", imageUrl: 'images/icones/error.png', html: true});
                    }else if(parseInt(msg)==4){ 
                        swal({ title: "Erreur", text: "Ce matricule est déjà utilisé par une autre personne", imageUrl: 'images/icones/error.png', html: true});
                    }else if(parseInt(msg)==10){
                        swal({ title: "Bravo !", text: "L'utilisateur a été modifié avec succès", imageUrl: 'images/icones/success.png', html: true});
                        $(document).click(function(){
                            // window.location.href = "utilisateur_liste";
                            app.getAllUsers();
                        });
                        $('#exampleModal').modal('hide');
                    }
                    else{ 
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
        }else{ 
            $('.loaderMessage').removeClass('is-active');
            swal({ title: "Désolé", text: "Les mots de passe saisis ne sont pas identique, veuillez les vérifier ou les resaisir", imageUrl: 'images/icones/errorDb.png', html: true});
        }
        
    });
    
    $('#monFormMod').on('submit', function(e) {
        e.preventDefault();
        $('.loaderMessage').addClass('is-active');     
        $.ajax({
            type: "POST",
            url: "php/controller/utilisateur.php", //process to mail
            data: $(this).serialize(),
            success: function(msg){
                
                if(parseInt(msg)==1){
                    swal({ title: "Bravo !", text: "L'utilisateur a été modifié avec succès", imageUrl: 'images/icones/success.png', html: true});
                    $(document).click(function(){
                        window.location.href = "utilisateur_liste";
                    });
                }else if(parseInt(msg)==2){ 
                    swal({ title: "Erreur", text: "Ce nom d'utilisateur est déjà utilisé par une autre personne", imageUrl: 'images/icones/error.png', html: true});
                }else if(parseInt(msg)==3){ 
                    swal({ title: "Erreur", text: "Cette adresse email est déjà utilisée par une autre personne", imageUrl: 'images/icones/error.png', html: true});
                }else if(parseInt(msg)==4){ 
                    swal({ title: "Erreur", text: "Ce matricule est déjà utilisé par une autre personne", imageUrl: 'images/icones/error.png', html: true});
                }
                else{ 
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



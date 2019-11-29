
$(function () {
    // Document.ready -> link up remove event handler
    $('button[id=btnDeleteFilm]').bind('click', RemoveFilmClick);
    function RemoveFilmClick() {
        // Récupération de la ligne en cours
        var oTR = $(this).parent().parent();
        // Récupération de l'id du film
        var idFilm = oTR.attr("id");
        // Récupération du titre
        var oTitre = oTR.find("#titre");
        if (idFilm !== '' && confirm("Voulez-vous supprimer le film '" +
            oTitre.html() + "' ? "))
        {
            // Le bouton est grisé ...
            $(this).attr("disabled", true);
            // Le bouton Edit est aussi grisé
            var btnEdit = oTR.find("#btnEditFilm");
            btnEdit.attr("disabled", true);
            $.ajax({
                url: "/admin/film/delete",
                type: "post",
                data: { "id": idFilm },
                success: function(data){
                    var oTR = $('#' + data.id);
                    var divMessage = $('#update-message');
                    if (data.status == 0) {
                        oTR.fadeOut('slow');
                        divMessage.attr("class", 'label label-success');
                    }
                    else {
                        divMessage.attr("class", 'label label-danger');
                        // On remet les valeurs de départ
                        // Le bouton n'est pas grisé ...
                        var btnEdit = oTR.find("#btnEditFilm");
                        btnEdit.attr("disabled", false);
                    }
                    divMessage
                        .text(data.message)
                        .show('slow', null).delay(6000).hide('slow');
                },
                error:function(){
                    alert("Erreur d'accès à la méthode de suppression");
                    var oTR = $('#' + idFilm);
                    oTR.attr('class','');
                    // Le bouton n'est pas grisé ...
                    var btnEdit = oTR.find("#btnEditFilm");
                    btnEdit.attr("disabled", false);
                }
            });
        }
    }
});
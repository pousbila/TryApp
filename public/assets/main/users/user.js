$(document).ready(function() {
    // Fonction pour valider le prénom
    function validateFirstname() {
        let firstname = $('#firstname').val().trim();
        let nameRegex = /^[a-zA-ZÀ-ÖØ-öø-ÿ\s]+$/;

        if (firstname === "") {
            $('#firstname').removeClass('is-valid').addClass('is-invalid');
            $('#error_register_firstname').text("Le champ est vide !");
            return false;
        } else if (nameRegex.test(firstname)) {
            $('#firstname').removeClass('is-invalid').addClass('is-valid');
            $('#error_register_firstname').text("");
            return true;
        } else {
            $('#firstname').removeClass('is-valid').addClass('is-invalid');
            $('#error_register_firstname').text("Seules les lettres sont permises !");
            return false;
        }
    }

    // Fonction pour valider le nom de famille
    function validateLastname() {
        let lastname = $('#lastname').val().trim();
        let nameRegex = /^[a-zA-ZÀ-ÖØ-öø-ÿ\s]+$/;

        if (lastname === "") {
            $('#lastname').removeClass('is-valid').addClass('is-invalid');
            $('#error_register_lastname').text("Le champ est vide !");
            return false;
        } else if (nameRegex.test(lastname)) {
            $('#lastname').removeClass('is-invalid').addClass('is-valid');
            $('#error_register_lastname').text("");
            return true;
        } else {
            $('#lastname').removeClass('is-valid').addClass('is-invalid');
            $('#error_register_lastname').text("Seules les lettres sont permises !");
            return false;
        }
    }

    // Fonction pour valider l'email
    async function validateEmail() {
        let email = $('#email').val().trim();
        let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        let email_verif = await existEmailjs(email);

        if (email === "") {
            $('#email').removeClass('is-valid').addClass('is-invalid');
            $('#error_register_email').text("Le champ est vide !");
            return false;
        } else if (!emailRegex.test(email)) {
            // Si l'e-mail ne respecte pas le format
            $('#email').removeClass('is-valid').addClass('is-invalid');
            $('#error_register_email').text("Votre adresse e-mail est incorrecte !");
            return false;
        } else if (email_verif === "exist") {
            // Si l'e-mail existe déjà
            $('#email').removeClass('is-valid').addClass('is-invalid').fadeOut(100).fadeIn(100);
            $('#error_register_email').text("Cette adresse email existe déjà !");
            return false;
        } else if (email_verif === "notexist") {
            // Si l'e-mail est valide et n'existe pas
            $('#email').removeClass('is-invalid').addClass('is-valid');
            $('#error_register_email').text("");
            return true;
        } else {
            // En cas d'erreur inattendue (exemple : serveur indisponible)
            $('#email').removeClass('is-valid').addClass('is-invalid');
            $('#error_register_email').text("Erreur lors de la vérification de l'e-mail.");
            return false;
        }
    }

    // Fonction pour valider le mot de passe
    function validatePassword() {
        let password = $('#password').val();
        let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?])[A-Za-z\d!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]{8,}$/;
        let strength=0;
        let hasNumber = /\d/.test(password);
        let hasSpecialChar = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password);

        // Configuration de la barre de progression en fonction de la force du mot de passe
        if (password.length >= 8) strength += 25;
        if (/[a-z]/.test(password)) strength += 25;
        if (/[A-Z]/.test(password)) strength += 25;
        if ( hasNumber && hasSpecialChar) strength += 25;

        $('#passwordStrengthBar').css('width', strength + '%');
        $('#passwordStrengthBar').attr('aria-valuenow', strength);
        let strengthText = "";
        let strengthColor = "red";

        if (strength === 25) {
            strengthText = "Faible";
        } else if (strength === 50) {
            strengthText = "Moyen";
            strengthColor = "orange";
        } else if (strength === 75) {
            strengthText = "Fort";
            strengthColor = "yellow";
        } else if (strength === 100) {
            strengthText = "Très fort";
            strengthColor = "green";
        }

        $('#passwordStrengthText').text(strengthText).css('color',strengthColor);
        $('#passwordStrengthBar').css('background-color', strengthColor);

        if (password === "") {
            $('#password').removeClass('is-valid').addClass('is-invalid');
            $('#error_register_password').text("Le champ est vide !");
            return false;
        } else if (passwordRegex.test(password)) {
            $('#password').removeClass('is-invalid').addClass('is-valid');
            $('#error_register_password').text("");
            return true;
        } else {
            $('#password').removeClass('is-valid').addClass('is-invalid');
            $('#error_register_password').text(" Le mot de passe doit contenir Au moins une lettre majuscule,minuscule , un chiffre et un caractère spécial !(8 caractères)");
            return false;
        }
    }

    // Fonction pour valider la confirmation du mot de passe
    function validatePasswordConfirm() {
        let password = $('#password').val();
        let password_confirm = $('#password_confirm').val();

        if (password_confirm === "") {
            $('#password_confirm').removeClass('is-valid').addClass('is-invalid');
            $('#error_register_password_confirm').text("Le champ est vide !");
            return false;
        } else if (password_confirm === password) {
            $('#password_confirm').removeClass('is-invalid').addClass('is-valid');
            $('#error_register_password_confirm').text("");
            return true;
        } else {
            $('#password_confirm').removeClass('is-valid').addClass('is-invalid');
            $('#error_register_password_confirm').text("Les mots de passe ne sont pas identiques !");
            return false;
        }
    }

    // Fonction pour valider l'acceptation des termes et conditions
    validateAgreeTerme(); //Charger le message d'erreur par defaut
    function validateAgreeTerme() {
        let agreeTerme = $('#agreeTerme').is(':checked');

        if (!agreeTerme) {
            $('#error_register_agreeTerme').text("Vous devez accepter les termes et conditions. ");
            return false;
        } else {
            $('#error_register_agreeTerme').text("");
            return true;

        }
    }

    // Écouteurs d'événements pour validation en temps réel
    $('#firstname').keyup(validateFirstname);
    $('#lastname').keyup(validateLastname);
    $('#email').keyup(validateEmail);
    $('#password').keyup(validatePassword);
    $('#password_confirm').keyup(validatePasswordConfirm);
    $('#agreeTerme').change(validateAgreeTerme);

    // Vérification complète lors du clic sur le bouton d'inscription
    $('#register_user').click(function() {
        let isValid = validateFirstname() && validateLastname() && validateEmail() && validatePassword() && validatePasswordConfirm() && validateAgreeTerme();

        if (isValid) {
            $('#form_register').submit();
            alert("Inscription réussie !");
            console.log("Inscription réussie !");

        } else {
            alert("Veuillez corriger les erreurs.");
        }
    });
});

function existEmailjs(email, callback) {
    // Récupérer l'URL et le token CSRF depuis l'élément #email
    var url = $('#email').attr('url-existEmail');
    var token = $('#email').attr('token');

    // Vérifier si l'URL et le token sont bien définis
    if (!url || !token) {
        console.error("Erreur : URL ou token CSRF manquant !");
        return; // On arrête l'exécution
    }

    $.ajax({
        type: 'POST', // On envoie une requête POST
        url: url, // L’URL où envoyer la requête
        data: {
            '_token': token, // On ajoute le token CSRF
            'email': email // On envoie l'email à vérifier
        },
        success: function(result) {
            console.log("Réponse du serveur :", result);

            // Vérifier que callback est bien une fonction avant de l’appeler
            if (typeof callback === "function") {
                callback(result.response);
            }
        },
        error: function(xhr, status, error) {
            console.error("Erreur AJAX :", error);
            console.error("Détails :", xhr.responseText);
        }
    });
}




var allFields = document.querySelectorAll(".form-control");
    document.getElementById('name').focus();
    for (var i = 0; i < allFields.length; i++) {
        allFields[i].addEventListener('keypress', function(event) {
            //event.preventDefault();
            if (event.keyCode === 13) {
                event.preventDefault();
                if (this.parentElement.nextElementSibling.querySelector('input')) {
                    this.parentElement.nextElementSibling.querySelector('input').focus();
                }
            }
        })
    }
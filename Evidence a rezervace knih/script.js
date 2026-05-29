document.addEventListener('DOMContentLoaded', function() {
    
    const formular = document.getElementById('hlavni-formular');

    if (formular) {
        formular.addEventListener('submit', function(udalost) {
            const jmeno = document.getElementById('jmeno').value;
            const telefon = document.getElementById('telefon').value;

            if (jmeno.length < 5) {
                alert('Prosím, zadejte celé jméno (alespoň 5 znaků).');
                udalost.preventDefault(); 
                return;
            }

            
            if (telefon.length > 0 && telefon.length < 9) {
                alert('Telefonní číslo musí mít alespoň 9 číslic.');
                udalost.preventDefault();
                return;
            }

        });
    }
});

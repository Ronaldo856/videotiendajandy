(function() {
    "use strict";

    let myVariable = 'Hola Kevin!';

    var klassEvento = function() {
        this.userData = myVariable;

        this.saludo = function() {
            console.log(this.userData);
        }
    };

    var klassObject = new klassEvento();

    klassObject.saludo();
})();
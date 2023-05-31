const formularioAjax = document.getElementById("myForm");

    function enviar_formulario_ajax(e) {
        e.preventDefault();
        let enviar = confirm("Quieres enviar el formulario");

        if (enviar == true) {
            let data = new FormData(this);
            let method = this.getAttribute("method");
            let action = this.getAttribute("action");

            let encabezados = new Headers();

            let config = {
                method: method,
                headers: encabezados,
                mode: 'cors',
                cache: 'no-cache',
                body: data
            };

            fetch(action, config)
                .then(respuesta => respuesta.text())
                .then(_respuesta => {
                    alert("Registro de datos correcto");
                    window.location.href = "home.php?vista=profesores";
                });
        }
        console.log(enviar_formulario_ajax)
    }

    formularioAjax.addEventListener("submit", enviar_formulario_ajax);
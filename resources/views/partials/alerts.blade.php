
@if(session('success'))
   <div id="alert" class="alert alert-success alert-dismissible d-flex align-items-center fade show">
    <i class="fa-solid fa-circle-check"></i>
    <strong class="mx-2">¡Éxito!</strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

    <script>
        setTimeout(function() {
            let alerta = document.getElementById('alert');
            if (alerta) {
                // Quitar clase de "show" para evitar que bootstrap lo muestre
                alerta.classList.remove('show');
                // Añadir la animación de desvanecimiento
                alerta.classList.add('fade');
                // Elimina el elemento de DOM (Documento después de 5ms)
                setTimeout(() => alerta.remove(), 500);
            }
        }, 5000); // 3 segundos
    </script>
@endif
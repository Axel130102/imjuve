async function confirmarEliminar(event) {
    event.preventDefault(); // Evita el comportamiento predeterminado del enlace

    const result = await Swal.fire({
        title: '¿Estás seguro?',
        text: "Esta información será eliminada permanentemente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar',
        cancelButtonText: 'Cancelar'
    });

    if (result.isConfirmed) {
        await Swal.fire(
            'Eliminado',
            'La información se ha eliminado correctamente.',
            'success'
        );
        window.location.href = event.target.href; // Continúa con el enlace
    }
}

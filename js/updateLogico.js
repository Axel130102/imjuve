async function confirmarEliminar(event) {
    event.preventDefault();

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
        await Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Eliminado',
            text: 'La información se ha eliminado correctamente.',
            showConfirmButton: false,
            timer: 2000
        })
        window.location.href = event.target.href;
    }
}
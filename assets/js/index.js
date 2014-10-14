function onEditClick(){
    alert('Edit Masih Belum ada');
}
function onDeleteClick(event){
    var isRedirect = confirm("Apakah anda yakin ingin menghapus post ini");
    if (!isRedirect){
        event.preventDefault();
    }
}
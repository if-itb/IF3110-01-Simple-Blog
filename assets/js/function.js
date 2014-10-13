function Confirm_Delete(id) {
    if (confirm("Anda yakin akan menghapus post?")) {
        window.location = "hapus_post.php?id="+id; 
    } else {
    }
}
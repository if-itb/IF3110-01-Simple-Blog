function validate(){
					var title = document.getElementById('Judul');
					var date = document.getElementById('Tanggal');
					var content = document.getElementById('Konten');
					var today = new Date();
					if(title.value == null || title.value == "" || date.value == null || date.value == "" || content.value == null || content.value ==""){
						alert('Semua data harus diisi sebelum menyimpan!');
						return false;
					}
					else if(date.value != null || date.value != ""){
						var tgl = date.value;
						var arrtgl = tgl.split("-");
						tglinput = new Date();
						tglinput.setFullYear(arrtgl[0], arrtgl[1]-1, arrtgl[2]);
						if(today > tglinput){
							alert('Tanggal yang dimasukkan tidak boleh tanggal yang sudah lalu!');
							return false;
						}
					}
					else{
						return true;
					}
				}

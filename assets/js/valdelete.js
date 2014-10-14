function valdelete(ID)
	{
		if(confirm("Hapus blog?"))
			location.href='delete.php?ID='+ID;
	}

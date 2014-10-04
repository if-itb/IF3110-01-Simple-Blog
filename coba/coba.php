<html>
<head>
    
</head>
<body>
    <p>
				  <a href="edit_post.php?pid=23">Edit</a> | <a id="deletepost23" href="#" >Hapus</a>
				</p>
			<script type="text/javascript">
			// Wait for the page to load first
			  var a23 = document.getElementById("deletepost23");
	
			  //Set code to run when the link is clicked
			  // by assigning a function to "onclick"
			  a23.onclick = function() {
				alert("lalala");
				// Your code here...
	
				//If you dont want the link to actually 
				// redirect the browser to another page,
				// "google.com" in our example here, then
				// return false at the end of this block.
				// Note that this also prevents event bubbling,
				// which is probably what we want here, but wont 
				// always be the case.
				return false;
			  
			</script>

</body>
</html>
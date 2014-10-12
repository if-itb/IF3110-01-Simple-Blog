<footer class="footer">
    <div class="back-to-top"><a href="">Back to top</a></div>
    <!-- <div class="footer-nav"><p></p></div> -->
    <div class="psi">&Psi;</div>
    <aside class="offsite-links">
        Asisten IF3110 /
        <a class="rss-link" href="#rss">RSS</a> /
        <br>
        <a class="twitter-link" href="http://twitter.com/YoGiiSinaga">Yogi</a> /
        <a class="twitter-link" href="http://twitter.com/sonnylazuardi">Sonny</a> /
        <a class="twitter-link" href="http://twitter.com/fathanpranaya">Fathan</a> /
        <br>
        <a class="twitter-link" href="#">Renusa</a> /
        <a class="twitter-link" href="#">Kelvin</a> /
        <a class="twitter-link" href="#">Yanuar</a> /
        
    </aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/fittext.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/respond.min.js"></script>
<script type="text/javascript">
  var ga_ua = '{{! TODO: ADD GOOGLE ANALYTICS UA HERE }}';

  (function(g,h,o,s,t,z){g.GoogleAnalyticsObject=s;g[s]||(g[s]=
      function(){(g[s].q=g[s].q||[]).push(arguments)});g[s].s=+new Date;
      t=h.createElement(o);z=h.getElementsByTagName(o)[0];
      t.src='//www.google-analytics.com/analytics.js';
      z.parentNode.insertBefore(t,z)}(window,document,'script','ga'));
      ga('create',ga_ua);ga('send','pageview');

  function delete_post(id){
    var r = confirm("Apakah yakin ingin menghapus ?");
    if (r==true){
        window.location = "/if3110-01-simple-blog/function/delete.php?id="+id;
    }
    if (r==false){

    }

  }

  function loadXMLDoc(email){
    // create XmlHTTP
    var xmlhttp;
    if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    else{
      throw new Error("Ajax is not supported by this browser!");
    }

    xmlhttp.onreadystatechange=function(){
      if (xmlhttp.readyState==4 && xmlhttp.status==200){
        document.getElementById("msg").innerHTML=xmlhttp.responseText;
      }
    }
    xmlhttp.open("POST","/if3110-01-simple-blog/function/validateemail.php?email="+email,true);
    xmlhttp.send();

    document.getElementById("Komentar").style.marginTop="10px";
    document.getElementById("komentar").style.paddingTop="30px";
  }

  function add_comment(email,nama,komentar,id_post){
    var xmlhttp;
    if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    else{
      throw new Error("Ajax is not supported by this browser!");
    }

    xmlhttp.onreadystatechange=function(){
      if (xmlhttp.readyState==4 && xmlhttp.status==200){
        document.getElementById("komen_baru").innerHTML=xmlhttp.responseText;
        //document.getElementById("komen_view").style.visibility="hidden";
      }
    }
    xmlhttp.open("GET","/if3110-01-simple-blog/function/tambahkomentar.php?email="+email+"&nama="+nama+"&komentar="+komentar+"&id_post="+id_post,true);
    xmlhttp.send();
  }

  function validateDate(date){
    var xmlhttp;
    if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    else{
      throw new Error("Ajax is not supported by this browser!");
    }

    xmlhttp.onreadystatechange=function(){
      if (xmlhttp.readyState==4 && xmlhttp.status==200){
        document.getElementById("msg2").innerHTML=xmlhttp.responseText;
        document.getElementById("konten").focus();
      }
    }
    xmlhttp.open("GET","/if3110-01-simple-blog/function/validatedate.php?date="+date,true);
    xmlhttp.send();
  }

  function validateForm(){
    var judul = document.getElementById("Judul").value;
    var tanggal = document.getElementById("Tanggal").value;
    var konten = document.getElementById("Konten").value;
    var validatedate = document.getElementById("msg2").innerHTML;
    console .log(judul);
    console.log(tanggal);
    console.log(konten);
    console.log(validatedate);

    if(judul != "" && tanggal != "" && konten != "" && validatedate==""){
        document.getElementById("submit").disabled = false;
    }
    else{
      document.getElementById("submit").disabled = true;
    }
  }

</script>


</body>
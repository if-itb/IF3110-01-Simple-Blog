<?php
   try{
      #Connect to MySQL
      $host = "localhost";
      $dbname = "simple_blog";
      $user = "root";
      $pass = "";
      $databaseHandler = new PDO("mysql:host=$host;dbname=$dbname;",$user,$pass);
      $databaseHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      #Query
      if(isset($_GET['id'])){
         $getArticleQuery = "SELECT * FROM article WHERE article_id = ?";
         $queryHandler = $databaseHandler->prepare($getArticleQuery);
         $queryHandler->bindParam(1,$_GET['id'],PDO::PARAM_INT);
         $queryHandler->execute();
         # setting the fetch mode
         $queryHandler->setFetchMode(PDO::FETCH_ASSOC);
         if(! $article = $queryHandler->fetch()){
            throw new Exception("The article is not exist");
         }
         
         echo "
         <!DOCTYPE html>
         <html>
         <head>

         <meta charset=\"utf-8\">
         <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
         <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">
         <meta name=\"description\" content=\"Deskripsi Blog\">
         <meta name=\"author\" content=\"Judul Blog\">

         <!-- Twitter Card -->
         <meta name=\"twitter:card\" content=\"summary\">
         <meta name=\"twitter:site\" content=\"omfgitsasalmon\">
         <meta name=\"twitter:title\" content=\"Simple Blog\">
         <meta name=\"twitter:description\" content=\"Deskripsi Blog\">
         <meta name=\"twitter:creator\" content=\"Simple Blog\">
         <meta name=\"twitter:image:src\" content=\"{{! TODO: ADD GRAVATAR URL HERE }}\">

         <meta property=\"og:type\" content=\"article\">
         <meta property=\"og:title\" content=\"Simple Blog\">
         <meta property=\"og:description\" content=\"Deskripsi Blog\">
         <meta property=\"og:image\" content=\"{{! TODO: ADD GRAVATAR URL HERE }}\">
         <meta property=\"og:site_name\" content=\"Simple Blog\">

         <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/css/screen.css\" />
         <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"img/favicon.ico\">

         <!--[if lt IE 9]>
             <script src=\"http://html5shim.googlecode.com/svn/trunk/html5.js\"></script>
         <![endif]-->

         <title>Simple Blog | Apa itu Simple Blog?</title>

         </head>

         <body class=\"default\" onload=\"update_comment()\">
         <div class=\"wrapper\">

         <nav class=\"nav\">
             <a style=\"border:none;\" id=\"logo\" href=\"index.php\"><h1>Simple<span>-</span>Blog</h1></a>
             <ul class=\"nav-primary\">
                 <li><a href=\"new_post.html\">+ Tambah Post</a></li>
             </ul>
         </nav>

         <article class=\"art simple post\">
             
             <header class=\"art-header\">
                 <div class=\"art-header-inner\" style=\"margin-top: 0px; opacity: 1;\">
                     <time class=\"art-time\">";
         echo date("j F Y",strtotime($article['article_date']));
         echo
                     "</time>
                     <h2 class=\"art-title\">$article[article_title]</h2>
                     <p class=\"art-subtitle\"></p>
                 </div>
             </header>

             <div class=\"art-body\">
                 <div class=\"art-body-inner\">
                     <hr class=\"featured-article\" />
                     $article[article_content]
                     <hr />
                     
                     <h2>Komentar</h2>

                     <div id=\"contact-area\">
                         <form method=\"post\" onsubmit=\"return validateAndSendComment()\">
                             <input type=\"hidden\" name=\"Kode\" id=\"Kode\" value=$_GET[id]>
                         
                             <label for=\"Nama\">Nama:</label>
                             <input type=\"text\" name=\"Nama\" id=\"Nama\">
                 
                             <label for=\"Email\">Email:</label>
                             <input type=\"text\" name=\"Email\" id=\"Email\">
                             
                             <label for=\"Komentar\">Komentar:</label><br>
                             <textarea name=\"Komentar\" rows=\"20\" cols=\"20\" id=\"Komentar\"></textarea>

                             <input type=\"submit\" name=\"submit\" value=\"Kirim\" class=\"submit-button\">
                         </form>
                     </div>

                     <ul id=\"comment_pool\" class=\"art-list-body\">
                     </ul>
                 </div>
             </div>

         </article>

         <footer class=\"footer\">
             <div class=\"back-to-top\"><a href=\"\">Back to top</a></div>
             <!-- <div class=\"footer-nav\"><p></p></div> -->
             <div class=\"psi\">&Psi;</div>
             <aside class=\"offsite-links\">
                 Asisten IF3110 /
                 <a class=\"rss-link\" href=\"#rss\">RSS</a> /
                 <br>
                 <a class=\"twitter-link\" href=\"http://twitter.com/YoGiiSinaga\">Yogi</a> /
                 <a class=\"twitter-link\" href=\"http://twitter.com/sonnylazuardi\">Sonny</a> /
                 <a class=\"twitter-link\" href=\"http://twitter.com/fathanpranaya\">Fathan</a> /
                 <br>
                 <a class=\"twitter-link\" href=\"#\">Renusa</a> /
                 <a class=\"twitter-link\" href=\"#\">Kelvin</a> /
                 <a class=\"twitter-link\" href=\"#\">Yanuar</a> /
                 
             </aside>
         </footer>

         </div>

         <script type=\"text/javascript\" src=\"assets/js/fittext.js\"></script>
         <script type=\"text/javascript\" src=\"assets/js/app.js\"></script>
         <script type=\"text/javascript\" src=\"assets/js/respond.min.js\"></script>
         <script type=\"text/javascript\" src=\"assets/js/post_comment.js\"></script>
         <script type=\"text/javascript\" src=\"assets/js/validator.js\"></script>
         <script type=\"text/javascript\">
           var ga_ua = '{{! TODO: ADD GOOGLE ANALYTICS UA HERE }}';

           (function(g,h,o,s,t,z){g.GoogleAnalyticsObject=s;g[s]||(g[s]=
               function(){(g[s].q=g[s].q||[]).push(arguments)});g[s].s=+new Date;
               t=h.createElement(o);z=h.getElementsByTagName(o)[0];
               t.src='//www.google-analytics.com/analytics.js';
               z.parentNode.insertBefore(t,z)}(window,document,'script','ga'));
               ga('create',ga_ua);ga('send','pageview');
         </script>

         </body>
         </html>
         ";
      }else{
         throw new Exception("No update_id detected");
      }
      
      #Close connection
      $databaseHandler = null;
   }catch(PDOException $e){
      echo "Sorry, there is a problem now. Please come again later";
      file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
   }catch(Exception $e){
      echo "Sorry, there is a problem now. Please come again later";
   }
?>
<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Bug Bounty</title>

    <link href="./css/htmlstyles.css" rel="stylesheet">
	</head>

  <body>

    <div class="container-narrow">
        <div class="jumbotron">
			<h1 style="color:white">SQL Injection - Training</h1>
			<p class="lead" style="color:white">
        Pada panduan ini merupakan sesi dalam mencari bug menggunakan metode manual untuk sql injections
			</p>
        </div>
		<br />

      <div class="row marketing">
        <div class="col-lg-6">
		  <h4><a href="register.php" style="color:#B31D14">register.php - user registration page</a></h4>
          <p>
            Halaman ini memberikan user / pengguna untuk dapat menggunakan pendaftaran silahkan buat beberapa user di dalamnya.

          </p>

          <h4><a href="login1.php" style="color:#B31D14">login1.php - basic injection page</a></h4>
          <p>
            Halaman ini merupakan halaman sederhana dalam sql injection dengan memanfaatkan enumerate untuk mem bypass user auth algoritma

          </p>

		  <h4><a href="login2.php" style="color:#B31D14">login2.php - basic injection page with brackets</a></h4>
          <p>
            Halaman berikut mengandung yang sedikit di manipulasi untuk dapat di manipulasi query yang ada.

</p>

         <h4><a href="searchproducts.php" style="color:#B31D14">searchproducts.php - multiple exercises</a></h4>
          <p>Page contains code that fetches multiple entries from the DB, can be abused to extract arbitrary data</p>

          <h4><a href="secondorder_register.php" style="color:#B31D14">secondorder_register.php - allows registration with quotes</a></h4>
          <p>
            Halaman yang memberikan akses user untuk dapat menggunakan beberapa query yang tidak di lakukan validasi, sehingga bisa membahayakan sistem.

            </p>

		  <h4><a href="secondorder_changepass.php" style="color:#B31D14">secondorder_changepass.php - allows users to change their password</a></h4>
          <p>Page doesn't function as advertised. Only used to show second order SQLi</p>
          <h4>
            <a href="blindsqli.php?user=voldemort"  style="color:#B31D14">blindsqli.php - vulnerable to content and time based blind SQLi</a></h4>

          <p>Page is vulnerable to blind sql injection using both changes in content as well as response times. Data can be extracted using true and false statements.</p>

		  <h4><a href="os_sqli.php?user=frodo" style="color:#B31D14">os_sqli.php - can be used to interact with the filesystem and the OS via MySQL databases</a></h4>
          <p>Can be used to interact with the OS, including reading and writing of files and other tasks.</p>

    
        </div>


      </div>

    </div> <!-- /container -->



</body></html>

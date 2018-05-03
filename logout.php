<?php include("includes/header.php") ?>
<?php include("includes/function.php") ?>
<?php
$message = 'samp';
  $name = '';
if(isset($_COOKIE['id']) && isset($_COOKIE['security'])){
  $id = find_user($_COOKIE['id']);
    $message = "You are logged out <small class='name-header'>".$id.".</small>";
      $name = " <small class='name-message'>". $id."</small>";
      setcookie("id","",0,"/");
        setcookie("security","",0,"/");
            setcookie("post_id","",0,"/");
} else {
    $message = "You have to login first!";
}
?>
<div class="container">
  <div class="rows">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="panel panel-success logout">
        <div class="panel-heading text-head"><?php echo $message; ?></div>
        <div class="panel-body page-display">
            <div class="row">
              <div class="col-md-4">
                <img src="img/aiman.jpg" class="thumbnail">
                  <div class="container menu">
                    <a href="login.php" class="btn btn-primary">Login</a>
                  </div>
                  <div class="container menu">
                    <a href="signin.php" class="btn btn-primary">Register</a>
                  </div>
                  <div class="container menu">
                    <a href="contacts.php" class="btn btn-primary">Contacts</a>
                  </div>
                  <div class="container menu">
                    <a href="contacts.php" class="btn btn-primary">Comments</a>
                  </div>
              </div>
              <div class="col-md-8">
                <div class="panel panel-primary">
                  <div class="panel-heading text-head">Author's Message</div>
                    <div class="panel-body body-text-content">Hi<?php echo $name; ?>. Thank you for taking time browse and check my website. My name is <small class="my-name">Leo Espinosa</small> and I am a fullstack web developer based in Bensenville Illinois. All the services of my website are free. I do not charge anything. You can signup for free and write post photos and personal messages on your homepage. If you want to download the codes for this website, you can click <a href="#">here</a>. There are no limits of data for each user. Si necesitas mi servicos, puedes me contactar en cualquier momento por haciendo clic en el boton de contacto.</div>
                  <div class="panel-heading text-head">Skill sets</div>
                    <div class="panel-body">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>HTML</td>
                            <td>CSS3</td>
                            <td>Booststrap</td>
                          </tr>
                          <tr>
                            <td>JScript</td>
                            <td>Node.js</td>
                            <td>React</td>
                          </tr>
                          <tr>
                            <td>PHP</td>
                            <td>MySql</td>
                            <td>Python</td>
                          </tr>
                          <tr>
                            <td>ECMA6</td>
                            <td>P5</td>
                            <td>jQuery</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
              </div>
              <div class="col-md-8"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
<?php include("includes/footer.php") ?>

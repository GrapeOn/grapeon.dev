
<nav class="navbar navbar-default">
  <div class="container-fluid">
	<!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-haspopup="true" aria-expanded="true">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">GrapeOn</a>
    </div>

    <!--  Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="ads.index.php">About <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Food <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="ads.index.php?keyword=grapes">Grapes</a></li>
            <li><a href="ads.index.php?keyword=raisins">Raisins</a></li>
            <li><a href="ads.index.php?keyword=jelly">Jelly</a></li>
<!--             <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li> -->
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Drink <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="ads.index.php?keyword=wines">Wines</a></li>
            <li><a href="ads.index.php?keyword=juice">Juice</a></li><!-- 
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more link</a></li> -->
          </ul>
        </li>
        <li><a href="#">Events</a></li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="ads.create.php">Create Ad</a></li>
        <li><a href="auth.login.php">LogIn</a></li>
          <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <!-- <button type="submit" class="btn btn-default">Submit</button> -->
      </form>
      </ul>
    </div> <!-- /.navbar-collapse  -->
  </div> <!--  /.container-fluid  -->
</nav>

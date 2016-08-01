<?php session_start();?>
<?php include 'layout/header.php'; ?>

<!-- Header is in a separate php file (header.php), to prevent duplicating it on each page  -->
<script type="text/javascript">
$(document).ready(function(){
	validateLogin();
});
</script>
<?php
$email = "";
$pwd = "";
$searchTerm = NULL; 
include 'phpScripts/loginValidation.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if ($user->isUserLoggedIn()){
    	$searchTerm = $_POST['searchBox'];
	}       
}//POST
?>

<div ng-app="liveSearch">
    <div ng-controller="liveSearchController">
        <section id="searchWrapper">
            <h2 class="search">Search</h2>
            <form method="post" id="frmSearch">
                <input class="searchBox" ng-model="searchString" ng-change="search()" name="txtSearch" id="txtSearch" type="text" placeholder="Type to search..."/>
                <input type="submit" text="Search" class="searchBtn"/>
            </form>
        </section>

        <?php if ($user->isUserLoggedIn()){?>
        <section id="resultsWrapper">
            <h2 class="results">Results</h2>
            <ul>
                <li ng-repeat="r in results">
                    {{r}}
                 </li>
                 <li ng-show="!results.length">No results to display.</li>
            </ul>
         </section>
    </div> <!-- end of ng-controller (inside if user logged in)-->
</div> <!-- end of ng-app (inside if user logged in) -->
        <?php } 
        else{ ?>
            </div><!-- (outside if user logged in) -->
        </div><!-- (outside if user logged in) -->
        <div id="overlay">
        </div>
        <div id="pleaseLogIn">
            <?php include 'views/loginView.php'; ?>
        </div>
        <?php  } ?>


<!-- Footer is in a separate php file (header.php), to prevent duplicating it on each page -->        
<?php include 'layout/footer.php'; ?>  

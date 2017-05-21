<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="description" content="tekst" />	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Gulaga, the best second screen innovation on the market right now." />
    <meta name="keywords" content="Second, Screen, Gulaga, Quizz, Quiz, Innovation, website, design, television, operator" />
    <meta name="author" content="meta-tags generator">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" href="css/swiper.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="icon" href="favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Teko' rel='stylesheet' type='text/css'>
    <title>Gulaga - Second screen</title>
	<script src="js/libs/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div id="nav" class="nav cf">
        <nav class="cf">
            <div class="navbar__logo">
                <a href="#top" class="logo">Logo</a>
            </div>
            <div class="navbar__center cf">
                <a href="#top" class="home">HOME</a>
                <a href="#products" class="shop">SHOP</a>
                <a href="#about" class="about-us">ABOUT US</a>
                <a href="#contact" class="contact">CONTACT</a>
            </div>
        </nav>
    </div>
	<div class="wrapper">
	    <a id="top"></a>
		<header class="main-header">
			<h1>GULAGA</h1>
		</header>
		<div class="products cf">
            <a id="products"></a>
            <div class="width productlist">
                <h2>OUR PRODUCTS</h2>
                <?php
                    include "global.php";
                    for ($i = 1; $i < 4; $i++) {
                        $query = $GLOBALS["conn"]->query("SELECT * FROM products WHERE id = {$i}");
                        while ($row = $query->fetch_array()) {
                            $class = strtolower($row["name"]);
                            echo '<section class="' . $class . '">
                            <img src="http://placehold.it/130x130" alt="" />   
                            <h2>' . $row["name"] . '</h2>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                            <p>mollit anim id est laborum."Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." <a href="#" onClick="showDiv(\'' . $class . '\');">More info</a></p>
                            </section>';
                        }
                    }
                ?>
            </div>
            <?php
                    for ($i = 1; $i < 4; $i++) {
                        $query = $GLOBALS["conn"]->query("SELECT * FROM products WHERE id = {$i}");
                        while ($row = $query->fetch_array()) {
                            $class = strtolower($row["name"]);
                            $pros = explode(";", $row["includes"]);
                            $class2 = strtoupper($class);
                            echo '
                <div class="width detailpage__' . $class . ' cf detailpage">
                <h2>GULAGA: ' . $row["name"] . '</h2>
                <div class="swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide"><img class="slide" src="http://placehold.it/350x250" alt=""></div>
                        <div class="swiper-slide"><img class="slide" src="http://placehold.it/350x250" alt=""></div>
                        <div class="swiper-slide"><img class="slide" src="http://placehold.it/350x250" alt=""></div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <div class="content">
                    <h3>DESCRIPTION</h3>'
                     . $row["description"] .            
                    '<h3>INCLUDES</h3>
                    <ul>';
                        for ($j = 0; $j < count($pros); $j++) {
                            echo "<li>" . $pros[$j] . "</li>";
                        }
                    echo '</ul>
                    <button onClick="buyNow(\''.$class2.'\');" class="buynow">BUY NOW</button>
                </div>
                <div class="reviews">
                    <h2>REVIEWS</h2>';
                    
                    $reviewquery = $GLOBALS["conn"]->query("SELECT * FROM reviews WHERE productid = {$row["id"]}");
                    while ($rev = $reviewquery->fetch_array()) {
                    echo '<article class="review">
                        <h3>'.$rev["title"].'</h3>
                        <p class="date">By '.$rev["name"].', '.date("F d\, Y", strtotime($rev["date"])).'</p>
                        <p>'.$rev["content"].'</p>
                        </article>';
                    }
                echo '</div>
                <button class="goback">Go back</button>
            </div>';
                        }
                    }
                ?>
            <div class="checkoutForm width cf">
                <h2>CHECKOUT</h2>
                <p>GULAGA: <span class="checkoutType"></span><br />Price: &euro; <span class="checkoutPrice"></span></p>
                <form action="#" method="post" name="checkout">
                    <span class="left"><label for="fname">First Name*</label><br />
                        <input type="text" id="fname" name="fname"><br /></span>
                    <span class="right"><label for="lname">Last name*</label><br />
                        <input type="text" id="lname" name="lname"><br /></span>
                    <span class="left"><label for="bday">Birthdate*</label><br />
                        <input type="text" id="bday" name="bday"><br /></span>
                    <span class="right"><label for="company">Company</label><br />
                        <input type="text" id="company" name="company"><br /></span>
                    <span class="left"><label for="street">Street + nr*</label><br />
                        <input type="text" id="street" name="street"><br /></span>
                    <span class="right"><label for="city">City*</label><br />
                        <input type="text" id="city" name="city"><br /></span>
                    <span class="left"><label for="country">Country*</label><br />
                        <input type="text" id="country" name="country"><br /></span>
                    <span class="right"><label for="email">Email*</label><br />
                        <input type="email" id="email" name="email"><br /></span>
                        <input type="text" id="product" name="product">
                    
                    
                    <div class="payTypes">
                    <h3>PAYMENT TYPE</h3>
                    <input type="radio" name="payType" value="mastercard" id="mastercard"><label for="mastercard">Master Card</label><br />
                    <input type="radio" name="payType" value="visa" id="visa"><label for="visa">VISA</label><br />
                    <input type="radio" name="payType" value="americanexpress" id="americanexpress"><label for="americanexpress">American Express</label><br />
                    <input type="radio" name="payType" value="paypal" id="paypal"><label for="paypal">Paypal</label><br />
                    <input type="radio" name="payType" value="banktransfer" id="banktransfer"><label for="banktransfer">Bank transfer</label><br />
                    <span class="checkouterrors"></span>
                    <input type="submit" class="checkoutSub" value="SUBMIT"><button class="cancelForm">CANCEL</button><br />
                    </div>
                </form>            
            </div>
		</div>
		
		<div class="main__about cf">
            <a id="about"></a>
            <h2>ABOUT US</h2>
		    <div class="about__we">
                <div class="left">
                    <section class="box__who cf">
                        <img src="http://placehold.it/90x90" alt="" class="who__pic">
                        <div class="content">
                        <h2>WHO ARE WE</h2>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                        <p>mollit anim id est laborum."Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." <a href="#">More info</a></p>
                        </div>
                    </section>
                    <section class="box__who cf">
                        <img src="http://placehold.it/90x90" alt="" class="who__pic">
                        <div class="content">
                        <h2>REGULAR</h2>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                        <p>mollit anim id est laborum."Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." <a href="#">More info</a></p>
                        </div>
                    </section>
                </div>
                <section class="box__team">
                    <h2>OUR TEAM</h2>
                    <ul>
                        <li><img src="http://placehold.it/50x50" alt="" class="team__pic"><span>Sam Amant - CEO</span></li>
                        <li><img src="http://placehold.it/50x50" alt="" class="team__pic"><span>Michaël Schauwers - CTO</span></li>
                        <li><img src="http://placehold.it/50x50" alt="" class="team__pic"><span>Mitch van Hecke</span></li>
                        <li><img src="http://placehold.it/50x50" alt="" class="team__pic"><span>Andy de Cock</span></li>
                    </ul>
                </section>
		    </div>
		</div>
		
		<div class="main__contact cf">
           <a id="contact"></a>
            <h2>CONTACT</h2>
		    <form action="#" onsubmit="submitForm()" method="post" name="contactform" class="width cf contact-form">
                <div class="left">
                    <label for="name">Name</label><br />
                    <input type="text" placeholder="" name="name" id="name"><br />
                    <label for="mail">Email</label><br />
                    <input type="email" placeholder="" name="email" id="mail"><br />
                    <label for="subject">Subject</label><br />
                    <input type="text" placeholder="" name="subject" id="subject"><br />
                </div>
                <label for="message">Message</label><br />
		        <textarea placeholder="" name="message" id="message"></textarea>	       
		        <input type="submit" name="contact-send" class="subcontact">
		        <span class="contacterrors"></span>	 
		    </form>
		</div>
		
		<footer>
			<p>&copy; Copyright - Sam Amant 2016</p>
		</footer>
	</div>
	<script src="js/libs/jquery-2.1.4.min.js"></script>
	<script src="js/swiper.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
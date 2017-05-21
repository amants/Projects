<?php
/**
 * Veiling
 */

require_once( __DIR__ . '/DAO/VeilingenDAO.php');
$VeilingenDAO = new VeilingenDAO();



if (isset($_POST['subbod'])) {
	$data = array(
    'object_id' => $_POST['id'],
		'name' => $_POST['name'],
		'bid'  => $_POST['bid']
	);
	$errors = $VeilingenDAO->validate($data);

	if (empty($errors)) {
		$insertResult = $VeilingenDAO->insert($data);
	} else {
    unset($_POST['id']);
		unset($_POST['name']);
		unset($_POST['bid']);
	}
}
if (isset($_POST["subbod1"])) {
	$data = array(
    'object_id' => $_POST['id'],
		'name' => $_POST['name'],
		'bid'  => $_POST['bid']
	);
	$errors1 = $VeilingenDAO->validate($data);

	if (empty($errors1)) {
		$insertResult = $VeilingenDAO->insert($data);
	} else {
    unset($_POST['id']);
		unset($_POST['name']);
		unset($_POST['bid']);
	}
}
if (isset($_POST["subbod2"])) {
	$data = array(
    'object_id' => $_POST['id'],
		'name' => $_POST['name'],
		'bid'  => $_POST['bid']
	);
	$errors2 = $VeilingenDAO->validate($data);

	if (empty($errors2)) {
		$insertResult = $VeilingenDAO->insert($data);
	} else {
    unset($_POST['id']);
		unset($_POST['name']);
		unset($_POST['bid']);
	}
}
if (isset($_POST["subbod3"])) {
	$data = array(
    'object_id' => $_POST['id'],
		'name' => $_POST['name'],
		'bid'  => $_POST['bid']
	);
	$errors3 = $VeilingenDAO->validate($data);

	if (empty($errors3)) {
		$insertResult = $VeilingenDAO->insert($data);
	} else {
    unset($_POST['id']);
		unset($_POST['name']);
		unset($_POST['bid']);
	}
}
if (isset($_POST["subbod4"])) {
	$data = array(
    'object_id' => $_POST['id'],
		'name' => $_POST['name'],
		'bid'  => $_POST['bid']
	);
	$errors4 = $VeilingenDAO->validate($data);

	if (empty($errors4)) {
		$insertResult = $VeilingenDAO->insert($data);
	} else {
    unset($_POST['id']);
		unset($_POST['name']);
		unset($_POST['bid']);
	}
}
$bidsTsjernobyl = $VeilingenDAO->topThreeBids(1);
$bidsArea = $VeilingenDAO->topThreeBids(2);
$bidsSnake = $VeilingenDAO->topThreeBids(3);
$bidsForbidden = $VeilingenDAO->topThreeBids(4);
$bidsKremlin = $VeilingenDAO->topThreeBids(5);

if (isset($_POST["contactsub"])) {
	$errorsContact = [];
	if (!isset($_POST["name"])) {
		$errorsContact["name"] = "Gelieve uw naam in te vullen.";
	}
	if (!isset($_POST["email"])) {
		$errorsContact["email"] = "Gelieve uw email in te vullen.";
	}
	if (!isset($_POST["message"])) {
		$errorsContact["message"] = "Gelieve een bericht mee te geven.";
	}
	if (empty($errorsContact)) {
		$data = array(
			htmlspecialchars($_POST["name"]),
			htmlspecialchars($_POST["email"]),
			nl2br(htmlspecialchars($_POST["message"]))
		);
		$to = 'sam.amant@student.howest.be';
		$subject = 'Contact form submission - Apocamp';
		$message = "
		<html>
		<head>
		  <title>Contact Form submission</title>
		</head>
		<body>
		  <p>Name: {$data[0]}</p>
			<p>Email: <a href='mailto:{$data[1]}'>{$data[1]}</a></p>
			<hr />
			<p>{$data[2]}</p>
		</body>
		</html>
		";
		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-type: text/html; charset=iso-8859-1';
		$headers[] = 'From: Apocamp contact <noreply@apocamp.com>';
		mail($to, $subject, $message, implode("\r\n", $headers));
	}
}


?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" type="image/png" href="./images/favicon.png" />
  <link rel="stylesheet" href="./css/reset.css" />
  <link rel="stylesheet" href="./css/style.css" />
  <title>Apocamp</title>
</head>
<body>
  <header>
    <nav>
      <a href=""><img src="./images/logo.png" alt="Logo" /></a>
      <a href="#">Home</a>
      <a href="#wie">Wie zijn wij</a>
      <a href="#veilingen">Veilingen</a>
      <a href="#contact">Contact</a>
    </nav>
    <h1>Apocamp: Unieke kampeerervaringen</h1>
  </header>
  <main>
    <section id="wie" class="main__wie">
      <div class="center">
        <h2>Wie zijn wij</h2>
        <p>
          Wij zijn <a href="#">Apocamp</a> Een bedrijf opgericht zodat mensen zouden kunnen kamperen op plaatsen waar je noromaal zelf niet binnen mag. Aangezien we zelf maar een beperkt aantal plaatsen hebben zijn we genoodzaakt om alles te verkopen aan de hoogste bieder. Hierdoor kunnen we in de toekomst nog grootsere locaties aanbieden.
        </p>
      </div>
    </section>
    <section id="veilingen" class="main__veilingen">
      <div class="previous">
        <img src="./images/pijllinks.png" alt="Pijl links" />
      </div>
      <div class="next">
        <img src="./images/pijlrechts.png" alt="Pijl rechts" />
      </div>
      <h2>Actieve veilingen</h2>
      <div class="veilingen__container">
        <article class="veilingen__tsjernobyl">
          <img src="./images/tsjernobyl.png" alt="Tsjernobyl" />
          <h3>Tsjernobyl</h3>
          <p class="countdown countTjer">
            DD - HH - MM - SS
          </p>
          <p>
            Ooit al eens afgevraagd hoe een stad eruit ziet na een nucleaire ontploffing? Hier trekken we 3 dagen door Tsjernobyl. Geen paniek, we voorzien alle benodigdheden om zelf niet besmet te raken door te straling. We hebben bewakers voor moesten er gemuteerde monsters ons aanvallen.
          </p>
          <div class="main__biedingen">
            <h3>Biedingen</h3>
            <div class="biedingen">
              <div class="boden__tsjernobyl">
                <table>
                  <?php
										$i = 1;
										foreach ($bidsTsjernobyl as $bid) {
											echo "
											<tr>
												<td>{$i}</td>
												<td>{$bid["name"]}</td>
												<td>{$bid["bid"]} Caps</td>
											</tr>";
											$i++;
										}
									?>
                </table>
              </div>
              <div class="bod__plaatsen">
                <form action="index.php" method="post">
                  <input type="text" value="1" name="id" hidden />
                  <input type="text" name="name" placeholder="Naam + Voornaam" required/>
                  <input type="text" name="bid" placeholder="Bod" required/>
                  <input type="submit" name="subbod"  />
                </form>
								<p>
									<?php
									if (!empty($errors)) {
										foreach($errors as $error) {
											echo $error;
										}
									}
									?>
								</p>
              </div>
            </div>
          </div>
        </article>
        <article class="veilingen__area51">
          <img src="./images/area51.png" alt="Area 51" />
          <h3>Area 51</h3>
          <p class="countdown countArea">
            DD - HH - MM - SS
          </p>
          <p>
            Hier wordt als we de geruchten mogen geloven experimenten gedaan op buitenaardse wezens. Als special voor dit jaar mogen we Area 51 ook aan onze lijst toevoegen. Let wel op: voor de trip moet je een geheimhoudingsverklaring tekenen.
          </p>
          <div class="main__biedingen">
            <h3>Biedingen</h3>
            <div class="biedingen">
              <div class="boden__area51">
								<table>
                  <?php
										$i = 1;
										foreach ($bidsArea as $bid) {
											echo "
											<tr>
												<td>{$i}</td>
												<td>{$bid["name"]}</td>
												<td>{$bid["bid"]} Caps</td>
											</tr>";
											$i++;
										}
									?>
                </table>
              </div>
              <div class="bod__plaatsen">

                <form action="index.php" method="post">
                  <input type="text" value="2" name="id" hidden />
                  <input type="text" name="name" placeholder="Naam + Voornaam" required/>
                  <input type="text" name="bid" placeholder="Bod" required/>
                  <input type="submit" name="subbod1"  />
									<p>
										<?php
										if (!empty($errors1)) {
											foreach($errors1 as $error) {
												echo $error;
											}
										}
										?>
									</p>
                </form>
              </div>
            </div>
          </div>
        </article>
        <article class="veilingen__snakeisland">
          <img src="./images/snakeisland.png" alt="Snake island" />
          <h3>Snake island</h3>
          <p class="countdown countSnake">
            DD - HH - MM - SS
          </p>
          <p>
            Ilha da Queimada Grande, ook wel bekend als Snake Island of slangen eiland.  Het is een beschermd natuurreservaat dicht begroeid en heeft een steile rotskust. Speciaal voor de natuurlijk avonturier. We voorzien jullie van een gids en alle overlevingsbenodigdheden. Je zal op de natuur moeten overleven!
          </p>
          <div class="main__biedingen">
            <h3>Biedingen</h3>
            <div class="biedingen">
              <div class="boden__snake">
								<table>
                  <?php
										$i = 1;
										foreach ($bidsSnake as $bid) {
											echo "
											<tr>
												<td>{$i}</td>
												<td>{$bid["name"]}</td>
												<td>{$bid["bid"]} Caps</td>
											</tr>";
											$i++;
										}
									?>
                </table>
              </div>
              <div class="bod__plaatsen">
                <form action="index.php" method="post">
                  <input type="text" value="3" name="id" hidden />
                  <input type="text" name="name" placeholder="Naam + Voornaam" required/>
                  <input type="text" name="bid" placeholder="Bod" required/>
                  <input type="submit" name="subbod2"  />
                </form>
								<p>
									<?php
									if (!empty($errors2)) {
										foreach($errors2 as $error) {
											echo $error;
										}
									}
									?>
								</p>
              </div>
            </div>
          </div>
        </article>
        <article class="veilingen__forbiddencity">
          <img src="./images/forbiddencity.png" alt="Forbidden City" />
          <h3>Forbidden City</h3>
          <p class="countdown countForbidden">
            DD - HH - MM - SS
          </p>
          <p>
            Ooit al een gehoord van de "Verboden Stad"? Dit is het paleis van de Chinese emperor en is extreem moeilijk om binnen te raken. Waan jezelf de leider van China en woon als een keizer in dit prachtige palijs voor wel 3 dagen en 4 nachten!
          </p>
          <div class="main__biedingen">
            <h3>Biedingen</h3>
            <div class="biedingen">
              <div class="boden__forbidden">
								<table>
                  <?php
										$i = 1;
										foreach ($bidsForbidden as $bid) {
											echo "
											<tr>
												<td>{$i}</td>
												<td>{$bid["name"]}</td>
												<td>{$bid["bid"]} Caps</td>
											</tr>";
											$i++;
										}
									?>
                </table>
              </div>
              <div class="bod__plaatsen">
                <form action="index.php" method="post">
                  <input type="text" value="4" name="id" hidden />
                  <input type="text" name="name" placeholder="Naam + Voornaam" required/>
                  <input type="text" name="bid" placeholder="Bod" required/>
                  <input type="submit" name="subbod3"  />
                </form>
								<p>
									<?php
									if (!empty($errors3)) {
										foreach($errors3 as $error) {
											echo $error;
										}
									}
									?>
								</p>
              </div>
            </div>
          </div>
        </article>
        <article class="veilingen__kremlin">
          <img src="./images/kremlin.png" alt="Kremlin" />
          <h3>Kremlin</h3>
          <p class="countdown countKremlin">
            DD - HH - MM - SS
          </p>
          <p>
            Het Kremlin. Ben je zelf een fan van Putin, iets hebt voor militairen of gewoon weg van de bouwstijl, hier komt alles goed aan bod. Kies voor de dagregime van Putin door te maken of 3 dagen lang de loeiharde opleiding van het Russische leger volgen aan jou de keus.
          </p>
          <div class="main__biedingen">
            <h3>Biedingen</h3>
            <div class="biedingen">
              <div class="boden__kremlin">
								<table>
                  <?php
										$i = 1;
										foreach ($bidsKremlin as $bid) {
											echo "
											<tr>
												<td>{$i}</td>
												<td>{$bid["name"]}</td>
												<td>{$bid["bid"]} Caps</td>
											</tr>";
											$i++;
										}
									?>
                </table>
              </div>
              <div class="bod__plaatsen">
                <form action="index.php" method="post">
                  <input type="text" value="5" name="id" hidden />
                  <input type="text" name="name" placeholder="Naam + Voornaam" required/>
                  <input type="text" name="bid" placeholder="Bod" required/>
                  <input type="submit" name="subbod4"  />
                </form>
								<p>
									<?php
									if (!empty($errors4)) {
										foreach($errors4 as $error) {
											echo $error;
										}
									}
									?>
								</p>
              </div>
            </div>
          </div>
        </article>
      </div>
    </section>
    <section id="contact" class="main__contact">
      <h2>Contact</h2>
      <form action="index.php" method="post">
        <input type="text" name="name" placeholder="Naam + Voornaam" required />
        <input type="email" name="email" placeholder="Email" required />
        <textarea name="message" placeholder="Message" required></textarea>
        <input type="submit" name="contactsub" />
      </form>
    </section>
  </main>
  <script src="./js/script.js"></script>
</body>
</html>

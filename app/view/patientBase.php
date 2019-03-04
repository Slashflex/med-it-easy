<?php $title = 'Med It Easy | Patientèle'; ?>

<?php ob_start(); ?>

<div class="container">

    <div id="offCanva">
        <input id="menu-trigger" type="checkbox">
        <label id="label" for="menu-trigger" onclick="document.getElementById('offCanva').classList.toggle('open');"><i
                class="fas fa-tools fa-2x"></i></label>

        <div id="content">
            <div class="header_connected">
                <h4>Bienvenue Docteur
                    <?= ucfirst($_SESSION['praticienPrenom']) . ' ' . ucfirst($_SESSION['praticienNom']) . ' '. $_SESSION['specialite']; ?>
                </h4>
            </div>
            <p class="text-center margin">Vous êtes sur la page de gestion de votre profil, d'ici vous pourrez voir et
                gérer votre patientèle.</p>
            <p>Prénoms<span class="lol">Noms</span><span class="lol">Dates de naissances</span><span class="lol">Emails</span></p>

            <?php while ($data = $praticien->fetch()): ?>
            <div class="row">
                <p><?= '<p class="lol">' . ucfirst($data['patientPrenom'] . '</p>' .
               '<p class="lol">' . $data['patientNom'] . '</p>' .
               '<p class="lol">' . $data['patientDate'] . '</p>' .
               '<p class="lol">' . $data['email'] . '</p>'); ?>
                </p>
            </div>
            <?php endwhile; ?>
        </div>

        <nav id="offCanvaNav">
            <!-- Displaying the time and date in the off-canva menu -->
            <div class="dateNav mx-auto">
                <?php setlocale(LC_ALL, 'fr_FR'); ?><?=  ucfirst(strftime("%A %e %B %Y", mktime())) . '<br>' . strftime("%H : %M", mktime());?>
            </div>
            <ul class="menu mx-auto">
                <li><a href="index.php?action=accueil"><i class="fas fa-home"></i> Accueil</a></li>
                <li><a href="index.php?action=agendaAdmin"><i class="far fa-calendar-alt fa-1x"></i> Agenda</a></li>
                <li><a href="index.php?action=pricings"><i class="fas fa-hand-holding-usd fa-1x"></i> Tarifs</a></li>
                <li><a href="index.php?action=searchbarAdmin"><i class="fas fa-search fa-1x"></i> Recherche</a></li>
                <li><a href="index.php?action=adminSchedule"><i class="far fa-clock fa-1x"></i> Horaires</a></li>
                <li><a href="index.php?action=patientBase"><i class="fas fa-users"></i> Patientèle</a></li>
            </ul>
        </nav>
    </div>

</div>






<?php $content = ob_get_clean(); ?>

<?php require('app\view\template.php');

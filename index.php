<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Portfolio | Nick Forster</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Shadows+Into+Light&display=swap"
          rel="stylesheet">
    <script src="index.js" defer></script>
</head>
<body id="home">
<?php
$firstnameErr = $lastnameErr = $emailErr = $regardErr = $messageErr = '';
$firstname = $lastname = $email = $regard = $message = '';

// validation when the submit button is pressed
if (isset($_POST['submit'])) {
    $valid = true;
    $firstname = test_input($_POST['firstname']);
    $lastname = test_input($_POST['lastname']);
    $email = test_input($_POST['email']);
    $regard = test_input($_POST['regard']);
    $message = test_input($_POST['message']);


    if (strlen($firstname) >= 40 || strlen($firstname) <= 2) {
        $valid = false;
        $firstnameErr = 'Please enter a correct Firstname';
    }
    if (strlen($lastname) >= 40 || strlen($lastname) <= 2) {
        $valid = false;
        $lastnameErr = 'Please enter a correct Lastname';
    }
    if (strlen($regard) >= 40 || strlen($regard) <= 2) {
        $valid = false;
        $regardErr = 'Please enter a correct Regard';
    }
    if (strlen($message) <= 5) {
        $valid = false;
        $messageErr = 'Please enter a correct Message';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $valid = false;
        $emailErr = 'Please enter a correct E-Mail';
    }

    // sending the mail when everything is valid
    if ($valid) {
        $finalMessage = $firstname.' '.$lastname.'<br>'.$email.'<br>'.$message;
        mail('nick_forster@icloud.com', $regard, $message);
        echo "<style>#response { display: flex !important; }</style>";
        $firstnameErr = $lastnameErr = $emailErr = $regardErr = $messageErr = '';
        $firstname = $lastname = $email = $regard = $message = '';
        ?> <script>history.pushState({}, "", "")</script> <?php
    }
    ?>
    <script>window.location += '#contact' </script>
    <?php
}

// resetting all values when reset button is pressed
if (isset($_POST['reset'])) {
    $firstnameErr = $lastnameErr = $emailErr = $regardErr = $messageErr = '';
    $firstname = $lastname = $email = $regard = $message = '';
    ?>
    <script>window.location += '#contact' </script>
    <?php
}

function test_input($data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

?>
<header id="header">
    <a href="#home">about</a>
    <!-- <a href="#about">about</a> -->
    <a href="#projects">projects</a>
    <a href="#contact">contact</a>
    <a href="https://github.com/nickforster" target="_blank"><i class="fa fa-github"></i></a>
</header>
<main>
    <div id="about">
        <h1>Nick</h1>
        <h1>Forster</h1>
        <img src="images/cartoonishMe.png" alt="cartoon image of my face">
        <p>
            Hi! I'm Nick Forster. I'm a developer from Zürich. I'm in my last year of highschool
            with focus on informatics. I mainly program in Java and JavaScript but I'm always
            open to try new languages.
        </p>
    </div>
    <div id="projects">
        <h2>projects</h2>
        <div id="grid-container">
            <div id="online-shopping">
                <h3>Website about kinds of shopping
                    <a href="https://github.com/nickforster/online-vs-normal-website" target="_blank">
                        <i class="fa fa-github"></i>
                    </a>
                </h3>
                <p>
                    This is a simple website made with HTML, CSS and JavaScript. It was a school project with to friends
                    of mine.
                    The goal of the website was to answer a question or a debate that isn't already clearly answered on
                    the internet.
                    We choose to list the pros and cons of shopping online versus shopping "normally" in a shop. Because
                    it was a
                    Project from school the website and its context is in german.
                </p>
            </div>
            <div id="groupManagement">
                <h3>Group management
                    <a href="https://github.com/nickforster/GroupManagement/" target="_blank">
                        <i class="fa fa-github"></i>
                    </a>
                </h3>
                <p>
                    This application manages groups/classes with their respective students and teachers.
                    The program lets you add, edit and remove each of the persons. You can add students and teachers to
                    a class.
                    All the changes of data are saved in JSON files but can be reset when using the restore service.
                    There are
                    three different roles implemented in the program: guest, user and admin. Each of the roles have
                    different
                    rights in the application. You are able to log in with the username and password in the JSON files,
                    unfortunately
                    I have yet added a service to create a user. The backend of the application is written in Java,
                    while the
                    frontend is in HTML, CSS and JavaScript. The function of the application is tested using Postman.
                </p>
            </div>
            <div id="grades">
                <h3>Grades calculator
                    <a href="https://github.com/nickforster" target="_blank">
                        <i class="fa fa-github"></i>
                    </a>
                </h3>
                <p>
                    As a part of an exam in school I made this grade calculator. It is written in Java and uses JFrame
                    for the GUIs.
                    The program displays subjects with their belonging grades. Each grade has a weighing, a date, a
                    title and of
                    course a grade. The program also shows the mean of the subjects as well as the mean of all the
                    subjects combined.
                    You can add as many subjects and grades as you like and delete or customize them afterwards.
                    Unfortunately I have
                    not considered saving the data into JSON files or a database when building this application.
                    Furthermore, I didn't
                    implement semesters yet. This project has quite some potential for the future, if I add a database
                    and semesters
                    and maybe make it to a webpage or an app.
                </p>
            </div>
            <div id="monopoly">
                <h3>Monopoly
                    <a href="https://github.com/nickforster/monopoly" target="_blank">
                        <i class="fa fa-github"></i>
                    </a>
                </h3>
                <p>
                    Monopoly multiplayer was an ambitious project that a friend of mine, and I started. The main goal
                    was to
                    make a functioning monopoly. We also wanted it to be realtime and 3D. The implementation of the
                    application
                    is in JavaScript with the library of socket.io and Three.js. Socket.io is a library that makes a
                    stable
                    connection between the client and the server. With that you can listen to emits from the server on
                    the client
                    and the other way. It is a quite simple method to get data from a client and distribute it again to
                    all the
                    users in its room. Three.js is a library to make a 3D scene. We used it to make the game. The map is
                    a plane
                    and all the figures are meshes. For the future we have planed to extend this project by making the
                    dices
                    interactive and make a better looking playing board.
                </p>
            </div>
            <div id="letzi">
                <h3>Website for Zunft zur Letzi
                    <a href="https://github.com/nickforster/website-letzi" target="_blank">
                        <i class="fa fa-github"></i>
                    </a>
                </h3>
                <p>
                    This is another Website with plain HTML, CSS and JavaScript. I made the website for the guild of
                    Letzi
                    that I'm in. It is not used, but it was a good challenge for me to design a website and I learned a
                    lot
                    new about JavaScript while doing so. This was one of my first websites, that actually looked decent.
                    I'm not pleased with the structure of the code of the website, but I don't want to overdo
                    everithing,
                    thats why I left it that way.
                </p>
            </div>
        </div>
    </div>
    <div id="contact">
        <h2>contact</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="inputBox">
                <label for="firstname">Firstname</label>
                <span class="errorSpan" id="firstnameSpan"><?php echo $firstnameErr; ?></span>
                <input type="text" id="firstname" name="firstname" required value="<?php echo $firstname; ?>">
                <span>Firstname</span>
            </div>
            <div class="inputBox">
                <label for="lastname">Lastname</label>
                <span class="errorSpan" id="lastnameSpan"><?php echo $lastnameErr; ?></span>
                <input type="text" id="lastname" name="lastname" required value="<?php echo $lastname; ?>">
                <span>Lastname</span>
            </div>
            <div class="inputBox">
                <label for="email">E-Mail</label>
                <span class="errorSpan" id="emailSpan"><?php echo $emailErr; ?></span>
                <input type="text" id="email" name="email" required value="<?php echo $email; ?>">
                <span>E-Mail</span>
            </div>
            <div class="inputBox">
                <label for="regard">Regard</label>
                <span class="errorSpan" id="regardSpan"><?php echo $regardErr; ?></span>
                <input type="text" id="regard" name="regard" required value="<?php echo $regard; ?>">
                <span>Regard</span>
            </div>
            <div class="inputBox textareaClass">
                <label for="message">Message</label>
                <span class="errorSpan" id="messageSpan"><?php echo $messageErr; ?></span>
                <textarea id="message" name="message" required><?php echo $message; ?></textarea>
                <span>Message</span>
            </div>
            <div class="inputBox">
                <input type="submit" value="submit" id="submit" name="submit">
            </div>
            <div class="inputBox">
                <input type="submit" value="reset" id="reset" name="reset">
            </div>
        </form>
        <div id="response" style="display: none">
            <p>Thank you for your message :-) </p>
        </div>
    </div>
</main>
<footer>
    <div id="footer-container">
        <div>
            Built by Nick Forster
        </div>
        <div id="footer-icons-container">
            <a href="https://www.linkedin.com/in/nick-forster-6689a1248" target="_blank">
                <i class="fa fa-linkedin-square footer-icon"></i>
            </a>
            <a href="https://www.instagram.com/nickforster9" target="_blank">
                <i class="fa fa-instagram footer-icon" aria-hidden="true"></i>
            </a>
            <a href="https://github.com/nickforster/portfolio" target="_blank">
                <i class="fa fa-github footer-icon"></i>
            </a>
        </div>
    </div>
</footer>
</body>
</html>
<?php

$programs = array(
    'undergraduate' => array(
        1 => 'Bachelor of Science in Accounting',
        2 => 'Bachelor of Science in Applied Social Sciences',
        3 => 'Bachelor of Science in Business Management',
        4 => 'Bachelor of Science in Communication',
        5 => 'Bachelor of Science in Computer Science',
        6 => 'Bachelor of Science in Criminal Justice and Law Enforcement Administration',
        7 => 'Bachelor of Science in Cybersecurity',
        8 => 'Bachelor of Science in Finance',
        9 => 'Bachelor of Science in Healthcare Administration and Management',
        10 => 'Bachelor of Science in Human Resources Management',
        11 => 'Bachelor of Science in Human Services',
        12 => 'Bachelor of Science in Information Technology',
        13 => 'Bachelor of Science in Interdisciplinary Professional Studies',
        14 => 'Bachelor of Science in Mangement Information Systems and Business Analytics',
        15 => 'Bachelor of Science in Marketing',
        16 => 'Bachelor of Science in Organizational Leadership',
        17 => 'Bachelor of Science in Project Management'
    ),
    'graduate' => array(
        20 => 'Master\'s Degree in Criminal Justice and Law Enforcement Administration',
        21 => 'Master\'s Degree in Finance',
        22 => 'Master\'s Degree in Healthcare Administration',
        23 => 'Master\'s Degree in Human Resource Management',
        24 => 'Master\'s Degree in Information Technology Management',
        25 => 'Master\'s Degree in Professional Accounting',
        26 => 'Master\'s Degree in Project Management',
        27 => 'Master of Science in Artificial Intelligence and Machine Learning',
        28 => 'Master of Science in Data Analytics',
        29 => 'Master of Science in Management',
        30 => 'Master of Science in Organizational Leadership',
        31 => 'Master of Science in Teaching and Learning'
    )
);

?>
<!doctype html>
<html lang="">
<head>
    <!-- head -->
    <title>Spring 2021 Commencement</title>

    <!-- meta information -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <meta name="description" content="Spring 2021 Commencement" />
    <meta name="keywords" content=""/>

    <!-- favicon -->
    <link rel="shortcut icon" href="imgs/favicon.png" type="image/x-icon"/>
    <link rel="icon" href="imgs/favicon.png" type="image/x-icon"/>

    <!-- css -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css" />

    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="js/main.js" type="text/javascript"></script>
</head>
<body>
    <header>
        <img src="imgs/header_2022_spring.png" alt="CSU Global Spring 2021 Commencement Logo">
    </header>

    <sidebar>
        <div id="undergraduate" class="active">
            <div class="section">UNDERGRADUATE PROGRAMS</div>
            <div id="program1" class="">Accounting</div>
            <div id="program2" class="">Applied Social Sciences</div>
            <div id="program3" class="">Business Management</div>
            <div id="program4" class="">Communication</div>
            <div id="program5" class="">Computer Science</div>
            <div id="program6" class="">Criminal Justice</div>
            <div id="program7" class="">Cybersecurity</div>
            <div id="program8" class="">Finance</div>
            <div id="program9" class="">Healthcare Administration and Management</div>
            <div id="program10" class="">Human Resource Management</div>
            <div id="program11" class="">Human Services</div>
            <div id="program12" class="">Information Technology</div>
            <div id="program13" class="">Interdisciplinary Professional Studies</div>
            <div id="program14" class="">Mangement Information Systems and Business Analytics</div>
            <div id="program15" class="">Marketing</div>
            <div id="program16" class="">Organizational Leadership</div>
            <div id="program17" class="">Project Management</div>
        </div>
        <div id="graduate" class="">
            <div class="section">GRADUATE PROGRAMS</div>
            <div id="program20" class="">Criminal Justice</div>
            <div id="program21" class="">Finance</div>
            <div id="program22" class="">Healthcare Administration</div>
            <div id="program23" class="">Human Resource Management</div>
            <div id="program24" class="">Information Technology Management</div>
            <div id="program25" class="">Professional Accounting</div>
            <div id="program26" class="">Project Management</div>
            <div id="program27" class="">Artificial Intelligence and Machine Learning</div>
            <div id="program28" class="">Data Analytics</div>
            <div id="program29" class="">Management</div>
            <div id="program30" class="">Organizational Leadership</div>
            <div id="program31" class="">Teaching and Learning</div>
        </div>
    </sidebar>

    <main id="main">

        <div class="slide" id="id_blank">
            <div class="program_num">blank</div>
        </div>

        <div class="accessibility_notice">Entire slide being read for accessibility reasons.</div>

    <?php

    $file = 'csv/slides_220527_with_honors.csv';
    $curSection = 'undergraduate';
    $curProgram = 0;
    $row = 0;

    if (($handle = fopen($file, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            
            // check for the switch to graduate degrees
            if ($data[0] == 20 && $curSection == 'undergraduate') {
                echo '<div class="slide blue" id="id_18">
                    <div class="program_num">18</div>
                    <h1>Congratulations Undergraduate Class of 2021!</h1>
                </div>
                <div class="slide" id="id_blank">
                    <div class="program_num">blank</div>
                </div>
                <div class="slide blue" id="id_19">
                    <div class="program_num">19</div>
                    <h1>Master\'s Degree Candidates</h1>
                    <audio id="audio_19">
                        <source src="audio/19.mp3" type="audio/mpeg">
                    </audio>
                </div>
                ';
                $curSection = 'graduate';
            }
            
            // check for the start of the slides
            if ($row == 0) {
                echo '<div class="slide blue" id="id_0">
                    <div class="program_num">0</div>
                    <h1>Bachelor\'s Degree Candidates</h1>
                    <audio id="audio_0">
                        <source src="audio/0.mp3" type="audio/mpeg">
                    </audio>
                </div>
                ';

            // all normal slides including degree programs
            } else if ($row > 0) {

                // degree program slides
                if ($data[0] > $curProgram) {
                    echo '<div class="slide burgundy" id="id_'.$data[0].'">
                        <div class="program_num">'.$data[0].'</div>
                        <h1>'.$programs[$curSection][$data[0]].'</h1>
                        <audio id="audio_'.$data[0].'">
                            <source src="audio/'.$data[0].'.mp3" type="audio/mpeg">
                        </audio>
                    </div>
                    ';
                    $curProgram = $data[0];
                }
                
                echo '<div class="slide" id="id_'.$data[1].'">
                    ';

                    // program number
                    echo '<div class="program_num">'.$data[0].'</div>
                    ';

                    // photo
                    if ($data[11] == 'No image') {
                        echo '<img src="imgs/csug_eagle.jpg" alt="'.$data[2].'" class="photo" />
                        ';
                    } else {
                        echo '<img src="imgs/graduates/'.$data[1].'.jpg" alt="'.$data[2].'" class="photo" />
                        ';
                    }

                    // name
                    echo '<h1>'.$data[2].'</h1>
                    <p class="program">'.$data[6].'</p>
                    ';

                    // message
                    echo '<p class="message">'.$data[10].'</p>
                    ';

                    // audio file
                    echo '<audio id="audio_'.$data[1].'">
                        <source src="audio/'.$data[1].'.mp3" type="audio/mpeg">
                    </audio>
                    ';

                    // latin honors
                    if ($data[7] != '') {
                        echo '<img src="imgs/'.str_replace(' ', '', $data[7]).'.png" class="ribbon" />
                        ';
                    }

                    // honor societies
                    if ($data[8] != '') {
                        $honor_societies = explode(';', $data[8]);
                        foreach($honor_societies as $hs) {
                            echo '<img src="imgs/'.str_replace(' ', '', $hs).'.png" class="ribbon" />
                            ';
                        }
                    }

                    echo '
                </div>
                ';
            }
            $row++;
        }
        fclose($handle);
    }

    ?>
        <div class="slide blue" id="id_40">
            <div class="program_num">40</div>
            <h1>Congratulations Graduate Class of 2021!</h1>
        </div>

    </main>

    <footer>
        
    </footer>
</body>
</html>
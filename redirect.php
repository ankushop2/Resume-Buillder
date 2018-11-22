<?php
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		session_start();
		if ($_GET['template'] == 'doppio'){
            $_SESSION['template_html'] = './templates/1/doppio.html';
            $_SESSION['template_css'] = './templates/1/style.css';
            $_SESSION['template_jpg'] = './templates/1/sc.jpg';
            $_SESSION['template_name'] = 'doppio';
			echo "WORKS";
			header('location: templates/1/doppio.html');
		}
		else if ($_GET['template'] == 'vandeco'){
			$_SESSION['template_html'] = './templates/2/vandeco.html';
            $_SESSION['template_css'] = '';
            $_SESSION['template_jpg'] = './templates/2/sc.jpg';
            $_SESSION['template_name'] = 'vandeco';
			header('location: templates/2/vandeco.html');
		}
		else if ($_GET['template'] == 'heavy'){
			$_SESSION['template_html'] = './templates/3/heavy.html';
            $_SESSION['template_css'] = './templates/3/resume.css';
            $_SESSION['template_jpg'] = './templates/3/sc.jpg';
            $_SESSION['template_name'] = 'heavy';
            header('location: templates/3/heavy.html');
		}
	}
?>
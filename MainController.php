<?php

namespace AztecGameStudios\Controllers;

class MainController extends AbstractController {
    public function get(): string {
        $properties = ['Message' => 'Main Page Hello World!'];
        return $this->render('main.twig', $properties);
    }

    // GIves the information regarding me
    public function about(): string {
        $properties = ['Message' => 'My Information'];
        return $this->render('about.twig', $properties);
    }

    // Provides registration information
    public function register(): string {
        $properties = ['Information'];
        return $this->render('register.twig', $properties);
    }


    // Game release page for the next release
    public function games(): string {

        // Release event date
        $target_days = mktime(0,0,0,10,31,2018);

        $today = time();

        // Days left for the event
        $diff_days = $target_days - $today;
        
        // Countdown to the game release event
        $countdown = (int) ($diff_days/86400);
        $properties = ['Message' => $countdown];
                        //'Release Date' => date('M-d-Y', $target_days)];
        return $this->render('games.twig', $properties);
    }
}

?>


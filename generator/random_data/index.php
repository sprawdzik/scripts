<?php
// // require the Faker autoloader
require_once "vendor/autoload.php";

// config
$cnfg_firstName = true;
$cnfg_lastName = true;
$cnfg_dob = true;
$cnfg_city = true;
$cnfg_mail = true;
$cnfg_password = true;

// use the factory to create a Faker/Generator instance
$faker = Faker\Factory::create();

for ($i = 0; $i < 100; $i++) {

    echo person($i, $cnfg_firstName, $cnfg_lastName, $cnfg_dob, $cnfg_city,$cnfg_mail,$cnfg_password) . PHP_EOL;
}

function person($i, $cnfg_firstName, $cnfg_lastName, $cnfg_dob, $cnfg_city,$cnfg_mail,$cnfg_password)
{
    global $faker;
    $name = '';
    // start first name
    if ($cnfg_firstName) {
        if ($i == 0) {
            $name = "Firstname" . "\t";
        } else {
            $gender = random_int(0, 1);
            switch ($gender) {
                case '0':
                    $name = $faker->firstName('male') . "\t";
                    break;
                case '1':
                    $name = $faker->firstName('female') . "\t";
                    break;
                default:
                    $name = $faker->firstName() . "\t";
                    break;
            }
        }

    }
    // end first name
    // start last name
    if ($cnfg_lastName) {
        if ($i == 0) {
            $name .= "Lastname" . "\t";
        } else {
            $name .= $faker->lastName() . "\t";
        }
    }
    // end last name
    // start day of birth
    if ($cnfg_dob) {
        if ($i == 0) {
            $name .= "DOB" . "\t";
        } else {
            $name .= $faker->date($format = 'Y-m-d', $max = 'now') . "\t";
        }
    }
    // end day of birth
    // start city
    if ($cnfg_city) {
        if ($i == 0) {
            $name .= "City" . "\t";
        } else {
            $name .= $faker->city . "\t";
        }
    }
    // end city
    // start mail
    if ($cnfg_mail) {
        if ($i == 0) {
            $name .= "Mail" . "\t";
        } else {
            $name .= $faker->email . "\t";
        }
    }
    // end mail
    // start mail
    if ($cnfg_password) {
        if ($i == 0) {
            $name .= "Password" . "\t";
        } else {
            $name .= $faker->password . "\t";
        }
    }
    // end mail

    else {
        $name = "No data";
    }

    return $name;
}

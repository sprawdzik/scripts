<?php
// // require the Faker autoloader
require_once "vendor/autoload.php";

// config
$cnfg_firstName = true;
$cnfg_lastName = true;
$cnfg_address = true;
$cnfg_pesel = true;
$cnfg_nip = true;
$cnfg_dob = false;
$cnfg_city = true;
$cnfg_mail = false;
$cnfg_company = true;
$cnfg_regon = true;
$cnfg_password = false;

$sep =  "\t"; // separator
$filename = date('YmdHis').".txt";

// use the factory to create a Faker/Generator instance
$faker = Faker\Factory::create('pl_PL');

for ($i = 0; $i < 20; $i++) {

    echo $data = person($i) . PHP_EOL;
    save($data);
}

function person($i)
{
    global $faker, $sep, $cnfg_firstName, $cnfg_lastName, $cnfg_address, $cnfg_pesel, $cnfg_nip, $cnfg_dob, $cnfg_city,$cnfg_mail,$cnfg_company, $cnfg_regon, $cnfg_password;
    $name = '';
    // start first name
    if ($cnfg_firstName) {
        if ($i == 0) {
            $name = "Firstname" . $sep;
        } else {
            $gender = random_int(0, 1);
            switch ($gender) {
                case '0':
                    $name = $faker->firstName('male') . $sep;
                    break;
                case '1':
                    $name = $faker->firstName('female') . $sep;
                    break;
                default:
                    $name = $faker->firstName() . $sep;
                    break;
            }
        }

    }
    // end first name
    // start last name
    if ($cnfg_lastName) {
        if ($i == 0) {
            $name .= "Lastname" . $sep;
        } else {
            switch ($gender) {
                case '0':
                    $name .= $faker->lastName('male') . $sep;
                    break;
                case '1':
                    $name .= $faker->lastName('female') . $sep;
                    break;
                default:
                    $name .= $faker->lastName() . $sep;
                    break;
            }
        }
    }
    // end last name
    // start address
    if ($cnfg_address) {
        if ($i == 0) {
            $name .= "Address" . $sep;
        } else {
            $name .= $faker->address() . $sep;
        }
    }
    // end address
    // start pesel
    if ($cnfg_pesel) {
        if ($i == 0) {
            $name .= "PESEL" . $sep;
        } else {
            $name .= $faker->pesel() . $sep;
        }
    }
    // end last name
    // start nip
    if ($cnfg_nip) {
        if ($i == 0) {
            $name .= "NIP" . $sep;
        } else {
            $name .= $faker->taxpayerIdentificationNumber() . $sep;
        }
    }
    // end nip
    // start day of birth
    if ($cnfg_dob) {
        if ($i == 0) {
            $name .= "DOB" . $sep;
        } else {
            $name .= $faker->date($format = 'Y-m-d', $max = 'now') . $sep;
        }
    }
    // end day of birth
    // start city
    if ($cnfg_city) {
        if ($i == 0) {
            $name .= "City" . $sep;
        } else {
            $name .= $faker->city . $sep;
        }
    }
    // end city
    // start mail
    if ($cnfg_mail) {
        if ($i == 0) {
            $name .= "Mail" . $sep;
        } else {
            $name .= $faker->email . $sep;
        }
    }
    // end mail
    // start company
    if ($cnfg_company) {
        if ($i == 0) {
            $name .= "Company" . $sep;
        } else {
            $name .= $faker->company . $sep;
        }
    }
    // end company
    // start regon
    if ($cnfg_regon) {
        if ($i == 0) {
            $name .= "Regon" . $sep;
        } else {
            $name .= $faker->regon . $sep;
        }
    }
    // end regon
    // start password
    if ($cnfg_password) {
        if ($i == 0) {
            $name .= "Password" . $sep;
        } else {
            $name .= $faker->password . $sep;
        }
    }
    // end password

    return $name;
}

function save($name){ // save data to file
    global $filename;
    $myfile = fopen($filename, "a") or die("Unable to open file!");
    $txt = $name;
    fwrite($myfile, $txt);
    fclose($myfile);
}

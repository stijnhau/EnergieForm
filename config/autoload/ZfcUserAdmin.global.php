<?php
/**
 * ZfcUserAdmin Configuration
 *
 * If you have a ./config/autoload/ directory set up for your project, you can
 * drop this config file in it and change the values as you wish.
 */
$settings = array(
    'createFormElements' => array(
        "Role" => "role_id",
    ),

    /**
     * Mapper for ZfcUser
     *
     * Set the mapper to be used here
     * Currently Available mappers
     *
     * ZfcUserAdmin\Mapper\UserDoctrine
     *
     * By default this is using
     * ZfcUserAdmin\Mapper\UserZendDb
     */
    'user_mapper' => 'ZfcUserAdmin\Mapper\UserZendDb',
);

/**
 * You do not need to edit below this line
 */
return array(
    'zfcuseradmin' => $settings
);

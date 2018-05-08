<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
        
<nav class="navbar navbar-expand-md navbar-light bg-white menu-shadow px-1">
    <div class="container-fluid pr-lg-5 max-large">
        <?php echo tainacan_get_logo(); ?>
        <div class="btn-group ml-auto p-4"> <!-- Quando retirar o commentario para exibir o menu retirar o p-4 -->
            <!-- <button type="button" class="btn btn-link text-heavy-metal px-0"><i class="material-icons">person_outline</i></button>
            <button type="button" class="btn btn-link text-heavy-metal dropdown-toggle dropdown-toggle-split px-1 pt-lg-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="d-none d-md-inline-block">User</div><span class="sr-only text-jelly-bean">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu tainacan-dropdown-menu">
                <a class="dropdown-item" href="#">Perfil</a>
                <a class="dropdown-item" href="#">Coleção</a>
                <a class="dropdown-item" href="#">Sair</a>
            </div>
            <button type="button" class="btn btn-link text-heavy-metal px-1"><i class="material-icons">notifications_none</i></button>
            <button type="button" class="btn btn-link text-heavy-metal pl-1 pr-lg-0"><i class="material-icons">help_outline</i></button> -->
        </div>
    </div>
</nav>
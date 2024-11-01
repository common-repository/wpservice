<?php if( !class_exists("WPServiceCom") ) exit; ?>
<div id="wpservicecom-button" >
	<a href="https://service.com/dashboard/<?php echo esc_attr( $opts["slug"] ); ?>" target="_blank" id="wpservicecom-button-link" ></a>
	<?php if( $opts["optional_text"] ) : ?>
		<div id="wpservicecom-text"><?php echo $opts["optional_text"]; ?></div>
	<?php endif; ?>
</div>
<style type="text/css" >
	#wpservicecom-button {
		display:inline-block;    
		padding: 5px;
    	width: auto;
    	<?php if( $black_bg ) : ?>
    	background:black;
    	<?php endif; ?>
	}
	#wpservicecom-button #wpservicecom-button-link {
		width:150px;
		height:54px;
		display:block;
		text-decoration:none;
		border:0;
		text-indent:-99999px;
		background-color:transparent;
		background-repeat:no-repeat;
		background-position:center center;
		background-image:url("<?php echo WPSERVICE_URL."/images/".$image;?>");
		outline:0px;
		box-shadow:none!important;
	}

	#wpservicecom-button #wpservicecom-text {
		margin: 0;
    	padding: 15px 5px;
    	display:inline-block;
    	<?php if( $black_bg ) : ?>
    	color:white;
    	<?php else : ?>
    	color:#333;
    	<?php endif; ?>
	}
</style>
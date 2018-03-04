<?php 

include_once 'utils.php';
extract($_GET);//$t,$a,$id

switch ($a) {
	case 'create':
		Utils::ajouter($_POST,$t);
		
		break;
		case 'delete':
		Utils::delete($id, $t);
		break;
			case 'update':
		Utils::modifier($id, $_POST,$t);

		break;
			case 'show':
		header("location:show.php?id=$id&t=$t");

	exit();
		break;
		case 'edit':
		header("location:edit.php?id=$id&t=$t");exit();
	
	
	default:
	
		break;
}
	header("location:index.php?a=$a");
 ?>
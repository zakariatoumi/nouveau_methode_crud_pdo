<?php 
/**
* 
*/
class Utils 
{
	public static $cnx=NULL;

	public static function get_connection()
	{ 
		if(! self::$cnx)
		try{
		self::$cnx=new PDO("mysql:host=localhost;dbname=crud2;charset='utf-8'",'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=> PDO::FETCH_OBJ));
		return self::$cnx;
		}
		catch(Exception $e){
			die('erreur de connexion '.$e->getMessage());
		};
		
	}
	public static function intero($value)
	{
	 return '?';
	}


public static function ajouter($data=array(),$table="")
{ 
	//$data=array('lib'=>'hp','prix'=>9000); => array('?','?') =>'?,?'
	//array_map('self::intero', $data)

$i=join(',',array_map('self::intero', $data)); //?,?
$k=join(',', array_keys($data)); //'lib,prix'
//insert into produit (lib,prix) values (?,?)  
	try{
	$cnx=self::get_connection();
	$rp=$cnx->prepare("insert into $table ($k) values ($i)  ");
	$rp->execute(array_values($data));
}catch(Exception $e){
	echo  "ERREUR : ".$e->getMessage();
}
}


private  static function  sets ($value='')
{
	return "$value=?";
}

public static function modifier($id,$data=array(),$table="")
{
	try{
		$cnx = self::get_connection();

		$fields = join(',', array_map('self::sets', array_keys($data))) ;
/*$v=array_values($data);
$v[]=$id;*/

		$rp = $cnx->prepare("UPDATE $table SET $fields WHERE id = ?");
	$temp=	array_values($data);
array_push($temp,$id);
		$rp->execute($temp);
	} catch(Exception $e) {
		echo  "ERREUR UPDATE : ".$e->getMessage();
	}
	
}

//Utils::modifier(77,array('libelle'=>'compac 36','prix'=>8000),'produit');

public static function delete ($id, $table="") {
	try {
		$cnx = self::get_connection();
		$pr = $cnx->prepare("DELETE FROM $table WHERE id = ?");
		$pr->execute(array($id));
	} catch (Exception $e) {
		echo  "ERREUR DELETE : ".$e->getMessage();
	}
}

public static function getAll ($table,$orderby="") {
	try {
		$cnx = self::get_connection();
		$pr = $cnx->prepare("SELECT * FROM $table $orderby");
		 $pr->execute();
		return $pr->fetchAll();
	} catch (Exception $e) {
		echo  "ERREUR SELECT : ".$e->getMessage();
	}
}

public static function getById ($table, $id) {
	try {
		$cnx = self::get_connection();
		$pr = $cnx->prepare("SELECT * FROM $table WHERE id = ?");
		 $pr->execute(array($id));
		return $pr->fetch();
	} catch (Exception $e) {
		echo  "ERREUR SELECT : ".$e->getMessage();
	}
}


public static function getBy ($table, $condition) {
	$sql="";
	$tab=array();
	try {
if(is_string($condition)){
	$sql=$condition;
}
if(is_array($condition)){
$sql=join(", ",array_map('self::sets',array_keys($condition)));	//?,?
$tab=array_values($condition);

}


		$cnx = self::get_connection();
		$pr = $cnx->prepare("SELECT * FROM $table WHERE $sql");


		$result = $pr->execute($tab);
		return $result->fetch();
	} catch (Exception $e) {
		echo  "ERREUR SELECT BY : ".$e->getMessage();
	}
}
public function sanitize()
{
	
}
}
 ?>
